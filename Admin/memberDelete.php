<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // 匯入資料庫連接
    include 'db_connection.php';

    // 從 get 中獲取會員 ID
    $id = $_GET['id'];

    if (isset($id)) {
        // TODO
        $delete_sql = "DELETE FROM login WHERE id='$id'";  
    
        if ($conn->query($delete_sql) === TRUE) {
            echo "刪除成功!";
            // 重定向用戶到下一頁
            header('Location: memberIndex.php');
            exit;
        }else{
            echo "刪除失敗!";
        }
    
    }else{
        echo "資料不完全";
    }
?>
