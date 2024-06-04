artist<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // 匯入資料庫連接
    include 'db_connection.php';

    // 接收來自表單的資料
    $artist_name = mysqli_real_escape_string($conn, $_POST['artist_name']);
    $company = isset($_POST['company']) ? mysqli_real_escape_string($conn, $_POST['company']) : NULL;

    $insertSql = "INSERT INTO artist (artist_name, company) VALUES ('$artist_name', ";
    $insertSql .= $company ? ", '$company')" : ", NULL)";
   
    if ($conn->query($insertSql) === TRUE) {
        echo "新增商品成功";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }

    // 重定向至商品首頁
    header('Location: artistIndex.php');
    exit();
?>
