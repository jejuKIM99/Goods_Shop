document.addEventListener('DOMContentLoaded', function() {
    const proposalBackground = document.querySelector('.proposal-background');
    const proposalImage = document.querySelector('.proposal-image');
    const proposalForm = document.querySelector('.proposal-form');

    // 애니메이션 시작
    window.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY + window.innerHeight;
        const sectionTop = document.querySelector('.best-albums').offsetTop;

        if (scrollPosition > sectionTop) {
            // 배경과 이미지 애니메이션
            proposalBackground.style.transform = 'translateX(0)';
            proposalImage.style.transform = 'translateX(10%)';
            
            // 폼 양식 서서히 보이기
            setTimeout(() => {
                proposalForm.style.opacity = 1;
            }, 500); // 배경과 이미지 애니메이션 완료 후 0.5초 뒤
        }
    });
});
