<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <title>MSMshop- Admin MEMBER UPDATE</title>

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
            <h2 style = 'text-align: center;'>會員資料修改</h2>
            <br>
            <form action="memberUpdate.php" method="post" onsubmit="return validateForm()">
                <table width="350" border="1" align="center">
                    <?php
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    include "db_connection.php";
                    $id = $_GET['id'];

                    if (isset($id)) {
                        
                        $select_sql = "SELECT * FROM login WHERE id = '$id'"; 
                        $result = $conn->query($select_sql);

                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );

                            echo "<tr>
                                <th style='text-align: center;'>會員ID</th>
                                <td bgcolor='#FFFFFF'>
                                    <input type='text' id='fullname' name='id' style='white-space: pre-wrap;' value='" . htmlspecialchars($row["id"]) . "' disabled>
                                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                                </td>
                            </tr>";
                            
                            echo "<tr>
                                <th style='text-align: center;'>帳號</th>
                                <td bgcolor='#FFFFFF'>
                                    <input type='text' id='fullname' name='account' style='white-space: pre-wrap;' value='" . htmlspecialchars($row["account"]) . "' disabled>
                                    <input type='hidden' name='account' value='" . htmlspecialchars($row['account']) . "'>
                                </td>
                            </tr>";

                                
                            echo "<tr>
                                <th style='text-align: center;'>全名</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='fullname' name='fullname' value='" . htmlspecialchars($row['fullname']) . "'></td>
                                </tr>";
                        
                            echo "<tr>
                                <th style='text-align: center;'>密碼</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='fullname' name='password' value='" . htmlspecialchars($row['password']) . "' /></td>
                                </tr>";
                        
                            echo "<tr>
                                <th style='text-align: center;'>電話</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='fullname' name='phone_number' value='" . (!empty($row['phone_number']) ? htmlspecialchars($row['phone_number']) : "") . "' /></td>
                                </tr>";
                                            
                            echo "<tr>
                                <th style='text-align: center;'>E-mail</th>
                                <td bgcolor='#FFFFFF'><input type='email' id='fullname' name='E_mail' value='" . (!empty($row['E_mail']) ? htmlspecialchars($row['E_mail']) : "") . "' /></td>
                                </tr>";
                        }else{
                            echo "查詢失敗!";
                        }

                    }else{
                        echo "資料不完全";
                    }
                ?>
                </table>
                <br>
                <div style="text-align: center;">
                    <th style="center"><input type='submit' value='更新' /></th>
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
        var fullname = document.getElementById("fullname").value;
        var password = document.getElementById("password").value;

        if (fullname == "" || password == "") {
            alert("全名、密碼不能為空！");
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