<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <title>MSMshop- Admin ARTIST UPDATE</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css" />

    <link rel="stylesheet" href="../assets/css/templatemo-hexashop.css" />

    <link rel="stylesheet" href="../assets/css/owl-carousel.css" />

    <link rel="stylesheet" href="../assets/css/lightbox.css" />

    <style> 
        select ,tr input {
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

    <!-- ***** 歌手資料 Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <h2 style = 'text-align: center;'>歌手資料修改</h2>
            <br>
            <form action="artistUpdate.php" method="post">
                <table width="500" border="1" align="center">
                    <?php
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    include "db_connection.php";
                    $artist_id = $_GET['artist_id'];

                    if (isset($artist_id)) {
                        $select_sql = "SELECT * FROM artist WHERE artist_id='$artist_id'"; 
						$result = $conn->query($select_sql);

                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
                            echo "<tr>
                                <th style='text-align: center;'>歌手ID</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='artist_id' name='artist_id' value='" . htmlspecialchars($row['artist_id']) . "' readonly /></td>
                            </tr>";

                            echo "<tr>
                                <th style='text-align: center;'>歌手名稱</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='artist_name' name='artist_name' value='" . htmlspecialchars($row["artist_name"]) . "' required /></td>
                            </tr>";

                            echo "<tr>
                                <th style='text-align: center;'>公司</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='company' name='company' value='" . htmlspecialchars($row['company']) . "' required /></td>
                            </tr>";
                        }else{
                            echo "修改失敗!";
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
    <!-- ***** 歌手資料 Area Ends ***** -->

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