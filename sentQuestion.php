<?php
    // 開啟錯誤訊息
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include "db_connection.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['name']) && isset($_POST['email']) &&isset($_POST['message'])) {
            $Fullname = $_POST['name'];
            $Email = $_POST['email'];
            $Content = $_POST['message'];
            $Qa_id = 1;

            $checkId_sql = 'SELECT MAX(qa_id) AS maxNum FROM suggestion_box';
            $checkId_result = $conn->query($checkId_sql);
            if ($checkId_result) {
            $row = $checkId_result->fetch_assoc();
            if ($row && $row['maxNum'] !== NULL) {
                $Qa_id = $row['maxNum'] + 1;
            }
        }
            $sentQuestion_sql = "insert into suggestion_box (qa_id,fullname,E_mail,content) values ('$Qa_id','$Fullname','$Email','$Content')";

            if ($conn->query($sentQuestion_sql) === TRUE) {
                echo "<script type='text/javascript'>
                alert('已傳送您的問題!');
                window.location.href = 'questionpage.php';
                </script>";
            exit;
            } else {
                echo "傳送問題失敗" . $conn->error;
            }
        }
    } 
    
    $conn->close();
?>