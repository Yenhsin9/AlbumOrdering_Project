<?php

// ******** update your personal settings ******** 
$servername = "192.168.0.102";
$username = "test";
$password = "1234";
$dbname = "msm";

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

if (isset($_POST['account']) && isset($_POST['password'])) {
	$checkId_sql = 'select max(id) as maxNum from login'
	$check_result = $conn->query($checkId_sql);
	$row = $check_result->fetch_assoc();
	$maxNum = $row['maxNum']+1;
	$Fullname = $_POST['fullname'];
	$Account = $_POST['account'];
	$Password = $_POST['password'];
	$Comfirm = $_POST['comfirm_password'];

	$create_sql = "insert into login (id,account,password,name) values ('$maxNum','$Account','$Password','$Fullname')";	
	
	if ($conn->query($create_sql) === TRUE) {
		echo "新增成功!!<br> <a href='login.html'>返回主頁</a>";
		// 重定向用戶到下一頁
		//header('Location: index.php');
		exit;
	} else {
		echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
				
?>

