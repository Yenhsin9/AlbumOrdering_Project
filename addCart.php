<?php
// 開啟錯誤訊息
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if ($_POST['mySelectValue'] && $_POST['rowProductId'] && $_POST['rowProductPrice']) {
    $Amount = $_POST['mySelectValue'];
    $Product_id = $_POST['rowProductId'];
    $Product_Price = $_POST['rowProductPrice'];
    // ******** 更新你的个人设置 ******** 
    $servername = "140.122.184.129:3310";
    $username = "team20";
    $password = "5EGyOY_grkiT[U0j";
    $dbname = "team20";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $conn->error);
        exit();
    }

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $memberID = $_SESSION['memberID'];
    $check_existing_sql = "SELECT COUNT(*) as count FROM cart WHERE member_id = '$memberID' AND product_id = '$Product_id'";
    $result = $conn->query($check_existing_sql);
    $row = $result->fetch_assoc();
    $existing_count = $row['count'];

    if ($existing_count > 0) {
        // 如果已存在，更新amount
        $update_sql = "UPDATE cart SET amount = amount + $Amount WHERE member_id = '$memberID' AND product_id = '$Product_id'";
        if ($conn->query($update_sql) === TRUE) {
            echo "<div>購物車更新成功</div>";
            echo "<div style='display: flex; gap: 10px;' ><a href='mainPage.php'>繼續購物</a><a href='cartPage.php'>前往購物車</a></div>";
        } else {
            echo "<h2 align='center'><font color='antiquewith'>更新購物車失敗!!</font></h2>";
        }
    } else {
        $InsertCart_sql = "INSERT INTO cart (member_id, product_id, price, amount) VALUES ('$memberID', '$Product_id', '$Product_Price', '$Amount')";
        if ($conn->query($InsertCart_sql) === TRUE) {
            echo "<div>加入購物車成功</div>";
            echo "<div style='display: flex; gap: 10px;' ><a href='mainPage.php'>繼續購物</a><a href='cartPage.php'>前往購物車</a></div>";
        } else {
            echo "<h2 align='center'><font color='antiquewith'>新增購物車失敗!!</font></h2>";
        }
    }
} else {
    echo '没有接收到需要的数据';
}
?>
