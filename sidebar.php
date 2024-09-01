<aside class="sidebar">
    <div class="sidebar-content">
        <?php
        // 현재 페이지 URL에서 파일명을 추출
        $currentPage = basename($_SERVER['PHP_SELF']);
        
        // 폼의 action URL을 설정
        $formAction = ($currentPage === 'goods.php') ? 'goods.php' : 'albums.php';
        ?>
        
        <!-- 정렬 방법 -->
        <form id="filter-form" action="<?php echo $formAction; ?>" method="get">
            <div class="filter-section">
                <h3>Sort By</h3>
                <div class="filter-option">
                    <input type="radio" id="sort-popular" name="sort" value="popular" checked>
                    <label for="sort-popular">Popular</label>
                </div>
                <div class="filter-option">
                    <input type="radio" id="sort-newest" name="sort" value="newest">
                    <label for="sort-newest">Newest</label>
                </div>
                <div class="filter-option">
                    <input type="radio" id="sort-price-low" name="sort" value="price-low">
                    <label for="sort-price-low">Price: Low to High</label>
                </div>
                <div class="filter-option">
                    <input type="radio" id="sort-price-high" name="sort" value="price-high">
                    <label for="sort-price-high">Price: High to Low</label>
                </div>
            </div>

            <!-- 가격 범위 슬라이더 -->
            <div class="price-range">
                <h3>Price Range</h3>
                <input type="range" id="price-slider" name="price" min="0" max="50000" step="1000" value="50000">
                <span id="price-value">50,000円</span>
            </div>

            <!-- 프로덕션 선택 -->
            <div class="production-filter">
                <h3>Production</h3>
                <div class="filter-option">
                    <input type="radio" id="prod-all" name="production" value="all" checked>
                    <label for="prod-all">All</label>
                </div>
                <div class="filter-option">
                    <input type="radio" id="prod-hoshimi" name="production" value="hoshimi">
                    <label for="prod-hoshimi">Hoshimi</label>
                </div>
                <div class="filter-option">
                    <input type="radio" id="prod-ban" name="production" value="ban">
                    <label for="prod-ban">Ban</label>
                </div>
                <div class="filter-option">
                    <input type="radio" id="prod-big4" name="production" value="big4">
                    <label for="prod-big4">BIG4</label>
                </div>
            </div>

            <!-- 검색 창 추가 -->
            <div class="search-container">
                <input type="text" id="search-bar" name="search" placeholder="Enter search term...">
            </div>

            <!-- 적용 버튼 -->
            <div class="apply-button-container">
                <button type="submit" id="apply-filters">Apply</button>
            </div>
        </form>
    </div>
</aside>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 가격 범위 슬라이더와 값 업데이트
    const priceSlider = document.getElementById('price-slider');
    const priceValue = document.getElementById('price-value');

    function updatePriceValue() {
        priceValue.textContent = `${priceSlider.value.toLocaleString()}円`; // 슬라이더 값 포맷팅
    }

    priceSlider.addEventListener('input', updatePriceValue);
    updatePriceValue(); // 초기값 설정

    // 사이드바 내 검색 기능
    const searchBar = document.getElementById('search-bar');

    searchBar.addEventListener('input', function() {
        const query = searchBar.value.toLowerCase(); // 검색어 소문자로 변환
        console.log('Search Query:', query); // 콘솔에 검색어 출력
    });
});
</script>
