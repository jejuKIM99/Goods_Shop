<?php
session_start();
require_once 'db.php'; // 데이터베이스 연결 파일

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_image'])) {
    $user_email = $_SESSION['user_email']; // 사용자 이메일 가져오기
    $target_dir = "uploads/"; // 파일 업로드 디렉토리
    $target_file = $target_dir . basename($_FILES["profile_image"]["name"]); // 업로드할 파일 경로
    $uploadOk = 1; // 업로드 상태 플래그
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // 파일 확장자

    // 이미지 파일인지 확인
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image."; // 이미지가 아닌 경우 오류 메시지 출력
        $uploadOk = 0; // 업로드 상태 플래그를 0으로 설정
    }

    // 파일 크기 확인
    if ($_FILES["profile_image"]["size"] > 500000) {
        echo "Sorry, your file is too large."; // 파일이 너무 큰 경우 오류 메시지 출력
        $uploadOk = 0; // 업로드 상태 플래그를 0으로 설정
    }

    // 허용된 파일 형식 확인
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; // 허용되지 않는 파일 형식인 경우 오류 메시지 출력
        $uploadOk = 0; // 업로드 상태 플래그를 0으로 설정
    }

    // 오류가 없으면 파일 업로드
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded."; // 업로드 상태 플래그가 0일 경우 오류 메시지 출력
    } else {
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            // 데이터베이스에 프로필 이미지 경로 저장
            $sql = "UPDATE users SET profile_image = ? WHERE email = ?"; // SQL 쿼리
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$target_file, $user_email]); // 쿼리 실행

            echo "The file " . htmlspecialchars(basename($_FILES["profile_image"]["name"])) . " has been uploaded."; // 성공 메시지 출력
            header("Location: mypage.php"); // 업로드 후 리디렉션
            exit();
        } else {
            echo "Sorry, there was an error uploading your file."; // 파일 업로드 오류 메시지 출력
        }
    }
}
?>
