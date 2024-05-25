<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - Product Detail Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
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
    <header class="header-area header-sticky">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav class="main-nav">
                <!-- ***** Logo Start ***** -->
                <!-- <a href="mainpage.php" class="logo"> -->
                  <img src="assets/images/logo.jpg" width="150" />
                </a>
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                  <li class="scroll-to-section">
                    <a href="mainPage.php" class="active">Home</a>
                  </li>
                  <li class="submenu">
                    <a href="javascript:;">專輯類別</a>
                    <ul>
                        <li><a href="chineseProduct.php">華語</a></li>
                        <li><a href="koreanProduct.php">韓語</a></li>
                        <li><a href="japaneseProduct.php">日語</a></li>
                        <li><a href="englishProduct.php">西洋</a></li>
                    </ul>
                  </li>
                  <li class="scroll-to-section">
                    <a href="cartPage.php">購物車</a>
                  </li>
                  <li class="scroll-to-section"><a href="membercenter.php">會員中心</a></li>
                  <li class="scroll-to-section">
                    <a href="#footer">連絡我們</a>
                  </li>
                  <li class="scroll-to-section">
                  <?php include 'printFullname.php'; ?>
                  </li>
                  <li class="scroll-to-section">
                    <a href="login.html" id="logout-link">登出</a>
                  </li>
                </ul>
                <a class="menu-trigger">
                  <span>Menu</span>
                </a>
                <!-- ***** Menu End ***** -->
              </nav>
            </div>
          </div>
        </div>
      </header>
      <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>購物車</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
                <table style="width:100%" align="center" border=1>
                    <tr bgcolor='#cd853f' align="center">
                        <th>產品名稱</th>
                        <th>歌手</th>
                        <th>產品說明</th>
                        <th>數量</th>
                        <th>總價</th>
                        <th colspan="2">功能</th>
                    <tr>
                    <?php
                    include 'cartTable.php';
                    ?>
                </table>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="logo">
              <img
                src="assets/images/white-logo.png"
                alt="hexashop ecommerce templatemo"
              />
            </div>
          </div>
          <div class="col-lg-3">
            <h4>常見問題(FAQ)</h4>
            <ul>
              <li><a href="questionpage.html">Click here</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
            <h4>連絡我們</h4>
            <ul>
              <li>
                <a>商店地址 : 台北市仁愛路9段100號</a>
              </li>
              <li><a>Email: MSMMusicshop@company.com</a></li>
              <li><a>電話: (02)12341234</a></li>
            </ul>
          </div>
          <div class="col-lg-12">
            <div class="under-footer">
              <p>
                Copyright © 2024 MSMMusicShop Co., Ltd. All Rights Reserved.

                <br />Design:
                <a
                  href="https://templatemo.com"
                  target="_parent"
                  title="free css templates"
                  >TemplateMo</a
                >
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
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
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>

</html>
