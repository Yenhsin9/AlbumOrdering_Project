<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include 'db_connection.php';

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