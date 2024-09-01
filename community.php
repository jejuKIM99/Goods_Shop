<?php
// db.php를 포함하여 데이터베이스 연결을 가져옵니다.
include 'db.php';

try {
    // 페이지 번호와 검색 기준을 가져옵니다. 기본값은 1입니다.
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $posts_per_page = 20; // 페이지당 게시물 수

    // 검색 조건을 가져옵니다.
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $search_type = isset($_GET['search_type']) ? $_GET['search_type'] : 'title';

    // 페이지 번호가 1보다 작은 경우 1로 설정
    if ($page < 1) {
        $page = 1;
    }

    // OFFSET을 계산합니다.
    $offset = ($page - 1) * $posts_per_page;

    // 검색 조건에 따른 쿼리 준비
    $query = "SELECT COUNT(*) FROM community WHERE $search_type LIKE :search";
    $total_stmt = $pdo->prepare($query);
    $total_stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $total_stmt->execute();
    $total_posts = $total_stmt->fetchColumn(); // 총 게시물 수 가져오기

    // 총 페이지 수를 계산합니다.
    $total_pages = ceil($total_posts / $posts_per_page);

    // 커뮤니티 게시물 데이터를 가져옵니다.
    $stmt = $pdo->prepare("SELECT post_id, title, author, post_date, views FROM community WHERE $search_type LIKE :search ORDER BY post_date DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $stmt->bindValue(':limit', $posts_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC); // 게시물 데이터 가져오기
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage(); // 데이터베이스 오류 처리
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>커뮤니티</title> <!-- 페이지 제목 -->
    <link rel="stylesheet" href="styles.css"> <!-- 기존 스타일시트 -->
    <link rel="stylesheet" href="community.css"> <!-- 커뮤니티 페이지 전용 스타일시트 -->
    <script src="disable-interactions.js" defer></script> <!-- 인터랙션 비활성화 스크립트 -->
</head>
<body>
    <!-- 네비게이션 바 포함 -->
    <?php include 'nav.php'; ?>

    <main>
        <!-- 내용 영역 -->
        <div class="content-container">
            <h1>Community</h1>

            <!-- 검색 폼 -->
            <div class="search-container">
                <form action="community.php" method="GET">
                    <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search..." />
                    <select name="search_type">
                        <option value="title" <?php if ($search_type === 'title') echo 'selected'; ?>>Title</option>
                        <option value="author" <?php if ($search_type === 'author') echo 'selected'; ?>>Author</option>
                    </select>
                    <button type="submit">Search</button>
                </form>
            </div>

            <!-- 테이블 -->
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($posts)): ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">No result</td> <!-- 검색 결과가 없을 때 -->
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($post['post_id']); ?></td> <!-- 게시물 ID -->
                        <td><a href="post_view.php?post_id=<?php echo urlencode($post['post_id']); ?>"><?php echo htmlspecialchars($post['title']); ?></a></td> <!-- 제목, 링크로 상세보기 페이지 이동 -->
                        <td><?php echo htmlspecialchars($post['author']); ?></td> <!-- 작성자 -->
                        <td><?php echo htmlspecialchars($post['post_date']); ?></td> <!-- 게시 날짜 -->
                        <td><?php echo htmlspecialchars($post['views']); ?></td> <!-- 조회수 -->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- 검색 결과가 없을 때 "Go back" 버튼 -->
            <?php if (empty($posts)): ?>
                <div class="search-container" style="margin-top: 1rem; text-align: center;">
                    <a href="community.php" class="search-container back_button">Go back</a> <!-- 검색 결과가 없을 때 돌아가기 버튼 -->
                </div>
            <?php endif; ?>

            <!-- 페이지네이션 링크 -->
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="community.php?page=1&search=<?php echo urlencode($search); ?>&search_type=<?php echo urlencode($search_type); ?>">First</a> <!-- 첫 페이지 링크 -->
                    <a href="community.php?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search); ?>&search_type=<?php echo urlencode($search_type); ?>">Previous</a> <!-- 이전 페이지 링크 -->
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="community.php?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>&search_type=<?php echo urlencode($search_type); ?>" <?php if ($i == $page) echo 'class="active"'; ?>>
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <a href="community.php?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search); ?>&search_type=<?php echo urlencode($search_type); ?>">Next</a> <!-- 다음 페이지 링크 -->
                    <a href="community.php?page=<?php echo $total_pages; ?>&search=<?php echo urlencode($search); ?>&search_type=<?php echo urlencode($search_type); ?>">Last</a> <!-- 마지막 페이지 링크 -->
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>
