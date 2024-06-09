<?php
    include 'db_connection.php';
    $FindInfo_sql = "SELECT * FROM new_info;";
    $FindInfo_result = $conn->query($FindInfo_sql);
    echo '<h2 class="bouncing">最新消息</h2>';
    echo '<br>';
    echo '<table style="width:100%">';
    if ($FindInfo_result->num_rows > 0) {
        while($row = $FindInfo_result->fetch_array()){
            $Info_date = $row['info_date'];
            $Info = trim($row['info']);
            echo '<tr>
            <td>'.$Info_date.'</td>
            <td>'.$Info.'</td>
            <tr>';
        }
    }
    echo '</table> ';
?>

<style>
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    .bouncing {
        animation: bounce 0.5s infinite;
        font-weight: bold;
        color: red;
    }
  </style>
