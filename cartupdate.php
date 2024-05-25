<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include "db_connection.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_SESSION['memberID'])) {
            $memberID = $_SESSION['memberID'];
    
            if (isset($_POST['Product_id']) && isset($_POST['quantity'])) {
                $productID = $_POST['Product_id'];
                $quantity = $_POST['quantity'];
    
                $updateQuantity_sql = "UPDATE cart SET amount = '$quantity' WHERE member_id = '$memberID' AND product_id = '$productID'";
    
                if ($conn->query($updateQuantity_sql) === TRUE) {
                    header("Location: cartPage.php");
                    exit();
                } else {
                    echo "修改失敗：" . $conn->error;
                }
            } else {
                echo "錯誤數量";
            }
        } 
    } 
    
    $conn->close();
?>