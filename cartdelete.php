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

        if (isset($_POST['Product_id'])) {
            $memberID = $_SESSION['memberID']; 
            $Product_id = $_POST['Product_id'];
            $delete_sql = "DELETE FROM cart WHERE member_id = '$memberID' and product_id = '$Product_id'";
            if ($conn->query($delete_sql) === TRUE) {
                echo "<script type='text/javascript'>
                alert('刪除成功!');
                window.location.href = 'cartPage.php';
                </script>";
                exit;
            }else{
                echo "刪除失敗!";
            }
        }else{
            echo "資料不完全";
        }
?>

<script>
      document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault(); 
        var userConfirmed = confirm('您確定要登出嗎？'); 
        if (userConfirmed) {
          window.location.href = 'login.html';
        }
      });
</script>