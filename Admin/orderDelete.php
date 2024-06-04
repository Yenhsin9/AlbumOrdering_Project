<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // 匯入資料庫連接
    include 'db_connection.php';

    // 從 get 中獲取商品 ID
    $order_id = $_GET['order_id'];

    if (isset($order_id)) {
        // TODO
        $delete_sql = "DELETE FROM orders WHERE order_id='$order_id'";  
    
        if ($conn->query($delete_sql) === TRUE) {
            echo "刪除成功!";
            // 重定向用戶到下一頁
            header('Location: orderIndex.php');
            exit;
        }else{
            echo "刪除失敗!";
        }
    
    }else{
        echo "資料不完全";
    }
?>
