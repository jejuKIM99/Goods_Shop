-- 앨범 테이블 생성
CREATE TABLE IF NOT EXISTS albums (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    production VARCHAR(100),
    sales INT DEFAULT 0,
    release_date DATE,
    INDEX (name),
    INDEX (price),
    INDEX (production),
    INDEX (release_date)
);

-- 샘플 데이터 삽입
INSERT INTO albums (name, image, price, production, sales, release_date) VALUES
('Album 1', 'path/to/image1.jpg', 19.99, 'Hoshimi', 500, '2024-01-01'),
('Album 2', 'path/to/image2.jpg', 29.99, 'Ban', 150, '2024-02-15'),
('Album 3', 'path/to/image3.jpg', 14.99, 'BIG4', 300, '2024-03-20'),
('Album 4', 'path/to/image4.jpg', 24.99, 'Hoshimi', 250, '2024-04-10');
