<div id="upload-profile-image-modal" class="upload-modal"> <!-- 이미지 업로드 모달 시작 -->
    <div class="upload-modal-content"> <!-- 모달 콘텐츠 영역 -->
        <span class="upload-modal-close-btn">&times;</span> <!-- 모달 닫기 버튼 -->
        <form action="upload-profile-image.php" method="POST" enctype="multipart/form-data"> <!-- 이미지 업로드 폼 -->
            <label for="profile-image">Choose an image to upload:</label> <!-- 이미지 선택 레이블 -->
            <input type="file" id="profile-image" name="profile_image" accept="image/*" required> <!-- 파일 입력 필드 -->
            <button type="submit" class="btn">Upload Image</button> <!-- 제출 버튼 -->
        </form>
    </div>
</div>
