<?php
if (isset($_GET['order']) && isset($_GET['kind'])) {
    $Order = intval($_GET['order']) + 1; 
    $Kind = $_GET['kind'];

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include 'db_connection.php';

    $FindProduct_sql = "SELECT * FROM product WHERE kind = '$Kind' ORDER BY product_id DESC LIMIT $Order, 1";
    $FindProduct_result = $conn->query($FindProduct_sql);

    if ($FindProduct_result->num_rows > 0) {
        $row = $FindProduct_result->fetch_assoc();
        $Title = $row['title'];
        $Price = $row['price'];
        $Info = $row['info'];
        $Img = "crawler/downloaded_images/" . $row['img']; // 确保路径正确
    } else {
        echo 'No products found.';
        exit;
    }
} else {
    echo 'nothing';
    exit;
}
?>
<div class="item">
    <div class="thumb">
        <div class="hover-content">
            <ul>
                <li>
                    <a href="koreanProduct.php"><i class="fa fa-eye"></i></a>
                </li>
            </ul>
        </div>
        <img src="<?php echo $Img; ?>" alt="" />
    </div>
    <div class="down-content">
        <h4><?php echo $Title; ?></h4>
        <span>NT$<?php echo $Price; ?></span>
        <span><?php echo $Info; ?></span>
    </div>
</div>
