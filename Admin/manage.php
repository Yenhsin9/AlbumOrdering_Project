<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <title>MSMshop- Admin PAGE</title>

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

    <!-- *****  最新消息 Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <h2>最新消息</h2>
            <br>
            <div style="text-align: center; margin-left: 840px;">
                <form action="infoIndex.php" method="get">
                    <input type="text" name="search" placeholder="輸入ID/日期" value="<?php echo $_GET['search'] ?? ''; ?>">
                    <input type="submit" value="查詢">
                </form>
            </div>
            <br>
            <table style="width:100%" align="center" border=1>
                <tr align="center">
                    <th>消息ID</th><th>日期</th><th>消息</th><th colspan="2">動作</th>
                </tr>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        $search = $_GET['search'] ?? '';
                        $field = $_GET['field'] ?? '';

                        $sql = "SELECT * FROM new_info";

                        if (!empty($search) && !empty($field)) {
                            $sql .= " WHERE $field LIKE '%$search%'";
                        }

                        $result = $conn->query($sql);

                        if ($result) {
                            if ($result->num_rows > 0) {    
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td style='text-align: center;'>" . $row["info_id"] . "</td>";
                                    echo "<td style='text-align: center;'>" . $row["info_date"] . "</td>";
                                    echo "<td>" . $row["info"] . "</td>";
                                    echo "<td align='center'><a href='infoDoupdate.php?info_id=" . $row["info_id"] . "'>修改</a></td>";
                                    echo "<td align='center'><a href='infoDelete.php?info_id=" . $row["info_id"] . "'>刪除</a></td>";
                                    echo "</tr>";
                                }
                            } 
                        } else {
                            echo "<tr><td colspan='5'>查詢失败: " . $conn->error . "</td></tr>";
                        }
                    }
                ?>
            </table>
            <br>
            <div style="text-align: center;">
                <form action="infoDocreate.php" method="post">
                    <input type="submit" value="新增"/>
                </form>
            </div>
        </div>
    </section>
    <!-- ***** 最新消息 Ends ***** -->

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