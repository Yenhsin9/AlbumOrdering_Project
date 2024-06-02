<?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        include 'db_connection.php';
        $Total=0;
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
                $Total = $Total+$TotalPrice;
                echo '<tr align="center">
                <td>'.$Title.'</td>
                <td>'.$ArtistName.'</td>
                <td>'.$Info.'</td>
                <td>'.$Nums.'</td>
                <td>'.$TotalPrice.'</td>
                
                <td>
                    <form id="updateForm" method="post" action="cartupdate.php">
                        <input type="number" id="quantityInput" name="quantity" value="1" min="1" max="20">
                        <input type="hidden" name="Product_id" value="' . $Product_id . '">
                        <input type="submit" name="delete" class="link" value="修改"/>
                    </form>
                </td>
                <td>
                    <form method="post" action="cartdelete.php">
                        <input type="hidden" name="Product_id" value="' . $Product_id . '">
                        <input type="submit" name="delete" class="link" value="Delete"/>
                    </form>
                </td>
                <tr>';
            }
            echo '</table>';
            echo '</div>';
            echo '<br><div style="width:100%; text-align:center;"> <span>總價格為：' . $Total . '</span> <a href="payment.php?total=' . $Total . '"><button style="margin-left: 20px;">前往付款</button></a> </div>';
        }else{
            echo '<tr align="center" >
                <td colspan="7">購物車目前是空的喔！</td>
                <tr>';
            echo '</table>';
            echo '</div>';
        }
?>

<script>
    function updateCart() {
        var form = document.getElementById("updateForm");
        form.submit();
    }
</script>
