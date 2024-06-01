CREATE TABLE administrator (
	id VARCHAR(20),
	account VARCHAR(20),
	password VARCHAR(20),
	PRIMARY KEY (admin_id)
	) ENGINE = INNODB;

-- 新增login代替member
CREATE TABLE LOGIN (
	id VARCHAR (20),
	account VARCHAR(20),
	fullname VARCHAR(30),
	password VARCHAR(20),
	phone_number VARCHAR(20) NULL,
	E_mail VARCHAR(30) NULL,
	PRIMARY KEY (id)
	) ENGINE = INNODB;

CREATE TABLE artist (
	artist_id VARCHAR(20),
	artist_name VARCHAR(30),
	company VARCHAR(30),
	PRIMARY KEY (artist_id)
	) ENGINE = INNODB;

CREATE TABLE new_info (
	info_num VARCHAR(20),
	info_date VARCHAR(20),
	info VARCHAR(1024),
	PRIMARY KEY (info_num)
	) ENGINE = INNODB;

-- 新增img
CREATE TABLE product (
	product_id VARCHAR(20),
	img VARCHAR(30),
	kind VARCHAR(10),
	title VARCHAR(30),
	artist_id VARCHAR(20),
	info VARCHAR(100),
	price INT,
	amount INT,
	PRIMARY KEY (product_id),
	FOREIGN KEY (artist_id) REFERENCES artist(artist_id) ON DELETE SET NULL
	) ENGINE = INNODB;

-- 改 login(id)
CREATE TABLE cart (
	member_id VARCHAR(20),
	product_id VARCHAR(20),
	price INT,
	amount INT,
	-- PRIMARY KEY (member_id, product_id),
	FOREIGN KEY (member_id) REFERENCES LOGIN (id) ON DELETE CASCADE,
	FOREIGN KEY (product_id) REFERENCES product(product_id) ON DELETE SET NULL
	) ENGINE = INNODB;

-- 改
CREATE TABLE orders (
	order_id VARCHAR(20),
	member_id VARCHAR(20),
	purchase_date VARCHAR(20),
	fullname VARCHAR(30),
	total_price INT,
	completion_date VARCHAR(20),
	conditions VARCHAR(3) SET DEFAULT '已下單',
	E_mail VARCHAR(30),
	phone_number VARCHAR(20),
	PRIMARY KEY (order_id),
	FOREIGN KEY (member_id) REFERENCES login(id) ON DELETE CASCADE
	) ENGINE = INNODB;
	
-- 改
CREATE TABLE checkout_info (
	order_id VARCHAR(20),
	member_id VARCHAR(20),
	product_id VARCHAR(20),
	price INT,
	amount INT,
	FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
	FOREIGN KEY (member_id) REFERENCES LOGIN (id) ON DELETE CASCADE,
	FOREIGN KEY (product_id) REFERENCES product(product_id) ON DELETE SET NULL
	) ENGINE = INNODB;

-- 新增kind計數
CREATE TABLE kind_count (
    kind VARCHAR(50) PRIMARY KEY,
    count INT NOT NULL
);

-- 新增artist記數
CREATE TABLE IF NOT EXISTS artist_count (
    count INT NOT NULL
);
insert artist_count(count) value (0);

-- 新增order記數
CREATE TABLE IF NOT EXISTS order_count (
    count INT NOT NULL
);
insert order_count(count) value (0);



DELIMITER //
DROP TRIGGER IF EXISTS before_orders_insert;
CREATE TRIGGER before_orders_insert
BEFORE INSERT ON orders
FOR EACH ROW
BEGIN
    DECLARE max_count INT;
    DECLARE v_new_order_id VARCHAR(20);

    -- 獲取最大 count
    UPDATE order_count SET count = count + 1;
    SELECT count INTO max_count FROM order_count;

    -- 生成新的 order_id
    SET v_new_order_id = CONCAT('O', max_count);
    SET NEW.order_id = v_new_order_id;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS before_artist_insert;
-- 更新 artist 表的觸發器
CREATE TRIGGER before_artist_insert
BEFORE INSERT ON artist
FOR EACH ROW
BEGIN
    DECLARE max_count INT;
    DECLARE v_new_artist_id VARCHAR(20);

    -- 檢查 artist_name 是否已存在
    IF EXISTS (SELECT 1 FROM artist WHERE artist_name = NEW.artist_name) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Artist name already exists, cannot insert';
    ELSE
        -- 獲取最大count
		UPDATE artist_count SET count = count + 1;
		SELECT count INTO max_count FROM artist_count;

        -- 生成新的 artist_id
        SET v_new_artist_id = CONCAT('S', max_count);
        SET NEW.artist_id = v_new_artist_id;
    END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS before_product_insert;
-- 更新 product 表的觸發器
CREATE TRIGGER before_product_insert
BEFORE INSERT ON product
FOR EACH ROW
BEGIN
    DECLARE new_count INT;
    DECLARE v_artist_id VARCHAR(20);

    -- 檢查 artist_name 是否已存在，不存在則插入
    IF NOT EXISTS (SELECT 1 FROM artist WHERE artist_name = NEW.artist_id) THEN
        INSERT INTO artist (artist_name) VALUES (NEW.artist_id);
        SET v_artist_id = (SELECT artist_id FROM artist WHERE artist_name = NEW.artist_id);
        SET NEW.artist_id = v_artist_id;
    ELSE
        SET NEW.artist_id = (SELECT artist_id FROM artist WHERE artist_name = NEW.artist_id);
    END IF;

    -- 更新 kind_count 表
    SELECT count INTO new_count FROM kind_count WHERE kind = NEW.kind FOR UPDATE;

    IF new_count IS NULL THEN
        SET new_count = 1;
        INSERT INTO kind_count (kind, count) VALUES (NEW.kind, new_count);
    ELSE
        SET new_count = new_count + 1;
        UPDATE kind_count SET count = new_count WHERE kind = NEW.kind;
    END IF;

    -- 將種類和數量合併生成 product_id
    SET NEW.product_id = CONCAT(TRIM(NEW.kind), TRIM(new_count));
END //
DELIMITER ;

