account<?php

    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // 匯入資料庫連接
    include 'db_connection.php';
    
    $servername = "140.122.184.129:3310";
    $username = "team20";
    $password = "5EGyOY_grkiT[U0j";
    $dbname = "team20";

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $checkId_sql = 'SELECT MAX(CAST(id AS UNSIGNED)) AS maxNum FROM login';
    $check_result = $pdo->query($checkId_sql);
    $row = $check_result->fetch(PDO::FETCH_ASSOC);
    $id = intval($row['maxNum']) + 1;

    // 接收來自表單的資料
    $account = $_POST['account'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : NULL;
    $E_mail = isset($_POST['E_mail']) ? $_POST['E_mail'] : NULL;

    // 將資料寫入資料庫
    $insertSql = "INSERT INTO login (id, account, fullname, password, phone_number, E_mail) VALUES ('$id', '$account', '$fullname', '$password', ";
    $insertSql .= $phone_number ? "'$phone_number'" : "NULL";
    $insertSql .= ", ";
    $insertSql .= $E_mail ? "'$E_mail'" : "NULL";
    $insertSql .= ")";
    
    if ($conn->query($insertSql) === TRUE) {
        echo "新增會員成功";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }

    // 重定向至會員首頁
    header('Location: memberIndex.php');
    exit();
			
?>

