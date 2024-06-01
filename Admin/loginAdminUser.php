<?php
// ******** update your personal settings ******** 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'db_connection.php';

if (isset($_POST['account']) && isset($_POST['password'])) {
	$Account = $_POST['account'];
	$Password = $_POST['password'];
	$checkAcc_sql = "SELECT count(*) as count, password FROM administrator WHERE account = '$Account' ";		   
	$check_result = $conn->query($checkAcc_sql);
    $row = $check_result->fetch_assoc();
	$count = $row['count'];
    $CorrectPassword = $row['password'];
    if($count === '0'){
        echo "查無此用戶<br> <a href='loginAdmin.html'>返回登入頁</a>";
    }elseif($count !== '0' and $Password!==$CorrectPassword){
        echo "密碼或帳號錯誤<br> <a href='loginAdmin.html'>返回登入</a>";
    }
    else{
        echo '<form id="redirectForm" action="Global.php" method="post">
        <input type="hidden" name="account" value="' . $Account . '" />
        </form>';
        echo '<script>
              document.getElementById("redirectForm").submit();
          </script>';
    }

}else{
	echo "資料不完全";
}
				
?>

