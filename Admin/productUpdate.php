<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // 匯入資料庫連接
    include 'db_connection.php';

    // 從 post 中獲取商品 ID
    $product_id = $_POST['product_id'];

    // 查詢商品資料
    $findIDSql = "SELECT * FROM product WHERE product_id = '$product_id'";
    $findIDResult = $conn->query($findIDSql);
    $row = $findIDResult->fetch_assoc();

    // 定義更新欄位的函數
    function updateField($conn, $product_id, $fieldName, $postValue, $rowValue) {
        // 如果 POST 資料存在且不為空，則更新資料庫中的欄位值
        if (isset($postValue) && $postValue !== '') {
            $updateSql = "UPDATE product SET `$fieldName` = '$postValue' WHERE product_id = '$product_id'";
            $conn->query($updateSql);
            return $postValue;
        } else {
            // 如果 POST 資料不存在或為空，則保持資料庫中的原值不變
            return isset($rowValue) ? $rowValue : '';
        }
    }

    $img = updateField($conn, $product_id, 'img', $_POST['img'] ?? null, $row['img'] ?? '');
    $title = updateField($conn, $product_id, 'title', $_POST['title'] ?? null, $row['title'] ?? '');
    $info = updateField($conn, $product_id, 'info', $_POST['info'] ?? null, $row['info'] ?? '');
    $price = updateField($conn, $product_id, 'price', $_POST['price'] ?? null, $row['price'] ?? '');
    $amount = updateField($conn, $product_id, 'amount', $_POST['amount'] ?? null, $row['amount'] ?? '');

    // 重定向至商品首頁
    header('Location: productIndex.php');
    exit();
?>
