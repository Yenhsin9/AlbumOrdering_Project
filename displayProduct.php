<?php
    if (isset($_GET['order'])&&isset($_GET['kind'])) {
        $Order = $_GET['order'];
        $Kind = $_GET['kind'];
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

        $FindProduct_sql = "SELECT * FROM product WHERE kind = '$Kind' ORDER BY product_id DESC limit $Order,1";
        $FindProduct_result = $conn->query($FindProduct_sql);
        $row = $FindProduct_result->fetch_assoc();
        $Title = $row['title'];
        $Price = $row['price'];
        $Info  = $row['info'];
        echo "<h4>$Title : $Info</h4>
        <span>NT$$Price</span>";
    }else{
        echo 'nothing';
    }
?>