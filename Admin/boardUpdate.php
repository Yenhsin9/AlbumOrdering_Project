<?php
include 'db_connection.php'; // 包含連接資料庫的設定檔案

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qa_id = $_POST['qa_id'];
    $status = $_POST['status'];
    
    // 更新狀態
    $sql = "UPDATE suggestion_box SET conditions = ? WHERE qa_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $status, $qa_id);
    $stmt->execute();
    $stmt->close();

    header("Location: boardIndex.php"); // 跳轉回原來的頁面
    exit();
}
?>
