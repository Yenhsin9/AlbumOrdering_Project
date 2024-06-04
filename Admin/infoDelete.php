<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // 匯入資料庫連接
    include 'db_connection.php';

    // 從 get 中獲取最新消息 ID
    $info_id = $_GET['info_id'];

    if (isset($info_id)) {
        $delete_sql = "DELETE FROM new_info WHERE info_id='$info_id'";  
    
        if ($conn->query($delete_sql) === TRUE) {
            echo "刪除成功!";
            // 重定向用戶到下一頁
            header('Location: manage.php');
            exit;
        }else{
            echo "刪除失敗!";
        }
    
    }else{
        echo "資料不完全";
    }
?>
