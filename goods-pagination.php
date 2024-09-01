<?php
// 페이지당 굿즈 수
$goodsPerPage = 20;

// 현재 페이지 번호
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page > 0 ? $page : 1;

// 페이지당 굿즈 수에 따라 시작 위치 계산
$offset = ($page - 1) * $goodsPerPage;

// 기본 쿼리
$query = "SELECT * FROM goods";

// 필터 및 정렬 기능 추가
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'popular';
$production = isset($_GET['production']) ? $_GET['production'] : 'all';
$price = isset($_GET['price']) ? intval($_GET['price']) : 50000;
$search = isset($_GET['search']) ? $_GET['search'] : '';

// 제작사 필터 적용
if ($production != 'all') {
    $query .= " WHERE production = :production";
}
// 검색어 필터 적용
if (!empty($search)) {
    $query .= ($production != 'all' ? " AND" : " WHERE") . " name LIKE :search";
}
// 가격 필터 적용
if ($price < 50000) {
    $query .= ($production != 'all' || !empty($search) ? " AND" : " WHERE") . " price <= :price";
}
// 정렬 조건 적용
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
    // 제작사 필터 바인딩
    if ($production != 'all') {
        $stmt->bindParam(':production', $production);
    }
    // 검색어 필터 바인딩
    if (!empty($search)) {
        $stmt->bindValue(':search', '%' . $search . '%');
    }
    // 가격 필터 바인딩
    if ($price < 50000) {
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    }
    // 페이지네이션 파라미터 바인딩
    $stmt->bindValue(':limit', $goodsPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $goods = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    $goods = [];
}

// 총 굿즈 수를 계산하기 위한 쿼리
$countQuery = "SELECT COUNT(*) FROM goods";
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
    $totalPages = ceil($totalCount / $goodsPerPage);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    $totalPages = 1;
}

// 페이지네이션 정보 반환
return [
    'goods' => $goods,
    'totalPages' => $totalPages,
    'currentPage' => $page
];
