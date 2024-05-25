<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include 'db_connection.php';

    // 获取会员ID
    $memberID = $_SESSION['memberID'];

    // 查询会员信息
    $FindName_sql = "SELECT * FROM login WHERE id = '$memberID'";
    $FindName_result = $conn->query($FindName_sql);
    $row = $FindName_result->fetch_assoc();

    $Account = $row['account'];
    if (isset($_POST['member_password'])) {
        $update_sql = "UPDATE login SET `password` = '{$_POST['member_password']}' WHERE id = '$memberID'";
        $update_result = $conn->query($update_sql);
        $Member_password = $_POST['member_password'];
    } else {
        $Member_password = $row['password'];
    }

    if (isset($_POST['fullname'])) {
        $update_sql = "UPDATE login SET `fullname` = '{$_POST['fullname']}' WHERE id = '$memberID'";
        $update_result = $conn->query($update_sql);
        $Fullname = $_POST['fullname'];
    } else {
        $Fullname = $row['fullname'];
    }

    if (isset($_POST['phone_number'])) {
        $update_sql = "UPDATE login SET `phone_number` = '{$_POST['phone_number']}' WHERE id = '$memberID'";
        $update_result = $conn->query($update_sql);
        $Phone = $_POST['phone_number'];
    } else {
        $Phone = $row['phone_number'];
    }

    if (isset($_POST['E_mail'])) {
        $update_sql = "UPDATE login SET `E_mail` = '{$_POST['E_mail']}' WHERE id = '$memberID'";
        $update_result = $conn->query($update_sql);
        $Mail = $_POST['E_mail'];
    } else {
        $Mail = $row['E_mail'];
    }

    header('Location: membercenter.php');
    exit();
?>
