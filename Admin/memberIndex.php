<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <title>MSMshop- Admin MEMBER PAGE</title>

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

    <!-- 會員資料 Area Starts -->
    <section class="section" id="explore" >
        <div style="text-align: center; margin-left: 850px;">
            <form action="memberIndex.php" method="get">
                <input type="text" name="search" placeholder="輸入會員ID/帳號/全名/電話" value="<?php echo $_GET['search'] ?? ''; ?>">
                <input type="submit" value="查詢">
            </form>
        </div>
        <div class="container">
            <h2 style="text-align: center;">會員資料</h2>
            <br>
            <table style="width:100%" align="center" border="1">
                <tr align="center">
                    <th>會員ID</th>
                    <th>帳號</th>
                    <th>全名</th>
                    <th>密碼</th>
                    <th>電話</th>
                    <th>E-mail</th>
                    <th colspan="2">動作</th>
                </tr>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    $search = $_GET['search'] ?? '';
                    $search = mysqli_real_escape_string($conn, $search);

                    $sql = "SELECT * FROM login";

                    if (!empty($search)) {
                        $sql .= " WHERE id LIKE '%$search%' OR account LIKE '%$search%' OR fullname LIKE '%$search%' OR phone_number LIKE '%$search%'";
                    }

                    $sql .= " ORDER BY CAST(id AS UNSIGNED) ASC";

                    $result = $conn->query($sql);

                    if ($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td align='center'>" . $row['id'] . "</td>";
                                echo "<td>" . $row["account"] . "</td>";
                                echo "<td>" . $row["fullname"] . "</td>";
                                echo "<td>" . $row["password"] . "</td>";
                                echo "<td>" . $row["phone_number"] . "</td>";
                                echo "<td>" . $row["E_mail"] . "</td>";
                                echo "<td align='center'><a href='memberDoUpdate.php?id=" . $row["id"] . "'>修改</a></td>";
                                echo "<td align='center'><a href='memberDelete.php?id=" . $row["id"] . "'>刪除</a></td>";
                                echo "</tr>";
                            }
                        } 
                    } else {
                        echo "<tr><td colspan='7'>查詢失敗: " . $conn->error . "</td></tr>";
                    }
                }
                ?>
            </table>
            <br>
            <div style="text-align: center;">
                <form action="memberDocreate.php" method="post">
                    <input type="submit" value="新增" />
                </form>
            </div>
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
    </script>
</body>

</html>