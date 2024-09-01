<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goods Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="albums.css"> <!-- 동일한 CSS 사용 -->
    <link rel="icon" href="favicon.ico" />
    <script src="album-detail.js" defer></script> <!-- 동일한 JS 사용 -->
    <script src="disable-interactions.js" defer></script>
</head>
<body>
    <?php include 'nav.php'; ?>

    <main>
        <section class="content-wrapper">
            <?php include 'sidebar.php'; ?>

            <section class="albums-content"> <!-- 동일한 클래스 사용 -->
                <!-- 굿즈 그리드 -->
                <div class="albums-grid"> <!-- 동일한 그리드 클래스 사용 -->
                    <?php
                    // 데이터베이스 연결
                    include 'db.php';

                    // 페이지네이션 포함
                    $pagination = include 'goods-pagination.php';
                    $goods = $pagination['goods'];
                    $totalPages = $pagination['totalPages'];
                    $currentPage = $pagination['currentPage'];

                    if (empty($goods)): ?>
                        <div class="no-results">
                            <img src="crying.png" alt="No Results" class="no-results-image">
                            <p>No results</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($goods as $item): ?>
                            <div class="album-item" data-id="<?php echo htmlspecialchars($item['id']); ?>"> <!-- 동일한 클래스 사용 -->
                                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Goods Image">
                                <div class="album-name"><?php echo htmlspecialchars($item['name']); ?></div> <!-- 동일한 클래스 사용 -->
                                <div class="album-price">¥<?php echo number_format($item['price']); ?></div> <!-- 동일한 클래스 사용 -->
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
                        <a href="goods.php?page=<?php echo $currentPage - 1; ?><?php echo isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : ''; ?><?php echo isset($_GET['production']) ? '&production=' . $_GET['production'] : ''; ?><?php echo isset($_GET['price']) ? '&price=' . $_GET['price'] : ''; ?><?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">&laquo; Previous</a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="goods.php?page=<?php echo $i; ?><?php echo isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : ''; ?><?php echo isset($_GET['production']) ? '&production=' . $_GET['production'] : ''; ?><?php echo isset($_GET['price']) ? '&price=' . $_GET['price'] : ''; ?><?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>" <?php echo $i == $currentPage ? 'class="active"' : ''; ?>>
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($currentPage < $totalPages): ?>
                        <a href="goods.php?page=<?php echo $currentPage + 1; ?><?php echo isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : ''; ?><?php echo isset($_GET['production']) ? '&production=' . $_GET['production'] : ''; ?><?php echo isset($_GET['price']) ? '&price=' . $_GET['price'] : ''; ?><?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">Next &raquo;</a>
                    <?php endif; ?>
                </div>
            </section>
        </section>
    </main>
</body>
</html>
