<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include 'db_connection.php';

    // 獲取所有符合條件的產品
    $FindProduct_sql = "SELECT * FROM product WHERE kind = '$Kind' ORDER BY product_id DESC";
    $FindProduct_result = $conn->query($FindProduct_sql);

    if ($FindProduct_result->num_rows > 0) {
        $products = [];
        while($row = $FindProduct_result->fetch_assoc()) {
            $products[] = $row;
        }
    } else {
        echo 'No products found.';
        exit;
    }

    if (!empty($products)) {
        $count = 0;
        foreach ($products as $product) {
            if ($count >= 6) break;
            $count++;
            ?>
            <div class="item">
                <div class="thumb">
                    <div class="hover-content">
                        <ul>
                            <li>
                                <a href="<?php echo htmlspecialchars($Link); ?>"><i class="fa fa-eye"></i></a>
                            </li>
                        </ul>
                    </div>
                    <img src="crawler/downloaded_images/<?php echo htmlspecialchars($product['img']); ?>" alt="" />
                </div>
                <div class="down-content">
                    <h4><?php echo htmlspecialchars($product['title']); ?></h4>
                    <span>NT$<?php echo htmlspecialchars($product['price']); ?></span>
                    <span><?php echo htmlspecialchars($product['info']); ?></span>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p>No products found.</p>';
    }
?>