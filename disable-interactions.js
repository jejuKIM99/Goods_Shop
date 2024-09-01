document.addEventListener('DOMContentLoaded', () => {
    // 오른쪽 클릭 방지
    document.addEventListener('contextmenu', (event) => {
        event.preventDefault(); // 기본 동작(오른쪽 클릭 메뉴) 방지
    });

    // 드래그 방지
    document.addEventListener('dragstart', (event) => {
        event.preventDefault(); // 드래그 시작 방지
    });

    // 텍스트 선택 방지
    document.addEventListener('selectstart', (event) => {
        event.preventDefault(); // 텍스트 선택 방지
    });

    // 텍스트 복사 방지 (선택된 텍스트 복사 방지)
    document.addEventListener('copy', (event) => {
        event.preventDefault(); // 텍스트 복사 방지
    });
});
