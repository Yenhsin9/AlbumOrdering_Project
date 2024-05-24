<?php
session_start();
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
        $memberID = $_SESSION['memberID']; 
        
        $FindName_sql = "SELECT * FROM login WHERE id = '$memberID'";
        $FindName_result = $conn->query($FindName_sql);
        $row = $FindName_result->fetch_assoc();
        $Fullname = $row['fullname'];
        echo "<a >Hi, $Fullname</a>";
?>