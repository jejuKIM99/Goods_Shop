<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums Page</title>
    <link rel="stylesheet" href="styles.css"> <!-- 공통 스타일 시트 -->
    <link rel="stylesheet" href="albums.css"> <!-- 앨범 페이지 전용 스타일 시트 -->
    <link rel="icon" href="favicon.ico" /> <!-- 사이트 아이콘 -->
    <script src="album-detail.js" defer></script> <!-- 앨범 상세 페이지 기능을 위한 JavaScript 파일 -->
    <script src="disable-interactions.js" defer></script> <!-- 인터랙션 비활성화 스크립트 -->
</head>
<body>
    <?php include 'nav.php'; ?> <!-- 내비게이션 바 포함 -->

    <main>
        <section class="content-wrapper">
            <?php include 'sidebar.php'; ?> <!-- 사이드바 포함 -->

            <section class="albums-content">
                <!-- 앨범 그리드 -->
                <div class="albums-grid">
                    <?php
                    // 데이터베이스 연결
                    include 'db.php';

                    // 페이지네이션 포함
                    $pagination = include 'pagination.php';
                    $albums = $pagination['albums']; // 현재 페이지의 앨범 목록
                    $totalPages = $pagination['totalPages']; // 총 페이지 수
                    $currentPage = $pagination['currentPage']; // 현재 페이지 번호

                    if (empty($albums)): ?>
                        <!-- 앨범이 없는 경우 -->
                        <div class="no-results">
                            <img src="crying.png" alt="No Results" class="no-results-image">
                            <p>No results</p>
                        </div>
                    <?php else: ?>
                        <!-- 앨범이 있는 경우 -->
                        <?php foreach ($albums as $album): ?>
                            <div class="album-item" data-id="<?php echo htmlspecialchars($album['id']); ?>">
                                <img src="<?php echo htmlspecialchars($album['image']); ?>" alt="Album Image">
                                <div class="album-name"><?php echo htmlspecialchars($album['name']); ?></div>
                                <div class="album-price">¥<?php echo number_format($album['price']); ?></div> <!-- 앤화 표시 -->
                                <div class="album-overlay">
                                    <a href="#">Go to Detail</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- 페이지네이션 -->
                <div class="pagination">
                    <?php if ($currentPage > 1): ?>
                        <!-- 이전 페이지 버튼 -->
                        <a href="albums.php?page=<?php echo $currentPage - 1; ?><?php echo isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : ''; ?><?php echo isset($_GET['production']) ? '&production=' . $_GET['production'] : ''; ?><?php echo isset($_GET['price']) ? '&price=' . $_GET['price'] : ''; ?><?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">&laquo; Previous</a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <!-- 페이지 번호 링크 -->
                        <a href="albums.php?page=<?php echo $i; ?><?php echo isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : ''; ?><?php echo isset($_GET['production']) ? '&production=' . $_GET['production'] : ''; ?><?php echo isset($_GET['price']) ? '&price=' . $_GET['price'] : ''; ?><?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>" <?php echo $i == $currentPage ? 'class="active"' : ''; ?>>
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($currentPage < $totalPages): ?>
                        <!-- 다음 페이지 버튼 -->
                        <a href="albums.php?page=<?php echo $currentPage + 1; ?><?php echo isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : ''; ?><?php echo isset($_GET['production']) ? '&production=' . $_GET['production'] : ''; ?><?php echo isset($_GET['price']) ? '&price=' . $_GET['price'] : ''; ?><?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">Next &raquo;</a>
                    <?php endif; ?>
                </div>
            </section>
        </section>
    </main>
</body>
</html>
