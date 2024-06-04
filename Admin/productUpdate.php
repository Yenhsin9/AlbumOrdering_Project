<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // 匯入資料庫連接
    include 'db_connection.php';
    if ($_FILES['new_img']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['new_img']['tmp_name'];
        $target_dir = '../crawler/downloaded_images/';
        $target_file = $target_dir . basename($_FILES['new_img']['name']);
        $img = basename($_FILES['new_img']['name']);
        if (move_uploaded_file($tmp_name, $target_file)) {
            echo "檔案已成功上傳.";
        } else {
            echo "檔案上傳失敗.<br><a href='productDoCreate.php'>返回</a>";
        }
    }
    

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
            return mysqli_real_escape_string(isset($rowValue) ? $rowValue : '');
        }
    }

    $img = updateField($conn, $product_id, 'img', $_FILES['new_img']['name'] ?? null, $row['img'] ?? '');
    $title = updateField($conn, $product_id, 'title', $_POST['title'] ?? null, $row['title'] ?? '');
    $artist_id = updateField($conn, $product_id, 'artist_id', $_POST['artist_id'] ?? null, $row['artist_id'] ?? '');
    $info = updateField($conn, $product_id, 'info', $_POST['info'] ?? null, $row['info'] ?? '');
    $price = updateField($conn, $product_id, 'price', $_POST['price'] ?? null, $row['price'] ?? '');
    $amount = updateField($conn, $product_id, 'amount', $_POST['amount'] ?? null, $row['amount'] ?? '');

    // 重定向至商品首頁
    header('Location: productIndex.php');
    exit();
?>