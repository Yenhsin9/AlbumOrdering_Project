<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <title>MSMshop- Admin Suggestion Box PAGE</title>

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

    <!-- ***** 意見箱資料 Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <h2 style='text-align: center;'>意見箱</h2>
            <br>
            <table style="width:100%" align="center" border=1>
                <tr align="center">
                    <th>意見狀態</th>
                    <th>意見ID</th>
                    <th>姓名</th>
                    <th>E-mail</th>
                    <th>提問內容</th>
                </tr>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    $search = $_GET['search'] ?? '';
                    $search = mysqli_real_escape_string($conn, $search);

                    $sql = "SELECT * FROM suggestion_box";

                    if (!empty($search)) {
                        $sql .= " WHERE conditions = '$search'";
                    }

                    $result = $conn->query($sql);

                    if ($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>";
                                echo "<form action='boardUpdate.php' method='POST'>";
                                echo "<input type='hidden' name='qa_id' value='{$row['qa_id']}'>";
                                echo "<select name='status' onchange='this.form.submit()'>";
                                echo "<option value='未處理'" . ($row['conditions'] === '未處理' ? 'selected' : '') . ">未處理</option>";
                                echo "<option value='處理中'" . ($row['conditions'] === '處理中' ? 'selected' : '') . ">處理中</option>";
                                echo "<option value='已完成'" . ($row['conditions'] === '已完成' ? 'selected' : '') . ">已完成</option>";
                                echo "</select>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td style='text-align: center;'>{$row['qa_id']}</td>";
                                echo "<td style='text-align: center;'>{$row['fullname']}</td>";
                                echo "<td style='text-align: center;'>{$row['E_mail']}</td>";
                                echo "<td style='text-align: center;'>{$row['content']}</td>";
                                echo "</tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='5'>查詢失敗: " . $conn->error . "</td></tr>";
                    }
                }
                ?>
            </table>
        </div>
    </section>
    <!-- ***** 意見箱資料 Area Ends ***** -->


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