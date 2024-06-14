<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // 匯入資料庫連接
    include 'db_connection.php';

    // 從 get 中獲取歌手 ID
    $artist_id = $_GET['artist_id'];

    if (isset($artist_id)) {
        // 先更新 product 表中相關的 artist_id
        $update_sql = "UPDATE product SET artist_id='S0' WHERE artist_id='$artist_id'";
        if ($conn->query($update_sql) === TRUE) {
            echo "相關 product 表中的 artist_id 已更新!";

            // 刪除 artist 表中的記錄
            $delete_sql = "DELETE FROM artist WHERE artist_id='$artist_id'";  
            if ($conn->query($delete_sql) === TRUE) {
                echo "刪除成功!";
                // 重定向用戶到下一頁
                header('Location: artistIndex.php');
                exit;
            } else {
                echo "刪除失敗: " . $conn->error;
            }
        } else {
            echo "更新 product 表中的 artist_id 失敗: " . $conn->error;
        }
    } else {
        echo "資料不完全";
    }

    $conn->close();
?>
