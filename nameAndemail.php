<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
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
    $memberID = $_SESSION['memberID']; 
    
    $FindName_sql = "SELECT * FROM login WHERE id = '$memberID'";
    $FindName_result = $conn->query($FindName_sql);
    $row = $FindName_result->fetch_assoc();
    $Fullname = $row['fullname'];
    $Email = $row['E_mail'];
    $Tel = $row['phone_number'];
    echo '<div class="form-group">
            <label for="name">姓名</label>
            <input type="text" id="name" name="name" value="' . $Fullname . '" required>
          </div>
          <div class="form-group">
            <label for="tel">聯絡電話</label>
            <input type="tel" id="phone" name="phone" value="' . $Tel . '" pattern="[0-9]{10}" required>
          </div>
          <div class="form-group">
            <label for="email">電子郵件</label>
            <input type="email" id="email" name="email" value="' . $Email . '" required>
          </div>';
?>