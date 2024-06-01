<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include "db_connection.php";
    $adminID = $_SESSION['adminID']; 
    
    $FindAccount_sql = "SELECT * FROM administrator WHERE admin_id = '$adminID'";
    $FindAccount_result = $conn->query($FindAccount_sql);
    $row = $FindAccount_result->fetch_assoc();
    $Account = $row['account'];
    echo "<a>$Account 編輯中</a>";
?>