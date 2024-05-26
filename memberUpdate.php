<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include 'db_connection.php';

    $memberID = $_SESSION['memberID'];

    $FindName_sql = "SELECT * FROM login WHERE id = '$memberID'";
    $FindName_result = $conn->query($FindName_sql);
    $row = $FindName_result->fetch_assoc();

    $Account = $row['account'];

    function updateField($conn, $memberID, $fieldName, $postValue, $rowValue) {
        if (isset($postValue) && $postValue != '') {
            $update_sql = "UPDATE login SET `$fieldName` = '$postValue' WHERE id = '$memberID'";
            $conn->query($update_sql);
            return $postValue;
        } else {
            return isset($rowValue) ? $rowValue : '';
        }
    }

    $Member_password = updateField($conn, $memberID, 'password', $_POST['member_password'] ?? null, $row['password'] ?? '');
    $Fullname = updateField($conn, $memberID, 'fullname', $_POST['fullname'] ?? null, $row['fullname'] ?? '');
    $Phone = updateField($conn, $memberID, 'phone_number', $_POST['phone_number'] ?? null, $row['phone_number'] ?? '');
    $Mail = updateField($conn, $memberID, 'E_mail', $_POST['E_mail'] ?? null, $row['E_mail'] ?? '');

    header('Location: membercenter.php');
    exit();
?>
