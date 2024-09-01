<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

// 데이터베이스 연결 설정
require_once 'db.php'; // 데이터베이스 연결을 위한 파일

// 사용자 이메일로 사용자 정보 가져오기
$user_email = $_SESSION['user_email'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_email]);
$user = $stmt->fetch();

if (!$user) {
    echo "사용자 정보를 찾을 수 없습니다.";
    exit();
}

$user_id = $user['user_id'];

// 정렬 옵션 처리
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'latest'; // 기본값은 'latest'

switch ($sort) {
    case 'price_asc':
        $order_by = 'price ASC';
        break;
    case 'price_desc':
        $order_by = 'price DESC';
        break;
    case 'latest':
    default:
        $order_by = 'purchase_date DESC';
        break;
}

// 구매 목록 가져오기
$sql = "SELECT * FROM purchase_history WHERE user_id = ? ORDER BY $order_by";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$purchases = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="mypage.css">
    <script src="mypage.js" defer></script>
    <script src="disable-interactions.js" defer></script>
</head>
<body>
    <?php include 'nav.php'; ?>

    <main>
        <section class="profile-container">
            <div class="profile">
                <img src="<?php echo htmlspecialchars($user['profile_image']) ?: 'basic_profile.png'; ?>" alt="Profile Picture" class="profile-img">
                <div class="profile-details">
                    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                    <button id="change-password-btn" class="btn">Change Password</button>
                    <button id="add-profile-image-btn" class="btn">Add Profile Image</button>
                </div>
            </div>
            <hr class="divider">
            <section class="purchase-history">
                <h2>Purchase History</h2>
                <!-- 정렬 필터 추가 -->
                <form method="GET" action="mypage.php">
                    <label for="sort">Sort by:</label>
                    <select id="sort" name="sort" onchange="this.form.submit()">
                        <option value="latest" <?php echo $sort === 'latest' ? 'selected' : ''; ?>>Latest Purchase</option>
                        <option value="price_asc" <?php echo $sort === 'price_asc' ? 'selected' : ''; ?>>Price: Low to High</option>
                        <option value="price_desc" <?php echo $sort === 'price_desc' ? 'selected' : ''; ?>>Price: High to Low</option>
                    </select>
                </form>
                <!-- 구매 목록 출력 -->
                <?php if (empty($purchases)): ?>
                    <p>No purchases found.</p>
                <?php else: ?>
                    <ul>
                        <?php foreach ($purchases as $purchase): ?>
                            <li>
                                <strong>Product Name:</strong> <?php echo htmlspecialchars($purchase['product_name']); ?><br>
                                <strong>Purchase Date:</strong> <?php echo htmlspecialchars($purchase['purchase_date']); ?><br>
                                <strong>Price:</strong> ¥<?php echo htmlspecialchars($purchase['price']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </section>
        </section>
    </main>

    <!-- 프로필 이미지 업로드 모달 -->
    <div id="upload-profile-image-modal" class="upload-modal">
        <div class="upload-modal-content">
            <span class="upload-modal-close-btn">&times;</span>
            <form action="upload-profile-image.php" method="POST" enctype="multipart/form-data">
                <label for="profile-image">Choose an image to upload:</label>
                <input type="file" id="profile-image" name="profile_image" accept="image/*" required>
                <button type="submit" class="btn">Upload Image</button>
            </form>
        </div>
    </div>
</body>
</html>
