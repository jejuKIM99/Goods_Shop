document.addEventListener('DOMContentLoaded', function() {
    const blueBackground = document.querySelector('.blue-background');
    const mainVisual = document.querySelector('.main-visual');
    const textContent = document.querySelector('.text-content');

    // 애니메이션 시작
    setTimeout(() => {
        blueBackground.style.width = '100%'; // 배경 넓이 애니메이션
        mainVisual.style.width = '50%'; // 메인 비주얼 넓이 애니메이션
        textContent.style.left = '50%'; // 텍스트 위치 이동 애니메이션
    }, 100); // 0.1초 뒤 애니메이션 시작

    // 텍스트 애니메이션 시작
    setTimeout(() => {
        textContent.style.opacity = 1; // 텍스트 서서히 보이기
    }, 500); // 0.5초 뒤 애니메이션 시작
});
