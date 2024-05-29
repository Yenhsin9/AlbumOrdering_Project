<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ($_POST['account']) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        include 'db_connection.php';

        $FindName_sql = "SELECT * FROM login WHERE account = '$Account'";
        $FindName_result = $conn->query($FindName_sql);
        $row = $FindName_result->fetch_assoc();
        $id= $row['id'];
        $_SESSION['memberID'] = $id; 
        header("Location: mainpage.php");
    }else{
        echo 'nothing';
    }
?>
