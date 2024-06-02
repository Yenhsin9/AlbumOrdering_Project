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
            // 最多6個
            // if ($count >= 6) break;
            // $count++;
            $FindArtist_sql = "SELECT * FROM artist WHERE artist_id = '" . $product['artist_id'] . "'";
            $FindArtist_result = $conn->query($FindArtist_sql);

            if ($FindArtist_result->num_rows > 0) {
                $artist = $FindArtist_result->fetch_assoc();
            } else {
                echo 'No Artist found.';
                exit;
            }
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
                        <span class="shorten_name"><?php echo htmlspecialchars($artist['artist_name']); ?></span>
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
        echo '<p>No products found.</p>';
    }
?>


