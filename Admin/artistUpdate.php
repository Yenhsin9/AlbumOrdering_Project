<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // 匯入資料庫連接
    include 'db_connection.php';

    // 從 post 中獲取歌手 ID
    $artist_id = $_POST['artist_id'];

    // 查詢歌手資料
    $findIDSql = "SELECT * FROM artist WHERE artist_id = '$artist_id'";
    $findIDResult = $conn->query($findIDSql);
    $row = $findIDResult->fetch_assoc();

    // 定義更新欄位的函數
    function updateField($conn, $artist_id, $fieldName, $postValue, $rowValue) {
        // 如果 POST 資料存在且不為空，則更新資料庫中的欄位值
        if (isset($postValue) && $postValue !== '') {
            $updateSql = "UPDATE artist SET `$fieldName` = '$postValue' WHERE artist_id = '$artist_id'";
            $conn->query($updateSql);
            return $postValue;
        } else {
            // 如果 POST 資料不存在或為空，則保持資料庫中的原值不變
            return $rowValue;
        }
    }

    $artist_name = updateField($conn, $artist_id, 'artist_name', $_POST['artist_name'] ?? null, $row['artist_name'] ?? '');
    $company = updateField($conn, $artist_id, 'company', $_POST['company'] ?? null, $row['company'] ?? '');

    // 重定向至歌手首頁
    header('Location: artistIndex.php');
    exit();
?>
