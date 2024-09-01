document.addEventListener('DOMContentLoaded', function() {
    const addProfileImageBtn = document.getElementById('add-profile-image-btn');
    const uploadProfileImageModal = document.getElementById('upload-profile-image-modal');
    const closeBtn = document.querySelector('.upload-modal-close-btn');

    if (addProfileImageBtn && uploadProfileImageModal && closeBtn) {
        // 프로필 이미지 추가 버튼 클릭 시 모달 표시
        addProfileImageBtn.addEventListener('click', function() {
            uploadProfileImageModal.style.display = 'block';
        });

        // 모달 닫기 버튼 클릭 시 모달 숨기기
        closeBtn.addEventListener('click', function() {
            uploadProfileImageModal.style.display = 'none';
        });

        // 모달 외부 클릭 시 모달 숨기기
        window.addEventListener('click', function(event) {
            if (event.target === uploadProfileImageModal) {
                uploadProfileImageModal.style.display = 'none';
            }
        });
    } else {
        console.error('Required elements are missing.');
    }
});
