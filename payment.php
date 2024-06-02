<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>MSMshop - Payment Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <!-- Custom CSS for the payment page -->
    <style>
        .payment-container {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .payment-container .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            height: 80vh;
            overflow-y: auto;
        }

        .payment-container .container h2 {
            margin-top: 0;
            text-align: center;
            width: 100%;
        }

        .form-group {
            margin-bottom: 15px;
            flex: 1;
            min-width: 30%; /* Adjusted for three columns */
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .full-width {
            width: 100%;
        }

        .hidden {
            display: none;
        }

        .payment-container .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .payment-container .form-group input,
        .payment-container .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .payment-container .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .payment-container .btn:hover {
            background-color: #0056b3;
        }

    </style>
    <!--
TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
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


    <!-- ***** Header Area Start ***** -->
    <?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }include 'Header.php'; ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** 付款 Start ***** -->
    <section class="section" id="chinese">
    <div class="payment-container">
        <div class="container">
            <h2>訂單付款</h2>
            <form action="doPayment.php" method="POST">
            <?php include 'nameAndemail.php'; ?>
                <div class="form-group">
                    <label for="totalPrice">總價格</label>
                    <?php
                    if (isset($_GET['total'])) {
                        $Total = $_GET['total'];
                    } else {
                        $Total = 0;
                    }
                    echo '<input type="text" id="totalPrice" name="totalPrice" value=' . $Total . ' readonly>'
                    ?>
                    
                </div>
                <div class="form-group">
                    <label for="pickupMethod">取貨方式</label>
                    <select id="pickupMethod" name="pickupMethod" onchange="toggleAddressFields()">
                        <option value="store">門市取貨</option>
                        <option value="homeDelivery">宅配</option>
                    </select>
                </div>
                <div id="addressFields" class="hidden">
                    <div class="form-group">
                        <label for="address">地址</label>
                        <input type="text" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="postalCode">郵遞區號</label>
                        <input type="text" id="postalCode" name="postalCode">
                    </div>
                </div>
                <div class="form-group">
                    <label for="paymentMethod">付款方式</label>
                    <select id="paymentMethod" name="paymentMethod" onchange="toggleCreditCardFields()">
                        <option value="cashOnDelivery">貨到付款</option>
                        <option value="creditCard">刷卡</option>
                    </select>
                </div>
                <div id="creditCardFields" class="hidden">
                    <div class="form-group">
                        <label for="cardNumber">信用卡號碼</label>
                        <input type="text" id="cardNumber" name="cardNumber">
                    </div>
                    <div class="form-group">
                        <label for="expiry">到期日期</label>
                        <input type="text" id="expiry" name="expiry" placeholder="MM/YY">
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv">
                    </div>
                </div>
                <button type="submit" class="btn">提交訂單</button>
            </form>
        </div>
    </div>
    </section>
    <!-- ***** 付款 End ***** -->


    <!-- ***** Footer Start ***** -->
    <?php include 'Footer.php'; ?>

    <script>
    const select = document.getElementById("mySelect");
    const hiddenInput = document.getElementById("mySelectValue");
    select.addEventListener("change", (event) => {
        hiddenInput.value = event.target.value;
    });
    </script>
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/quantity.js"></script>
    <script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault();
        var userConfirmed = confirm('您確定要登出嗎？');
        if (userConfirmed) {
            window.location.href = 'login.html';
        }
    });
    </script>
        <script>
        function toggleCreditCardFields() {
            const paymentMethod = document.getElementById('paymentMethod').value;
            const creditCardFields = document.getElementById('creditCardFields');
            if (paymentMethod === 'creditCard') {
                creditCardFields.classList.remove('hidden');
            } else {
                creditCardFields.classList.add('hidden');
            }
        }

        function toggleAddressFields() {
            const pickupMethod = document.getElementById('pickupMethod').value;
            const addressFields = document.getElementById('addressFields');
            if (pickupMethod === 'homeDelivery') {
                addressFields.classList.remove('hidden');
            } else {
                addressFields.classList.add('hidden');
            }
        }
    </script>
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>
    $(function() {
        var selectedClass = "";
        $("p").click(function() {
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("." + selectedClass).fadeOut();
            setTimeout(function() {
                $("." + selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });
    </script>

</body>
</html>