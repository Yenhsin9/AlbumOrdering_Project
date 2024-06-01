<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // 匯入資料庫連接
    include 'db_connection.php';

    // 從 post 中獲取會員 ID
    $id = $_POST['id'];

    // 查詢會員資料
    $findIDSql = "SELECT * FROM login WHERE id = '$id'";
    $findIDResult = $conn->query($findIDSql);
    $row = $findIDResult->fetch_assoc();

    // 提取會員帳號
    $account = $row['account'];

    // 定義更新欄位的函數
    function updateField($conn, $id, $fieldName, $postValue, $rowValue) {
        // 如果 POST 資料存在且不為空，則更新資料庫中的欄位值
        if (isset($postValue) && $postValue !== '') {
            $updateSql = "UPDATE login SET `$fieldName` = '$postValue' WHERE id = '$id'";
            $conn->query($updateSql);
            return $postValue;
        } else {
            // 如果 POST 資料不存在或為空，則保持資料庫中的原值不變
            return isset($rowValue) ? $rowValue : '';
        }
    }

    // 更新會員密碼
    $password = updateField($conn, $id, 'password', $_POST['password'] ?? null, $row['password'] ?? '');
    // 更新會員姓名
    $fullname = updateField($conn, $id, 'fullname', $_POST['fullname'] ?? null, $row['fullname'] ?? '');
    // 更新會員電話號碼
    $phone = updateField($conn, $id, 'phone_number', $_POST['phone_number'] ?? null, $row['phone_number'] ?? '');
    // 更新會員電子郵件
    $mail = updateField($conn, $id, 'E_mail', $_POST['E_mail'] ?? null, $row['E_mail'] ?? '');

    // 重定向至會員首頁
    header('Location: memberIndex.php');
    exit();
?>
