<?php
// 設定時區為台北時間
date_default_timezone_set('Asia/Taipei');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if (isset($_POST['totalPrice'])&&isset($_POST['name'])&&isset($_POST['phone'])&&isset($_POST['email'])&&isset($_POST['pickupMethod'])&&isset($_POST['paymentMethod'])) {
        include 'db_connection.php';

        $memberID = $_SESSION['memberID'];
        $Totle = $_POST['totalPrice'];
        $Fullname = $_POST['name'];
        $Tel = $_POST['phone'];
        $Email = $_POST['email'];
        $PickupMethod = $_POST['pickupMethod'];
        $PaymentMethod = $_POST['paymentMethod'];
        $CurrentTime = date("Y-m-d H:i:s");

        $Insert_sql = "INSERT INTO orders (member_id, purchase_date, fullname, total_price, E_mail, phone_number)
        VALUES ('$memberID', '$CurrentTime', '$Fullname', '$Totle', '$Email', '$Tel')";

        if($conn->query($Insert_sql) === TRUE){
            $Get_sql = "SELECT MAX(CAST(SUBSTRING(order_id, 2) AS UNSIGNED INTEGER)) AS max_order_id FROM orders;";
            $tmp = $conn->query($Get_sql);
            $row = $tmp->fetch_assoc();
            $or_id = $row['max_order_id'];
            $or_id = "O" . sprintf("%d", $or_id);
            $GetCart_sql = "SELECT * from cart where member_id = '$memberID'";
            $GetCart_result = $conn->query($GetCart_sql);
            if ($GetCart_result->num_rows > 0) {
                while($row = $GetCart_result->fetch_array()){
                    $CpyID_sql = "INSERT INTO checkout_info (order_id, member_id, product_id, price, amount, title, info) VALUES ('$or_id', '".$row["member_id"]."', '".$row["product_id"]."', '".$row["price"]."', '".$row["amount"]."', '".$row["title"]."', '".$row["info"]."')";
                    $conn->query($CpyID_sql);
                }
            }
          
            $Delete_sql = "DELETE FROM cart WHERE member_id = $memberID;";
            if ($conn->query($Delete_sql) === TRUE) {
                echo "<script type='text/javascript'>
                    alert('下單完成!');
                    window.location.href = 'orderPage.php';
                    </script>";
                exit;
            } else {
                echo "<h2 align='center'><font color='antiquewith'>下單失敗!!</font></h2>";
            }
        
        }else{
            echo "insert失敗";
        }
        

        
    }
?>