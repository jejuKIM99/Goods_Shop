<?php
include 'db.php'; // 데이터베이스 연결

// 굿즈 ID를 URL에서 가져옵니다.
$good_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($good_id <= 0) {
    die('Invalid good ID');
}

// 굿즈 정보 가져오기
$stmt = $pdo->prepare("SELECT * FROM goods WHERE id = ?");
$stmt->execute([$good_id]);
$good = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$good) {
    die('Good not found');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($good['name']); ?> - Detail</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="detail.css">
    <script src="disable-interactions.js" defer></script>
</head>
<body>
    <!-- 네비게이션 바 포함 -->
    <?php include 'nav.php'; ?>

    <div class="nav-separator"></div>

    <div class="detail-container">
        <div class="detail-image">
            <img src="<?php echo htmlspecialchars($good['image']); ?>" alt="<?php echo htmlspecialchars($good['name']); ?>">
        </div>
        
        <!-- Good information next to the image -->
        <div class="detail-info">
            <h1><?php echo htmlspecialchars($good['name']); ?></h1>
            <p><strong>Production:</strong> <?php echo htmlspecialchars($good['production']); ?></p>
            <p><strong>Release Date:</strong> <?php echo htmlspecialchars($good['release_date']); ?></p>
            <p><strong>Price:</strong> $<?php echo number_format($good['price']); ?></p>
            
            <!-- Buttons -->
            <div class="buttons">
                <button class="cart-button">Add to Cart</button>
                <button class="buy-button">Buy Now</button>
            </div>
        </div>
    </div>

    <!-- Horizontal line -->
    <hr class="detail-separator">
    
    <!-- YouTube Video, Description, Track List -->
    <div class="additional-info">
        <div class="youtube-video">
            <!-- YouTube video embedding code goes here -->
            <iframe width="800" height="450" src="https://www.youtube.com/embed/SH2EPsPISSE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($good['contents'])); ?></p>
    </div>

    <!-- Back Button -->
    <div class="back-button">
        <button onclick="history.back()">Go Back</button>
    </div>
</body>
</html>
