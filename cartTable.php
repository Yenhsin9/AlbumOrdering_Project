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

        $FindCart_sql = "SELECT * FROM cart WHERE member_id = '$memberID'";
        $FindCart_result = $conn->query($FindCart_sql);
        if ($FindCart_result->num_rows > 0) {
            while($row = $FindCart_result->fetch_array()){
                $Product_id = $row['product_id'];
                $Price = $row['price'];
                $Nums = $row['amount']; 
                $FindProduct_sql = "SELECT * FROM product natural join artist where product_id = '$Product_id'";
                $FindProduct_result = $conn->query($FindProduct_sql);
                $Nrow = $FindProduct_result->fetch_assoc();
                $Title= $Nrow['title'];
                $Info= $Nrow['info'];
                $ArtistName = $Nrow['artist_name'];
                $TotalPrice = $Price * $Nums;
                echo '<tr align="center">
                <td>'.$Title.'</td>
                <td>'.$ArtistName.'</td>
                <td>'.$Info.'</td>
                <td>'.$Nums.'</td>
                <td>'.$TotalPrice.'</td>
                <tr>';

            }
        }
?>