<!-- main.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 문서의 문자 인코딩을 UTF-8로 설정 -->
    <meta charset="UTF-8">
    <!-- 뷰포트 설정, 모바일 기기에서 적절한 확대 비율 유지 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 페이지 제목 설정 -->
    <title>Main Page</title>
    <!-- 외부 스타일시트 연결 -->
    <link rel="stylesheet" href="styles.css">
    <!-- 웹사이트의 아이콘 설정 -->
    <link rel="icon" href="favicon.ico" />
    <!-- 외부 자바스크립트 파일을 비동기로 로드 (스크립트 로드가 완료된 후 실행) -->
    <script src="disable-interactions.js" defer></script>
</head>
<body>
    <!-- 네비게이션 바를 포함 (nav.php 파일을 사용) -->
    <?php include 'nav.php'; ?>

    <main>
        <!-- 광고 배너 슬라이드 영역 -->
        <section class="banner-slider">
            <div class="slider-container">
                <div class="slider">
                    <!-- 각각의 슬라이드 항목 -->
                    <div class="slide"><a href="#"><img src="shop/top_slick1.jpg" alt="Banner 1"></a></div>
                    <div class="slide"><a href="#"><img src="shop/top_slick2.jpg" alt="Banner 2"></a></div>
                    <div class="slide"><a href="#"><img src="shop/top_slick3.jpg" alt="Banner 3"></a></div>
                    <div class="slide"><a href="#"><img src="shop/top_slick4.JPG" alt="Banner 4"></a></div>
                </div>
                <!-- 슬라이드를 전환할 수 있는 버튼들 -->
                <button class="arrow arrow-left"><img src="arrow_back.png" alt="Previous"></button>
                <button class="arrow arrow-right"><img src="arrow_forward.png" alt="Next"></button>
            </div>
        </section>

        <!-- 신상품 영역 -->
        <section class="new-arrivals" id="new-arrivals">
            <div class="new-arrivals-header">
                <!-- 신상품 제목과 "더보기" 링크 -->
                <h2>NEW</h2>
                <a href="#" class="more-link">more</a>
            </div>
            <div class="new-arrivals-container">
                <!-- 신상품 항목들 -->
                <a href="#" class="product-item"><img src="shop/album/new album_1.png" alt="New Album 1"></a>
                <a href="#" class="product-item"><img src="shop/album/new album_2.png" alt="New Album 2"></a>
                <a href="#" class="product-item"><img src="shop/album/new album_3.jpg" alt="New Album 3"></a>
                <a href="#" class="product-item"><img src="shop/album/new album_4.png" alt="New Album 4"></a>
            </div>
        </section>

        <!-- 인기 앨범 소개 영역 -->
        <section class="best-albums" id="best-albums">
            <div class="best-albums-header">
                <!-- 인기 앨범 제목과 "더보기" 링크 -->
                <h2>BEST_ALBUM</h2>
                <a href="#" class="more-link">more</a>
            </div>
            <div class="best-albums-container">
                <div class="album-item">
                    <div class="album-image">
                        <div class="album-image-inner">
                            <!-- 앨범 이미지 -->
                            <img src="shop/album/new album_6.jpg" alt="Best Album 1">
                        </div>
                    </div>
                    <div class="album-details">
                        <!-- 앨범 제목과 가격, 트랙리스트 -->
                        <h3>Question〈完全生産限定盤〉</h3>
                        <p class="price">5,455円+税</p>
                        <p class="tracklist">
                            LAWSON presents IDOLY PRIDE VENUS PARTY The First  Special Summer<br>
                            01. Fight oh! MIRAI oh! [星見プロダクション]<br>
                            02. IDOLY PRIDE [星見プロダクション]<br>
                            03. 最愛よ君に届け [月のテンペスト]<br>
                            04. 恋と花火 [月のテンペスト]<br>
                            05. The One and Only [月のテンペスト]<br>
                            06. 月下儚美 [月のテンペスト]<br>
                            07. サヨナラから始まる物語 [星見プロダクション]<br>
                            08. Gemstones [星見プロダクション]<br>
                            09. The Sun, Moon and Stars [星見プロダクション]
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- YouTube 비디오 영역 -->
        <section class="youtube-section" id="youtube-section">
            <div class="youtube-bg"></div>
            <div class="youtube-fog">
                <!-- 배경 이미지 -->
                <img src="shop/youtube/youtube_fog.png" alt="Fog">
            </div>
            <div class="youtube-player-container">
                <!-- YouTube 비디오 iframe -->
                <iframe style="border-radius: 0.8rem" width="798" height="449" src="https://www.youtube.com/embed/1MIbliPQl9s" title="【3Dライブ（4K対応）】Bang Bang ／ ⅢX【IDOLY PRIDE/アイプラ】" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </section>

        <!-- 사업 제안하기 영역 -->
        <section class="proposal-section" id="proposal-section">
            <div class="proposal-background"></div>
            <div class="proposal-image">
                <!-- 제안 이미지 -->
                <img src="connect_1.png" alt="Connect Image">
            </div>
            <div class="proposal-form">
                <!-- 사업 제안 폼 -->
                <form id="proposal-form">
                    <h2>Business Proposal</h2>
                    <!-- 입력 필드들 -->
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" required>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </section>
    </main>

    <!-- 푸터 영역 -->
    <footer>
        <div class="footer-content">
            <!-- 푸터에 대한 정보 -->
            <p>저작권 © Hyun Su Kim</p>
            <p>대표자 이메일: admin@naver.com</p>
            <p>대표자 전화번호: 000-0000-0000</p>
            <p>문의전화: 000-000-0000</p>
            <p>주소: 서울시 강남구 예시로 123</p>
        </div>
    </footer>

    <!-- 추가 자바스크립트 파일들 (슬라이드, 제안 폼, YouTube 관련) -->
    <script defer src="slide.js"></script>
    <script defer src="proposal.js"></script>
    <script defer src="youtube.js"></script>
</body>
</html>
