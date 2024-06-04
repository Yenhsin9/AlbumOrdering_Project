<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <title>MSMshop- Admin PRODUCT PAGE</title>

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

    <!-- ***** 商品資料 Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <h2 style='text-align: center;'>商品資料</h2>
            <br>
            <table style="width:100%" align="center" border=1>
                <tr align="center">
                    <th>產品ID</th>
                    <th>產品名稱</th>
                    <th>歌手</th>
                    <th>產品說明</th>
                    <th>售價</th>
                    <th>存貨數量</th>
                    <th colspan="2">動作</th>
                </tr>
                <?php
                    // ******** update your personal settings ******** 
                    $sql = "SELECT * FROM `product`";

                    // Check if 'kind' parameter exists in URL
                    if(isset($_GET['kind']) && !empty($_GET['kind'])) {
                        $kind = mysqli_real_escape_string($conn, $_GET['kind']);
                        $sql .= " WHERE kind = '$kind'";
                    }

                    $result = $conn->query($sql); // Send SQL Query

                    if ($result) {
                        if ($result->num_rows > 0) {	
                            while($row = $result->fetch_assoc()) {
                                $artist_name = "Unknown"; // 預設為未知的藝術家名稱
                                if (!empty($row['artist_id'])) { // 如果 artist_id 不為空
                                    $findArtistName = "SELECT artist_name FROM artist WHERE artist_id = '" . $row['artist_id'] . "'";
                                    $findArtistNameResult = $conn->query($findArtistName);
                                    if ($findArtistNameResult && $findArtistNameResult->num_rows > 0) {
                                        $artist_row = $findArtistNameResult->fetch_assoc();
                                        $artist_name = $artist_row['artist_name']; // 如果查詢到藝術家名稱，則將其設置為查詢到的名稱
                                    }
                                }
                                echo "<tr>";
                                echo "<td>" . $row['product_id'] . "</td>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td>" . $artist_name . "</td>";
                                echo "<td>" . $row['info'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td style='text-align: right;'>" . $row['amount'] . "</td>";
                                echo "<td align='center'><a href='productDoUpdate.php?product_id=" . $row["product_id"] . "'>修改</a></td>";
                                echo "<td align='center'><a href='productDelete.php?product_id=" . $row["product_id"] . "'>刪除</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                    } else {
                        echo "Error executing query: " . $conn->error;
                    }
                ?>
            </table>
            <br>
            <div style="text-align: center;">
                <form action="productDocreate.php" method="post">
                    <input type="submit" value="新增"/>
                </form>
            </div>
        </div>
    </section>
    <!-- ***** 商品資料 Area Ends ***** -->

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