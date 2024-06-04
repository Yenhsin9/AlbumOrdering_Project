<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <title>MSMshop- Admin INFO CREATE</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css" />
    <link rel="stylesheet" href="../assets/css/templatemo-hexashop.css" />
    <link rel="stylesheet" href="../assets/css/owl-carousel.css" />
    <link rel="stylesheet" href="../assets/css/lightbox.css" />
    
    <style>
    .custom-submit input[type="date"],
    .custom-submit input[type="text"] {
        border: 1px solid #ccc;
        border-radius: 5px;
        display: block;
        color: #333;
        text-decoration: none;
        text-align: left;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 10px;
        padding-left: 12px;
        height: 30px;
        width: 100%;
        max-width: 300px;
        box-sizing: border-box;
    }

    .custom-submit {
        width: 100%;
    }

    .custom-submit input[type="date"],
    .custom-submit input[type="text"] {
        width: 100%;
    }
    </style>
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

    <!-- ***** 最新消息 Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <h2 style='text-align: center;'>最新消息新增</h2>
            <br>
            <form action="infoCreate.php" method="post">
                <table width="400" border="1" align="center">
                <tr>
                    <th style='text-align: center;'>日期</th>
                    <td bgcolor='#FFFFFF'>
                        <div class="custom-submit">
                            <input style='text-align: center;' type='date' id='info_date' name='info_date' required />
                        </div>
                    </td>
                </tr>
                <tr>
                    <th style='text-align: center;'>消息</th>
                    <td bgcolor='#FFFFFF'><textarea id='info' name='info' class='custom-submit' required></textarea></td>
                </tr>
                </table>
                <br>
                <div style="text-align: center;">
                    <input type='submit' value='新增' />
                </div>
            </form>
        </div>
    </section>
    <!-- ***** 最新消息 Area Ends ***** -->

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
    </script>
</body>

</html>
