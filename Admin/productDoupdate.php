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
            <h2 style = 'text-align: center;'>商品資料修改</h2>
            <br>
            <form action="productUpdate.php" method="post" onsubmit="return validateForm()">
                <table width="350" border="1" align="center">
                    <?php
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    include "db_connection.php";
                    $product_id = $_GET['product_id'];

                    if (isset($product_id)) {
                        $select_sql = "SELECT * FROM product WHERE product_id='$product_id'"; 
						$result = $conn->query($select_sql);

                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
                            echo "<tr>
								<th>產品ID</th>
								<td bgcolor='#FFFFFF'><input type='text' id='fullname'name='product_id' value='" . $row['product_id'] . "' readonly /></td>
								</tr>";

							echo "<tr>
								<th>圖片</th>
								<td bgcolor='#FFFFFF'><input type='text' id='fullname'name='img' value=" . $row["img"] . " /></td>
								</tr>";
						
							echo "<tr>
								<th>類別</th>
								<td bgcolor='#FFFFFF'><input type='text' id='fullname' name='kind' value=" . $row['kind'] . " readonly /></td>
								</tr>";

							echo "<tr>
								<th>產品名稱</th>
								<td bgcolor='#FFFFFF'><input type='text' id='fullname' name='title' value=" . $row['title'] . " /></td>
								</tr>";
							
                            echo "<tr>
                                <th>歌手名稱</th>
                                <td bgcolor='#FFFFFF'>";
                                $findArtistName = "SELECT artist_name FROM artist WHERE artist_id = '" . $row['artist_id'] . "'";
                                $artistResult = $conn->query($findArtistName);
                                if ($artistResult->num_rows > 0) {
                                    $artist_row = $artistResult->fetch_assoc();
                                    echo "<input type='text' id='fullname' name='artist_name' value='" . $artist_row['artist_name'] . "' readonly/>";
                                } else {
                                    echo "Unknown";
                                }
                                echo "</td>
                                </tr>";

							echo "<tr>
								<th>產品說明</th>
								<td bgcolor='#FFFFFF'><input type='text' id='fullname'  name='info' value='" . (!empty($row['info']) ? htmlspecialchars($row['info']) : "") . "' /></td>
								</tr>";

							echo "<tr>
								<th>售價</th>
								<td bgcolor='#FFFFFF'><input type='int' id='fullname' name='price' value=" . $row['price'] . " /></td>
								</tr>";

							echo "<tr>
								<th>存貨數量</th>
								<td bgcolor='#FFFFFF'><input type='int' id='fullname' name='amount' value='" . (!empty($row['amount']) ? htmlspecialchars($row['amount']) : "") . "' />
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
		var img = document.getElementById("img").value;
		var price = document.getElementById("price").value;
		var amount = document.getElementById("amount").value;

		var isInteger = /^\d+$/.test(price) && /^\d+$/.test(amount);
		var isPositive = parseInt(price) > 0 && parseInt(amount) > 0;
		var imageFormatRegex = /\.(jpg|jpeg|png|gif)$/i;

		if (!isInteger || !isPositive) {
			alert("價格和數量必須是正整數！");
			return false;
		}

		// 使用正則表達式進行匹配
		var isValidImageFormat = imageFormatRegex.test(img);
		// 如果圖片檔名不符合格式要求，則顯示提示並返回 false
		if (!isValidImageFormat) {
			alert("圖片檔名必須是 jpg、jpeg、png 或 gif 格式！");
			return false;
		}
		return true;
	}

    </script>
</body>

</html>