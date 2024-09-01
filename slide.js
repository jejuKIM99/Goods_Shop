document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.slider'); // 슬라이더 요소 선택
    const slides = document.querySelectorAll('.slide'); // 모든 슬라이드 요소 선택
    const totalSlides = slides.length; // 총 슬라이드 개수
    let currentIndex = 0; // 현재 슬라이드 인덱스
    let autoSlideInterval; // 자동 슬라이드 타이머 변수

    function goToSlide(index) {
        if (index >= totalSlides) index = 0; // 인덱스가 총 슬라이드 수를 초과하면 첫 슬라이드로 이동
        if (index < 0) index = totalSlides - 1; // 인덱스가 음수면 마지막 슬라이드로 이동
        slider.style.transform = `translateX(${-index * 100}%)`; // 슬라이드를 왼쪽으로 이동
        currentIndex = index; // 현재 슬라이드 인덱스 업데이트
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            goToSlide(currentIndex + 1); // 다음 슬라이드로 이동
        }, 4000); // 슬라이드 속도를 4초로 설정
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval); // 자동 슬라이드 타이머 중지
    }

    document.querySelector('.arrow-left').addEventListener('click', () => {
        stopAutoSlide(); // 자동 슬라이드 중지
        goToSlide(currentIndex - 1); // 이전 슬라이드로 이동
        setTimeout(startAutoSlide, 3000); // 3초 후 자동 슬라이드 재시작
    });

    document.querySelector('.arrow-right').addEventListener('click', () => {
        stopAutoSlide(); // 자동 슬라이드 중지
        goToSlide(currentIndex + 1); // 다음 슬라이드로 이동
        setTimeout(startAutoSlide, 3000); // 3초 후 자동 슬라이드 재시작
    });

    startAutoSlide(); // 자동 슬라이드 시작
});
