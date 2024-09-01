<?php
session_start();
require 'db.php'; // 데이터베이스 연결

// 초기화
$message = '';
$messageType = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 입력 값 가져오기
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 유효성 검사
    if ($email && strlen($password) >= 6) {
        if ($password === $confirm_password) {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            try {
                // 데이터베이스 쿼리 실행
                $stmt = $pdo->prepare("INSERT INTO users (email, password_hash) VALUES (:email, :password_hash)");
                $stmt->execute(['email' => $email, 'password_hash' => $password_hash]);

                // 성공 메시지 설정
                $_SESSION['user_email'] = $email;
                $message = "회원가입이 성공적으로 완료되었습니다!";
                $messageType = 'success'; // 성공 메시지
            } catch (PDOException $e) {
                // 예외 발생 시 오류 메시지 설정
                $message = "오류: " . $e->getMessage();
                $messageType = 'error'; // 실패 메시지
            }
        } else {
            $message = "비밀번호가 일치하지 않습니다.";
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
    <title>Sign Up</title>
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
    <form class="modal-form" action="signup-form.php" method="post">
        <h2>Sign Up</h2>
        
        <label for="signup-email">Email:</label>
        <input type="email" id="signup-email" name="email" required>
        
        <label for="signup-password">Password:</label>
        <input type="password" id="signup-password" name="password" required>
        
        <label for="signup-confirm-password">Confirm Password:</label>
        <input type="password" id="signup-confirm-password" name="confirm_password" required>
        
        <button type="submit">Sign Up</button>
        <p class="signin-to-login">Already have an account? <a href="login-form.php">Login</a></p>
    </form>
</body>
</html>
