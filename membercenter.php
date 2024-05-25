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
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <!-- <a href="mainpage.php" class="logo"> -->
                        <img src="assets/images/logo.jpg" width="150" />
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section">
                                <a href="mainpage.php" class="active">Home</a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">專輯類別</a>
                                <ul>
                                    <li><a href="chineseProduct.php">華語</a></li>
                                    <li><a href="koreanProduct.php">韓語</a></li>
                                    <li><a href="japaneseProduct.php">日語</a></li>
                                    <li><a href="englishProduct.php">西洋</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section">
                                <a href="cartPage.php">購物車</a>
                            </li>
                            <li class="scroll-to-section"><a href="membercenter.php">會員中心</a></li>
                            <li class="scroll-to-section">
                                <a href="#footer">連絡我們</a>
                            </li>
                            <li class="scroll-to-section">
                                <?php include 'printFullname.php'; ?>
                            </li>
                        </ul>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <!-- *****  會員資訊 Area Starts ***** -->
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
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <img src="assets/images/white-logo.png" alt="hexashop ecommerce templatemo" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>常見問題(FAQ)</h4>
                    <ul>
                        <li><a href="questionpage.html">Click here</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>連絡我們</h4>
                    <ul>
                        <li>
                            <a>商店地址 : 台北市仁愛路9段100號</a>
                        </li>
                        <li><a>Email: MSMMusicshop@company.com</a></li>
                        <li><a>電話: (02)12341234</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>
                            Copyright © 2024 MSMMusicShop Co., Ltd. All Rights Reserved.

                            <br />Design:
                            <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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