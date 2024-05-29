<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
      rel="stylesheet"
    />

    <title>MSM Music Shop</title>

    <!-- Additional CSS Files -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/bootstrap.min.css"
    />

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css" />

    <link rel="stylesheet" href="assets/css/owl-carousel.css" />

    <link rel="stylesheet" href="assets/css/lightbox.css" />
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
    <?php include 'Header.php'; ?>
    <!-- ***** Header Area End ***** -->

    <!-- *****  最新消息 Area Starts ***** -->
    <section class="section" id="explore">
      <div class="container">  
              <h2>最新消息</h2>
              <br>
              <table style="width:100%" align="center" border = 1>
                    <tr  align="center">
                        <th>產品名稱</th>
                        <th>歌手</th>
                        <th>產品說明</th>
                        <th>售價</th>
                    <tr>
                    <tr align="center">
                        <td>75分</td>
                        <td>75分</td>
                    <tr>
                </table> 
      </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="left-content">
              <div class="thumb">
                <div class="inner-content">
                  <h4>Welcome to MSM Music Shop</h4>
                </div>
                <img src="assets/images/left-banner-image.jpg" alt="" />
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-content">
              <div class="row">
                <div class="col-lg-6">
                  <div class="right-first-image">
                    <div class="thumb">
                      <div class="inner-content">
                        <h4>華語</h4>
                      </div>
                      <div class="hover-content">
                        <div class="inner">
                          <h4>華語</h4>
                          <div class="main-border-button">
                            <a href="#chinese">Discover More</a>
                          </div>
                        </div>
                      </div>
                      <img src="assets/images/baner-right-image-01.jpg" />
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="right-first-image">
                    <div class="thumb">
                      <div class="inner-content">
                        <h4>韓語</h4>
                      </div>
                      <div class="hover-content">
                        <div class="inner">
                          <h4>韓語</h4>
                          <div class="main-border-button">
                            <a href="#korean">Discover More</a>
                          </div>
                        </div>
                      </div>
                      <img src="assets/images/baner-right-image-02.jpg" />
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="right-first-image">
                    <div class="thumb">
                      <div class="inner-content">
                        <h4>日語</h4>
                      </div>
                      <div class="hover-content">
                        <div class="inner">
                          <h4>日語</h4>
                          <div class="main-border-button">
                            <a href="#japanese">Discover More</a>
                          </div>
                        </div>
                      </div>
                      <img src="assets/images/baner-right-image-03.jpg" />
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="right-first-image">
                    <div class="thumb">
                      <div class="inner-content">
                        <h4>西洋</h4>
                      </div>
                      <div class="hover-content">
                        <div class="inner">
                          <h4>西洋</h4>
                          <div class="main-border-button">
                            <a href="#english">Discover More</a>
                          </div>
                        </div>
                      </div>
                      <img src="assets/images/baner-right-image-04.jpg" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** 華語專輯 Area Starts ***** -->
    <section class="section" id="chinese">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="section-heading">
              <h2>華語專輯</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="men-item-carousel">
              <div class="owl-men-item owl-carousel">
                  <?php
                    $Link = 'chineseProduct.php';
                    $Kind = 'm-pop';
                    include 'displayProduct.php';
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ***** 華語專輯 Area Ends ***** -->

    <!-- *****韓語專輯 Area Starts ***** -->
    <section class="section" id="korean">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="section-heading">
              <h2>韓語專輯</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="women-item-carousel">
              <div class="owl-women-item owl-carousel">
                  <?php
                    $Link = 'koreanProduct.php';
                    $Kind = 'k-pop';
                    include 'displayProduct.php';
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ***** 韓語專輯 Area Ends ***** -->

    <!-- ***** 日語專輯 Area Starts ***** -->
    <section class="section" id="japanese">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="section-heading">
              <h2>日語專輯</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="kid-item-carousel">
              <div class="owl-kid-item owl-carousel">
                <?php
                  $Link = 'japaneseProduct.php';
                  $Kind = 'j-pop';
                  include 'displayProduct.php';
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ***** 日語專輯 Area Ends ***** -->

    <!-- ***** 西洋專輯 Area Starts ***** -->
    <section class="section" id="english">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="section-heading">
              <h2>西洋專輯</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="kid-item-carousel">
              <div class="owl-kid-item owl-carousel">
                  <?php
                    $Link = 'englishProduct.php';
                    $Kind = 'west';
                    include 'displayProduct.php';
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ***** 西洋專輯 Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <?php include 'Footer.php'; ?>

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
      $(function () {
        var selectedClass = "";
        $("p").click(function () {
          selectedClass = $(this).attr("data-rel");
          $("#portfolio").fadeTo(50, 0.1);
          $("#portfolio div")
            .not("." + selectedClass)
            .fadeOut();
          setTimeout(function () {
            $("." + selectedClass).fadeIn();
            $("#portfolio").fadeTo(50, 1);
          }, 500);
        });
      });
    </script>
  </body>
</html>