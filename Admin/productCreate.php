<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // 匯入資料庫連接
    include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $img = NULL;
        if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['img']['tmp_name'];
            $target_dir = '../crawler/downloaded_images/';
            $target_file = $target_dir . basename($_FILES['img']['name']);
            $img = basename($_FILES['img']['name']);
            if (move_uploaded_file($tmp_name, $target_file)) {
                echo "檔案已成功上傳.";
            } else {
                echo "檔案上傳失敗.<br>
                <a href='productDoCreate.php'>返回</a>";
            }
        } 

        // 接收來自表單的資料
        $kind = mysqli_real_escape_string($conn, $_POST['kind']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $artist_id = mysqli_real_escape_string($conn, $_POST['artist_id']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $info = isset($_POST['info']) ? mysqli_real_escape_string($conn, $_POST['info']) : NULL;

        $insertSql = "INSERT INTO product (kind, title, artist_id, price, amount, info, img) VALUES ('$kind', '$title', '$artist_id', '$price', '$amount'";
        $insertSql .= $info ? ", '$info'" : ", NULL";
        $insertSql .= $img ? ", '$img')" : ", NULL)";

        if ($conn->query($insertSql) === TRUE) {
            echo "新增商品成功";
        } else {
            echo "Error: " . $insertSql . "<br>" . $conn->error;
        }

        // 重定向至商品首頁
        header('Location: productIndex.php');
        exit();
    }
?>
