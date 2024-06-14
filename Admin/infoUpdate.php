<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // 匯入資料庫連接
    include 'db_connection.php';

    // 從 post 中獲取最新消息 ID
    $info_id = $_POST['info_id'];

    // 查詢最新消息資料
    $findIDSql = "SELECT * FROM new_info WHERE info_id = '$info_id'";
    $findIDResult = $conn->query($findIDSql);
    $row = $findIDResult->fetch_assoc();

    // 定義更新欄位的函數
    function updateField($conn, $info_id, $fieldName, $postValue, $rowValue) {
        // 如果 POST 資料存在且不為空，則更新資料庫中的欄位值
        if (isset($postValue) && $postValue !== '') {
            $updateSql = "UPDATE new_info SET `$fieldName` = '$postValue' WHERE info_id = '$info_id'";
            $conn->query($updateSql);
            return $postValue;
        } else {
            // 如果 POST 資料不存在或為空，則保持資料庫中的原值不變
            return $rowValue;
        }
    }

    $info_date = updateField($conn, $info_id, 'info_date', $_POST['info_date'] ?? null, $row['info_date'] ?? '');
    $info = updateField($conn, $info_id, 'info', $_POST['info'] ?? null, $row['info'] ?? '');

    // 重定向至最新消息首頁
    header('Location: manage.php');
    exit();
?>
