<?php
    // if (isset($_GET['order'])&&isset($_GET['kind'])) {
    //     $Order = $_GET['order'];
    //     $Kind = $_GET['kind'];
    //     // ******** update your personal settings ******** 
    //     $servername = "140.122.184.129:3310";
    //     $username = "team20";
    //     $password = "5EGyOY_grkiT[U0j";
    //     $dbname = "team20";

    //     // Connecting to and selecting a MySQL database
    //     $conn = mysqli_connect($servername, $username, $password, $dbname);

    //     if (!$conn->set_charset("utf8")) {
    //         printf("Error loading character set utf8: %s\n", $conn->error);
    //         exit();
    //     }

    //     // Check connection
    //     if ($conn->connect_error) {
    //         die("Connection failed: " . $conn->connect_error);
    //     } 

    //     $FindProduct_sql = "SELECT * FROM product WHERE kind = '$Kind' ORDER BY product_id DESC limit $Order,1";
    //     $FindProduct_result = $conn->query($FindProduct_sql);
    //     $row = $FindProduct_result->fetch_assoc();
    //     $Title = $row['title'];
    //     $Price = $row['price'];
    //     $Info  = $row['info'];
    //     echo "<h4>$Title : $Info</h4>
    //     <span>NT$$Price</span>";
    // }else{
    //     echo 'nothing';
    // }
?>

<?php
if (isset($_GET['kind'])) {
    $Kind = $_GET['kind'];

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
} else {
    echo 'nothing';
    exit;
}
?>

<?php if (!empty($products)): ?>
    <?php foreach ($products as $product): ?>
        <div class="item">
            <div class="thumb">
                <div class="hover-content">
                    <ul>
                        <li>
                            <a href="<?php echo $herfKind; ?>"><i class="fa fa-eye"></i></a>
                        </li>
                    </ul>
                </div>
                <img src="crawler/downloaded_images/<?php echo $product['img']; ?>" alt="" />
            </div>
            <div class="down-content">
                <h4><?php echo $product['title']; ?></h4>
                <span>NT$<?php echo $product['price']; ?></span>
                <span><?php echo $product['info']; ?></span>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No products found.</p>
<?php endif; ?>
