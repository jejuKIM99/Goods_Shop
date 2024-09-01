<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_SESSION['user_email'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // 비밀번호 유효성 검사
    if ($new_password !== $confirm_new_password) {
        $_SESSION['error'] = "New passwords do not match.";
        header("Location: mypage.php");
        exit();
    }

    if (strlen($new_password) < 6) {
        $_SESSION['error'] = "New password must be at least 6 characters.";
        header("Location: mypage.php");
        exit();
    }

    // 현재 비밀번호 확인
    $stmt = $pdo->prepare("SELECT password_hash FROM users WHERE email = ?");
    $stmt->execute([$user_email]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($current_password, $user['password_hash'])) {
        $_SESSION['error'] = "Current password is incorrect.";
        header("Location: mypage.php");
        exit();
    }

    // 새 비밀번호 해싱
    $new_password_hash = password_hash($new_password, PASSWORD_BCRYPT);

    // 비밀번호 업데이트
    $stmt = $pdo->prepare("UPDATE users SET password_hash = ? WHERE email = ?");
    $stmt->execute([$new_password_hash, $user_email]);

    // 로그아웃 및 메시지 설정
    session_unset();
    session_destroy();
    echo "<script>alert('Password changed successfully. Please log in again.'); window.location.href = 'login-form.php';</script>";
    exit();
}
?>
