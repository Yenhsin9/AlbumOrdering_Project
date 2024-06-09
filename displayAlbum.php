<style>
    .no-product-found {
        line-height: 3em; 
        margin-top: 20px; 
    }
</style>
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include 'db_connection.php';

    // 基本查詢語句
    $FindProduct_sql = "SELECT product.*, artist.artist_name FROM product LEFT JOIN artist ON product.artist_id = artist.artist_id WHERE product.kind = '$Kind'";

    // 添加搜尋條件
    $Search = mysqli_real_escape_string($conn, $Search);
    $FindProduct_sql .= " AND (product.title LIKE '%$Search%' OR artist.artist_name LIKE '%$Search%')";

    $FindProduct_sql .= " ORDER BY product.product_id DESC";
    $FindProduct_result = $conn->query($FindProduct_sql);

    if ($FindProduct_result->num_rows > 0) {
        $products = [];
        while ($row = $FindProduct_result->fetch_assoc()) {
            $products[] = $row;
        }
    } 

    if (!empty($products)) {
        $count = 0;
        foreach ($products as $product) {
            // 最多6個
            // if ($count >= 6) break;
            // $count++;
            ?>

            <div class="element">
                <div class="prd-box">
                    <div class="prd-img">
                        <a title="<?php echo htmlspecialchars(str_replace('.jpg', '', $product['img'])); ?>" href="crawler/downloaded_images/<?php echo htmlspecialchars($product['img']); ?>">
                            <img src="crawler/downloaded_images/<?php echo htmlspecialchars($product['img']); ?>" alt="<?php echo htmlspecialchars($product['img']); ?>">
                        </a>
                    </div>

                    <a title="<?php echo htmlspecialchars(str_replace('.jpg', '', $product['img'])); ?>">
                        <span class="shorten" style="color: #000000;"><?php echo htmlspecialchars($product['title']); ?></span>
                        <span class="shorten_name"><?php echo htmlspecialchars($product['info']); ?></span>
                        <span class="shorten_name"><?php echo htmlspecialchars($product['artist_name']); ?></span>
                        <span class="shorten_name">NT$<span class="price_tw"><?php echo htmlspecialchars($product['price']); ?></span>元</span>
                        <span class="shorten_click">
                            <form method="post" action="addCart.php">
                                <input type="number" id="mySelectValue" name="mySelectValue" value="1" min="1" max="29">
                                <input type="hidden" name="rowProductId" value="<?php echo trim($product['product_id']); ?>">
                                <input type="hidden" name="rowProductPrice" id="rowProductPrice" value="<?php echo trim($product['price']); ?>">
                                <input type="hidden" name="kind" id="kind" value="<?php echo $Kind; ?>">
                                <input type="hidden" name="title" id="title" value="<?php echo trim($product['title']); ?>"> 
                                <input type="hidden" name="info" id="info" value="<?php echo trim($product['info']); ?>">
                                <button type="submit">加入購物車</button>
                            </form>
                        </span>
                    </a>
                </div>
            </div>

            <?php
        }
    } else {
        echo '<div class="no-product-found">沒有找到此商品</div>';
    }
?>
