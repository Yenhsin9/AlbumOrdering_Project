artist<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // 匯入資料庫連接
    include 'db_connection.php';

    // 接收來自表單的資料
    $info_date = mysqli_real_escape_string($conn, $_POST['info_date']);
    $info = mysqli_real_escape_string($conn, $_POST['info']);

    $insertSql = "INSERT INTO new_info (info_date, info) VALUES ('$info_date', '$info')";
   
    if ($conn->query($insertSql) === TRUE) {
        echo "新增成功";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }

    // 重定向至商品首頁
    header('Location: manage.php');
    exit();
?>
