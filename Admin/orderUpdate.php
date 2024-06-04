<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // 匯入資料庫連接
    include 'db_connection.php';

    // 從 post 中獲取商品 ID
    $order_id = $_POST['order_id'];

    // 查詢商品資料
    $findIDSql = "SELECT * FROM orders WHERE order_id = '$order_id'";
    $findIDResult = $conn->query($findIDSql);
    $row = $findIDResult->fetch_assoc();

    // 定義更新欄位的函數
    function updateField($conn, $order_id, $fieldName, $postValue, $rowValue) {
        // 如果 POST 資料存在且不為空，則更新資料庫中的欄位值
        if (isset($postValue) && $postValue !== '') {
            $updateSql = "UPDATE orders SET `$fieldName` = '$postValue' WHERE order_id = '$order_id'";
            $conn->query($updateSql);
            return $postValue;
        } else {
            // 如果 POST 資料不存在或為空，則保持資料庫中的原值不變
            return mysqli_real_escape_string(isset($rowValue) ? $rowValue : '');
        }
    }

    $conditions = updateField($conn, $order_id, 'conditions', $_POST['conditions'] ?? null, $row['conditions'] ?? '');
    $completion_date = updateField($conn, $order_id, 'completion_date', $_POST['completion_date'] ?? null, $row['completion_date'] ?? '');
    $fullname = updateField($conn, $order_id, 'fullname', $_POST['fullname'] ?? null, $row['fullname'] ?? '');
    $phone_number = updateField($conn, $order_id, 'phone_number', $_POST['phone_number'] ?? null, $row['phone_number'] ?? '');
    $price = updateField($conn, $order_id, 'price', $_POST['price'] ?? null, $row['price'] ?? '');
    $E_mail = updateField($conn, $order_id, 'E_mail', $_POST['E_mail'] ?? null, $row['E_mail'] ?? '');

    // 重定向至商品首頁
    header('Location: orderIndex.php');
    exit();
?>
