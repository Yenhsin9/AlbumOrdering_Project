<?php
    if (isset($_GET['order'])&&isset($_GET['kind'])) {
        $Order = $_GET['order'];
        $Kind = $_GET['kind'];
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        include 'db_connection.php';

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