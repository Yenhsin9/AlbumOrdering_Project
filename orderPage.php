<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Order page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <?php include 'Header.php'; ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Product Area Start ***** -->
    <section class="section" id="chinese">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
              <h2>訂單狀態</h2>
          </div>
        </div>
      </div>
      <div class="container">
        <table style="width:100%" align="center" border=1>
            <tr bgcolor='#cd853f' align="center">
                <th>訂單編號</th>
                <th>商品名稱</th>
                <th>商品資訊</th>
                <th>數量</th>
                <th>購買日期</th>
                <th>訂單完成日期</th>
                <th>訂單狀態</th>
                <th>金額</th>
            <tr>
            <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                include 'db_connection.php';
                $memberID = $_SESSION['memberID'];
                $sql = "SELECT * from checkout_info NATURAL JOIN orders where member_id = $memberID";	
                $result = $conn->query($sql);	
                if ($result->num_rows > 0) {	
                    while($row = $result->fetch_array()){
                        $Total = $row["price"]*$row["amount"];
                        echo "<tr align='center'>
                        <th>".$row["order_id"]."</th>
                        <th>".$row["title"]."</th>
                        <th>".$row["info"]."</th>
                        <th>".$row["amount"]."</th>
                        <th>".$row["purchase_date"]."</th>
                        <th>".$row["completion_date"]."</th>
                        <th>".$row["conditions"]."</th>
                        <th >".$Total."</th>
                        </tr>";
                    }
                } else {
                    echo '<tr align="center" >
                    <td colspan="8">目前沒有訂單</td>
                    <tr>';
                    echo '</table>';
                    echo '</div>';
                }
            ?>
        </table>
       </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <?php include 'Footer.php'; ?>

    <script>
    const select = document.getElementById("mySelect");
    const hiddenInput = document.getElementById("mySelectValue");
    select.addEventListener("change", (event) => {
        hiddenInput.value = event.target.value;
    });
    </script>
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/quantity.js"></script>
    <script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault();
        var userConfirmed = confirm('您確定要登出嗎？');
        if (userConfirmed) {
            window.location.href = 'login.html';
        }
    });
    </script>
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>
    $(function() {
        var selectedClass = "";
        $("p").click(function() {
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("." + selectedClass).fadeOut();
            setTimeout(function() {
                $("." + selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });
    </script>

</body>

</html>