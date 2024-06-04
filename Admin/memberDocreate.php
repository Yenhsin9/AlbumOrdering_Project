<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <title>MSMshop- Admin MEMBER CREATE</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css" />

    <link rel="stylesheet" href="../assets/css/templatemo-hexashop.css" />

    <link rel="stylesheet" href="../assets/css/owl-carousel.css" />

    <link rel="stylesheet" href="../assets/css/lightbox.css" />
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

    <!-- ***** Header Start ***** -->
    <?php include 'Header.php'; ?>
    <!-- ***** Header End ***** -->

    <!-- ***** 會員資料 Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <h2 style = 'text-align: center;'>會員資料新增</h2>
            <br>
            <form action="memberCreate.php" method="post" onsubmit="return validateForm()">
                <table width="350" border="1" align="center">
                    <?php
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    include "db_connection.php";
                    
                    echo "<tr>
                            <th style='text-align: center; padding: 10px;'>帳號</th>
                            <td bgcolor='#FFFFFF'><input type='text' id='account' name='account' style='width: 100%;' value=''></td>
                        </tr>";

                    echo "<tr>
                            <th style='text-align: center; padding: 10px;'>全名</th>
                            <td bgcolor='#FFFFFF'><input type='text' id='fullname' name='fullname' style='width: 100%;' value=''></td>
                        </tr>";

                    echo "<tr>
                            <th style='text-align: center; padding: 10px;'>密碼</th>
                            <td bgcolor='#FFFFFF'><input type='password' id='password' name='password' style='width: 100%;' value=''></td>
                        </tr>";

                    echo "<tr>
                            <th style='text-align: center; padding: 10px;'>電話</th>
                            <td bgcolor='#FFFFFF'><input type='text' id='phone_number' name='phone_number' style='width: 100%;' value=''></td>
                        </tr>";

                    echo "<tr>
                            <th style='text-align: center; padding: 10px;'>E-mail</th>
                            <td bgcolor='#FFFFFF'><input type='email' id='E_mail' name='E_mail' style='width: 100%;' value=''></td>
                        </tr>";
                ?>
                </table>
                <br>
                <div style="text-align: center;">
                    <th style="center"><input type='submit' value='新增' /></th>
                </div>
                
            </form>
        </div>
    </section>
    <!-- ***** 會員資料 Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <?php include 'Footer.php'; ?>
    <!-- ***** Footer End ***** -->

    <!-- jQuery -->
    <script src="../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/accordions.js"></script>
    <script src="../assets/js/datepicker.js"></script>
    <script src="../assets/js/scrollreveal.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/imgfix.min.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/lightbox.js"></script>
    <script src="../assets/js/isotope.js"></script>
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
    <script src="../assets/js/custom.js"></script>

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

    function validateForm() {
        var account = document.getElementById("account").value;
        var fullname = document.getElementById("fullname").value;
        var password = document.getElementById("password").value;

        if (account == "" || fullname == "" || password == "") {
            alert("帳號、全名、密碼不能為空！");
            return false;
        }

        var phoneNumber = document.getElementById("phone_number").value;
        var email = document.getElementById("E_mail").value;
        var taiwanPhonePattern = /^09\d{8}$/;
        var gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

        if (phoneNumber && !taiwanPhonePattern.test(phoneNumber)) {
            alert("請輸入有效的台灣電話號碼（09開頭，總共10位數字）");
            return false;
        }

        if (email && !gmailPattern.test(email)) {
            alert("請輸入有效的 Gmail 電子郵件地址");
            return false;
        }

        // 如果以上驗證通過，返回 true，否則返回 false
        return true;
    }
    </script>
</body>

</html>