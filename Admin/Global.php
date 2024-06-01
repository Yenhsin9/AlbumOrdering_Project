<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ($_POST['account']) {
        $Account = $_POST['account'];
        // ******** update your personal settings ******** 
        $servername = "140.122.184.129:3310";
        $username = "team20";
        $password = "5EGyOY_grkiT[U0j";
        $dbname = "team20";

        // Connecting to and selecting a MySQL database
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", $conn->error);
            exit();
        }

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $FindName_sql = "SELECT * FROM administrator WHERE account = '$Account'";
        $FindName_result = $conn->query($FindName_sql);
        $row = $FindName_result->fetch_assoc();
        $id= $row['admin_id'];
        $_SESSION['adminID'] = $id; 
        header("Location: manage.php");
    }else{
        echo 'nothing';
    }
?>
