<?php
session_start();
require 'db.php'; // 데이터베이스 연결

// 초기화
$message = '';
$messageType = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if ($email && strlen($password) >= 6) {
        try {
            // 사용자 정보 조회
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            // 비밀번호 확인 및 로그인 처리
            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_email'] = $email;
                $message = "로그인이 성공적으로 완료되었습니다!";
                $messageType = 'success'; // 성공 메시지
            } else {
                $message = "잘못된 이메일 또는 비밀번호입니다.";
                $messageType = 'error'; // 실패 메시지
            }
        } catch (PDOException $e) {
            $message = "오류: " . $e->getMessage();
            $messageType = 'error'; // 실패 메시지
        }
    } else {
        $message = "유효한 이메일을 입력하고, 비밀번호는 최소 6자 이상이어야 합니다.";
        $messageType = 'error'; // 실패 메시지
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if ($message) { ?>
                var message = "<?php echo addslashes($message); ?>";
                var messageType = "<?php echo $messageType; ?>";
                alert(message); // 브라우저 알림
                window.location.href = "main.php"; // 성공 및 실패 시 모두 main.php로 리디렉션
            <?php } ?>
        });
    </script>
</head>
<body>
    <form class="modal-form" action="login-form.php" method="post">
        <h2>Login</h2>
        <label for="login-email">Email:</label>
        <input type="email" id="login-email" name="email" required>
        
        <label for="login-password">Password:</label>
        <input type="password" id="login-password" name="password" required>
        
        <button type="submit">Login</button>
        <p class="login-to-signin">Don't have an account? <a href="signup-form.php">Sign Up</a></p>
    </form>
</body>
</html>
