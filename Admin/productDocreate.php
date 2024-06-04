<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <title>MSMshop- Admin PRODUCT CREATE</title>

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

        /* 美化文件输入按钮 */
        .file-input-wrapper {
            display: flex;
            align-items: center; 
        }

        .file-input-button {
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-size: 12px; 
        }

        input[type="file"].img-ask {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
            height: 100%;
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

    <!-- ***** 商品資料 Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <h2 style = 'text-align: center;'>商品資料新增</h2>
            <br>
            <form action="productCreate.php" method="post" onsubmit="return validateForm()" enctype='multipart/form-data'>
                <table width="500" border="1" align="center">
                    <?php
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        include "db_connection.php";
                        
                        echo "<tr>
                                <th style='text-align: center;'>圖片</th>
                                <td bgcolor='#FFFFFF'>
                                    <div class='file-input-wrapper'>
                                        <input class='file-input-button' type='file' id='img' name='img' accept='image/*' />
                                    </div>
                                </td>
                            </tr>";

                        echo "<tr>
                            <th style='text-align: center;'>類別</th>
                            <td bgcolor='#FFFFFF'>
                                <select id='kind' name='kind'>
                                    <option value='k-pop'>K-pop</option>
                                    <option value='j-pop'>J-pop</option>
                                    <option value='m-pop'>M-pop</option>
                                    <option value='west'>West</option>
                                </select>
                            </td>
                        </tr>";
                        
                        echo "<tr>
                            <th style='text-align: center;'>產品名稱</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='title' name='title' value='' required/></td>
                            </tr>";

                        // Get all artists
                        $artists_sql = "SELECT artist_id, artist_name FROM artist";
                        $artists_result = $conn->query($artists_sql);
                        echo "<tr>
                                <th style='text-align: center;'>歌手名稱</th>
                                <td bgcolor='#FFFFFF'>
                                    <select id='artist_id' name='artist_id'>";
                        while ($artist = $artists_result->fetch_assoc()) {
                            $selected = ($artist['artist_id'] == $row['artist_id']) ? "selected" : "";
                            echo "<option value='" . $artist['artist_name'] . "' $selected>" . htmlspecialchars($artist['artist_name']) . "</option>";
                        }
                        echo "</select>
                            </td>
                        </tr>";


                        echo "<tr>
                            <th style='text-align: center;'>產品說明</th>
                            <td bgcolor='#FFFFFF'><input type='text' id='info' name='info' value='' /></td>
                        </tr>";

                        echo "<tr>
                            <th style='text-align: center;'>售價</th>
                            <td bgcolor='#FFFFFF'><input type='text' id='price' name='price' value='' required/></td>
                        </tr>";

                        echo "<tr>
                            <th style='text-align: center;'>存貨數量</th>
                            <td bgcolor='#FFFFFF'><input type='text' id='amount' name='amount' value='' required/></td>
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

    function validateForm() {
        var img = document.getElementsByName("img")[0].value;
        var price = document.getElementById("price").value;
        var amount = document.getElementById("amount").value;

        if (price.trim() === "" || amount.trim() === "") {
            alert("售價和存貨數量不能为空！");
            return false;
        }

        var intPrice = parseInt(price);
        var intAmount = parseInt(amount);

        if (isNaN(intPrice) || isNaN(intAmount) || intPrice <= 0 || intAmount <= 0) {
            alert("售價和存貨數量必須是正整數！");
            return false;
        }

        var imageFormatRegex = /\.(jpg|jpeg|png|gif)$/i;
        var isValidImageFormat = imageFormatRegex.test(img);

        // 如果图片文件名不符合格式要求，则显示提示并返回 false
        if (img.trim() !== "" && !isValidImageFormat) {
            alert("圖片檔名必須是 jpg、jpeg、png 或 gif 格式！");
            return false;
        }


        return true;
    }
</script>

</body>

</html>