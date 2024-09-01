<?php
session_start(); // 세션 시작 (로그인 상태 확인 및 관리)
?>
<header>
    <nav>
        <div class="nav-left">
            <!-- 로고 링크 (메인 페이지로 이동) -->
            <a href="main.php"><img src="logo2.png" alt="Logo" class="logo"></a>
        </div>
        <div class="nav-center">
            <!-- 내비게이션 링크들 -->
            <a href="#">NEW</a>
            <a href="albums.php">ALBUMS</a>
            <a href="goods.php">GOODS</a>
            <a href="community.php">COMMUNITY</a>
        </div>
        <div class="nav-right">
            <!-- 장바구니 아이콘 링크 -->
            <a href="cart.php">
                <img src="nav/cart.png" alt="Cart" class="cart-icon">
            </a>
            <?php if (isset($_SESSION['user_email'])): ?>
                <!-- 로그인 상태일 때 -->
                <a href="mypage.php" id="mypage-btn" class="login-button">My Page</a>
                <a href="logout.php" id="logout-btn" class="login-button">Logout</a>
            <?php else: ?>
                <!-- 로그인 상태가 아닐 때 -->
                <a href="#" id="login-btn" class="login-button">Login</a>
                <a href="#" id="signin-btn" class="login-button">Sign In</a>
            <?php endif; ?>
        </div>
    </nav>
    <!-- 네비게이션 바와 본문 영역 사이에 파란색 선 추가 -->
    <div class="nav-separator"></div>
</header>

<!-- 모달 HTML 구조 추가 -->
<div id="login-modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span> <!-- 모달 닫기 버튼 -->
        <div class="modal-form" id="modal-form-content">
            <!-- 폼 내용은 JavaScript로 동적으로 로드됩니다 -->
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginBtn = document.getElementById('login-btn'); // 로그인 버튼
    const signinBtn = document.getElementById('signin-btn'); // 회원가입 버튼
    const modal = document.getElementById('login-modal'); // 모달
    const closeBtn = document.querySelector('.close-btn'); // 모달 닫기 버튼
    const modalFormContent = document.getElementById('modal-form-content'); // 모달 폼 내용

    // 폼을 동적으로 로드하는 함수
    function loadForm(url) {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                modalFormContent.innerHTML = data;

                // 이벤트 리스너를 추가하여 폼의 하단 텍스트 클릭 시 폼 전환 기능 구현
                const loginToSignin = document.querySelector('.login-to-signin');
                const signinToLogin = document.querySelector('.signin-to-login');

                if (loginToSignin) {
                    loginToSignin.addEventListener('click', (e) => {
                        e.preventDefault(); // 링크 기본 동작 방지
                        loadForm('signup-form.php'); // 회원가입 폼 로드
                    });
                }

                if (signinToLogin) {
                    signinToLogin.addEventListener('click', (e) => {
                        e.preventDefault(); // 링크 기본 동작 방지
                        loadForm('login-form.php'); // 로그인 폼 로드
                    });
                }
            })
            .catch(error => console.error('Error loading form:', error)); // 오류 처리
    }

    // 로그인 버튼 클릭 시 로그인 폼 로드
    loginBtn && loginBtn.addEventListener('click', () => {
        loadForm('login-form.php');
        modal.style.display = 'block'; // 모달 표시
    });

    // Sign In 버튼 클릭 시 회원가입 폼 로드
    signinBtn && signinBtn.addEventListener('click', () => {
        loadForm('signup-form.php');
        modal.style.display = 'block'; // 모달 표시
    });

    // 모달 닫기 버튼 클릭 시 모달 닫기
    closeBtn && closeBtn.addEventListener('click', () => {
        modal.style.display = 'none'; // 모달 숨기기
    });

    // 모달 외부 클릭 시 모달 닫기
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none'; // 모달 숨기기
        }
    });

    // 스크롤 이벤트 처리
    window.addEventListener('scroll', () => {
        const header = document.querySelector('header');
        if (header) {
            // 스크롤 위치에 따라 헤더의 클래스 추가/제거
            if (window.scrollY > 50) {
                header.classList.add('scrolled'); // 스크롤 시 헤더에 클래스 추가
            } else {
                header.classList.remove('scrolled'); // 스크롤 위치가 상단으로 돌아오면 클래스 제거
            }
        }
    });
});
</script>
