<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <title>MSMshop- Admin ORDER UPDATE</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css" />

    <link rel="stylesheet" href="../assets/css/templatemo-hexashop.css" />

    <link rel="stylesheet" href="../assets/css/owl-carousel.css" />

    <link rel="stylesheet" href="../assets/css/lightbox.css" />

    <style>
        select, tr input {
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

    <!-- ***** 訂單資料 Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <h2 style='text-align: center;'>訂單資料修改</h2>
            <br>
            <form action="orderUpdate.php" method="post" onsubmit="return validateForm()">
                <table width="500" border="1" align="center">
                    <?php
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    include "db_connection.php";
                    $order_id = $_GET['order_id'];

                    if (isset($order_id)) {
                        $select_sql = "SELECT * FROM orders WHERE order_id='$order_id'";
                        $result = $conn->query($select_sql);

                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            echo "<tr>
                                <th style='text-align: center;'>訂單狀態</th>
                                <td bgcolor='#FFFFFF'>
                                    <select id='conditions' name='conditions'>
                                        <option value='已下單'>已下單</option>
                                        <option value='準備中'>準備中</option>
                                        <option value='已出貨'>已出貨</option>
                                    </select>
                                </td>
                            </tr>";

                            echo "<tr>
                                <th style='text-align: center;'>訂單ID</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='order_id' name='order_id' value='" . htmlspecialchars($row['order_id']) . "' readonly /></td>
                            </tr>";

                            echo "<tr>
                                <th style='text-align: center;'>會員ID</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='member_id' name='member_id' value='" . htmlspecialchars($row['member_id']) . "' readonly /></td>
                            </tr>";

                            echo "<tr>
                                <th style='text-align: center;'>訂購日期</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='purchase_date' name='purchase_date' value='" . htmlspecialchars($row['purchase_date']) . "' readonly/></td>
                            </tr>";

                            echo "<tr>
                                <th style='text-align: center;'>完成日期</th>
                                <td bgcolor='#FFFFFF'><input type='date' id='completion_date' name='completion_date' value='" . htmlspecialchars($row['completion_date']) . "' /></td>
                            </tr>";

                            echo "<tr>
                                <th style='text-align: center;'>訂購人</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='fullname' name='fullname' value='" . htmlspecialchars($row['fullname']) . "' required/></td>
                            </tr>";

                            echo "<tr>
                                <th style='text-align: center;'>電話</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='phone_number' name='phone_number' value='" . htmlspecialchars($row['phone_number']) . "' required/></td>
                            </tr>";

                            echo "<tr>
                                <th style='text-align: center;'>E-mail</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='E_mail' name='E_mail' value='" . htmlspecialchars($row['E_mail']) . "' required/></td>
                            </tr>";

                            echo "<tr>
                                <th style='text-align: center;'>總金額</th>
                                <td bgcolor='#FFFFFF'><input type='text' id='total_price' name='total_price' value='" . htmlspecialchars($row['total_price']) . "' readonly/></td>
                            </tr>";

                        } else {
                            echo "修改失敗!";
                        }

                    } else {
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
    <!-- ***** 訂單資料 Area Ends ***** -->

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

    <!-- Global Init -->
    <script src="../assets/js/custom.js"></script>

    <script>
    function validateForm() {
        var purchaseDate = document.getElementById('purchase_date').value;
        var completionDate = document.getElementById('completion_date').value;

        if (!completionDate) {
            return true;
        }

        var purchaseDateTime = new Date(purchaseDate);
        var completionDateTime = new Date(completionDate);

        if (completionDateTime <= purchaseDateTime) {
            alert("完成日期必須在訂購日期之後！");
            return false;
        }

        return true;
    }
    </script>
</body>

</html>
