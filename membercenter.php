<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include 'db_connection.php';

    $memberID = $_SESSION['memberID'];

    $FindName_sql = "SELECT * FROM login WHERE id = '$memberID'";
    $FindName_result = $conn->query($FindName_sql);
    $row = $FindName_result->fetch_assoc();

    $Account = $row['account'];
    $Member_password = $row['password'];
    $Fullname = $row['fullname'];
    $Phone = $row['phone_number'];
    $Mail = $row['E_mail'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <title>MSM Music Shop</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css" />

    <link rel="stylesheet" href="assets/css/owl-carousel.css" />

    <link rel="stylesheet" href="assets/css/lightbox.css" />

    <!-- Custom CSS Styles -->
    <style>
        .member-info {
            text-align: center;
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            line-height: 1; /* 调整行距 */
        }

        .member-info a {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            color: #333;
            text-decoration: none;
            text-align: left;
            padding-left: 150px; /* 往右移动 20px */
        }

        .member-info a:hover {
            text-decoration: underline;
        }

        .member-info form {
            margin-top: 20px;
        }

        .member-info input[type="submit"] {
            background-color: #000;
            color: white; /* 文字颜色为白色 */
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .member-info input[type="submit"]:hover {
            background-color: #000; 
        }

    </style>
    
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
    
    <!-- ***** 會員資訊 Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="member-info">
                <br>
                <h2>會員資訊</h2>
                <br><br>
                <div>
                    <a>會員帳戶：<?php echo $Account; ?></a><br>
                    <a>會員密碼：<?php echo $Member_password; ?></a><br>
                    <a>會員姓名：<?php echo $Fullname; ?></a><br>
                    <a>電話號碼：<?php echo $Phone; ?></a><br>
                    <a>電子郵件：<?php echo $Mail; ?></a><br>
                </div>
                <form action="memberDoupdate.php" method="post">
                    <input type="submit" value="修改" class="submit" />
                </form>
                <br>
            </div>
        </div>
    </section>


    <!-- ***** Footer Start ***** -->
    <?php include 'Footer.php'; ?>

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

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>
    $(function() {
        var selectedClass = "";
        $("p").click(function() {
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div")
                .not("." + selectedClass)
                .fadeOut();
            setTimeout(function() {
                $("." + selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);
        });
    });
    </script>
</body>

</html>