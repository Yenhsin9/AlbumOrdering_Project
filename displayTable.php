<?php
    if (isset($_GET['kind'])) {
        $Kind = $_GET['kind'];
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

        $FindProduct_sql = "SELECT * FROM product natural join artist WHERE kind = '$Kind';";
        $FindProduct_result = $conn->query($FindProduct_sql);
        if ($FindProduct_result->num_rows > 0) {
            while($row = $FindProduct_result->fetch_array()){
                $Product_id = $row['product_id'];
                echo '<tr align="center">
                <td>'.$row['title'].'</td>
                <td>'.$row['artist_name'].'</td>
                <td>'.$row['info'].'</td>
                <td>'.$row['price'].'</td>
                <td>
                    <form method="post" action="addCart.php">
                        <select nname="mySelect" id="mySelect" onchange="updateHiddenInput(this)">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                        </select>
                        <input type="hidden" name="mySelectValue" id="mySelectValue" value="1">
                        <input type="hidden" name="rowProductId" id="rowProductId" value='.$Product_id.'>
                        <input type="hidden" name="rowProductPrice" id="rowProductPrice" value='.$row['price'].'>
                        <input type="hidden" name="kind" id="kind" value='.$Kind.'>
                        <button type="submit">加入購物車</button>
                    </form>  
                </td>
                    <tr>';

            }
        }
    }else{
        echo 'nothing';
    }
?>


<script>
    function updateHiddenInput(selectElement) {
        var selectedValue = selectElement.value;
        var hiddenInput = selectElement.form.querySelector('#mySelectValue');
        hiddenInput.value = selectedValue;
    }
</script>