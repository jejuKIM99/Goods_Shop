document.addEventListener("DOMContentLoaded", function() {
    const youtubeBg = document.querySelector(".youtube-bg");

    // 이미지 프리로드 함수
    function preloadImages(images, callback) {
        let loadedImages = 0;
        const totalImages = images.length;

        images.forEach(src => {
            const img = new Image();
            img.src = src;
            img.onload = () => {
                loadedImages++;
                if (loadedImages === totalImages) {
                    callback();
                }
            };
        });
    }

    // 배경 이미지 변경 함수
    function bgAnimation() {
        const images = ['shop/youtube/youtube_bg1.jpg', 'shop/youtube/youtube_bg2.jpg', 'shop/youtube/youtube_bg3.jpg'];
        let index = 0;

        preloadImages(images, () => {
            function changeBackground() {
                youtubeBg.style.backgroundImage = `url(${images[index]})`;
                index = (index + 1) % images.length;
            }

            changeBackground();
            setInterval(changeBackground, 100); // 1초 간격으로 이미지 변경
        });
    }

    // 초기 배경 애니메이션 시작
    bgAnimation();
});
