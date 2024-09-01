document.addEventListener('DOMContentLoaded', function() {
    // 앨범 아이템에 클릭 이벤트 추가
    const albumItems = document.querySelectorAll('.album-item');

    // 현재 페이지 URL을 가져옴
    const currentPage = window.location.pathname.split('/').pop();

    albumItems.forEach(item => {
        item.addEventListener('click', function() {
            const albumId = this.getAttribute('data-id'); // 앨범 ID 추출

            let detailPage = '';
            if (currentPage === 'albums.php') {
                detailPage = 'album_detail.php'; // albums.php에서 사용할 상세 페이지
            } else if (currentPage === 'goods.php') {
                detailPage = 'goods_detail.php'; // goods.php에서 사용할 상세 페이지
            }

            window.location.href = `${detailPage}?id=${albumId}`; // 적절한 상세 페이지로 이동
        });
    });
});
