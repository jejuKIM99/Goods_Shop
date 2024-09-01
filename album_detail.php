<?php
include 'db.php'; // 데이터베이스 연결

// 앨범 ID를 URL에서 가져옵니다.
$album_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($album_id <= 0) {
    die('Invalid album ID'); // 유효하지 않은 앨범 ID인 경우 에러 메시지 출력
}

// 앨범 정보 가져오기
$stmt = $pdo->prepare("SELECT * FROM albums WHERE id = ?");
$stmt->execute([$album_id]);
$album = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$album) {
    die('Album not found'); // 앨범이 존재하지 않는 경우 에러 메시지 출력
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($album['name']); ?> - Detail</title> <!-- 앨범 이름을 제목으로 사용 -->
    <link rel="stylesheet" href="styles.css"> <!-- 공통 스타일 시트 -->
    <link rel="stylesheet" href="detail.css"> <!-- 상세 페이지 전용 스타일 시트 -->
    <script src="disable-interactions.js" defer></script> <!-- 인터랙션 비활성화 스크립트 -->
</head>
<body>
    <?php include 'nav.php'; ?> <!-- 내비게이션 바 포함 -->

    <div class="nav-separator"></div> <!-- 내비게이션 바와 본문 사이에 구분선 추가 -->

    <div class="detail-container">
        <div class="detail-image">
            <img src="<?php echo htmlspecialchars($album['image']); ?>" alt="<?php echo htmlspecialchars($album['name']); ?>"> <!-- 앨범 이미지 -->
        </div>
        
        <!-- 앨범 정보 -->
        <div class="detail-info">
            <h1><?php echo htmlspecialchars($album['name']); ?></h1> <!-- 앨범 이름 -->
            <p><strong>Production:</strong> <?php echo htmlspecialchars($album['production']); ?></p> <!-- 제작사 -->
            <p><strong>Release Date:</strong> <?php echo htmlspecialchars($album['release_date']); ?></p> <!-- 발매일 -->
            <p><strong>Price:</strong> $<?php echo number_format($album['price']); ?></p> <!-- 가격, 달러 표시 -->
            
            <!-- 버튼들 -->
            <div class="buttons">
                <button class="cart-button">Add to Cart</button> <!-- 장바구니 추가 버튼 -->
                <button class="buy-button">Buy Now</button> <!-- 지금 구매 버튼 -->
            </div>
        </div>
    </div>

    <!-- 수평선 -->
    <hr class="detail-separator">
    
    <!-- 추가 정보 섹션 -->
    <div class="additional-info">
        <div class="youtube-video">
            <!-- YouTube 비디오 임베딩 코드 -->
            <iframe width="800" height="450" src="https://www.youtube.com/embed/SH2EPsPISSE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($album['contents'])); ?></p> <!-- 앨범 설명 -->
        <p><strong>Track List:</strong> <?php echo nl2br(htmlspecialchars($album['list'])); ?></p> <!-- 트랙 리스트 -->
    </div>

    <!-- 돌아가기 버튼 -->
    <div class="back-button">
        <button onclick="history.back()">Go Back</button> <!-- 이전 페이지로 돌아가기 버튼 -->
    </div>
</body>
</html>
