<?php
// 페이지당 앨범 수
$albumsPerPage = 20;

// 현재 페이지 번호
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page > 0 ? $page : 1;

// 페이지당 앨범 수에 따라 시작 위치 계산
$offset = ($page - 1) * $albumsPerPage;

// 기본 쿼리
$query = "SELECT * FROM albums";

// 필터 및 정렬 기능 추가
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'popular'; // 기본 정렬 방식
$production = isset($_GET['production']) ? $_GET['production'] : 'all'; // 기본 생산국
$price = isset($_GET['price']) ? intval($_GET['price']) : 50000; // 기본 가격 상한
$search = isset($_GET['search']) ? $_GET['search'] : ''; // 기본 검색어

if ($production != 'all') {
    $query .= " WHERE production = :production";
}
if (!empty($search)) {
    $query .= ($production != 'all' ? " AND" : " WHERE") . " name LIKE :search";
}
if ($price < 50000) {
    $query .= ($production != 'all' || !empty($search) ? " AND" : " WHERE") . " price <= :price";
}
if ($sort == 'popular') {
    $query .= " ORDER BY sales DESC";
} elseif ($sort == 'newest') {
    $query .= " ORDER BY release_date DESC";
} elseif ($sort == 'price-low') {
    $query .= " ORDER BY price ASC";
} elseif ($sort == 'price-high') {
    $query .= " ORDER BY price DESC";
}

// 페이지네이션 적용
$query .= " LIMIT :limit OFFSET :offset";

try {
    $stmt = $pdo->prepare($query);
    if ($production != 'all') {
        $stmt->bindParam(':production', $production);
    }
    if (!empty($search)) {
        $stmt->bindValue(':search', '%' . $search . '%');
    }
    if ($price < 50000) {
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    }
    $stmt->bindValue(':limit', $albumsPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $albums = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    $albums = [];
}

// 총 앨범 수를 계산하기 위한 쿼리
$countQuery = "SELECT COUNT(*) FROM albums";
if ($production != 'all') {
    $countQuery .= " WHERE production = :production";
}
if (!empty($search)) {
    $countQuery .= ($production != 'all' ? " AND" : " WHERE") . " name LIKE :search";
}

try {
    $countStmt = $pdo->prepare($countQuery);
    if ($production != 'all') {
        $countStmt->bindParam(':production', $production);
    }
    if (!empty($search)) {
        $countStmt->bindValue(':search', '%' . $search . '%');
    }
    $countStmt->execute();
    $totalCount = $countStmt->fetchColumn();
    $totalPages = ceil($totalCount / $albumsPerPage);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    $totalPages = 1;
}

// 페이지네이션 정보 반환
return [
    'albums' => $albums,
    'totalPages' => $totalPages,
    'currentPage' => $page
];
?>
