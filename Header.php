<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <!-- <a href="mainpage.php" class="logo"> -->
                    <a href="mainpage.php">
                        <img src="assets/images/logo.jpg" width="150" alt="Logo" />
                    </a>
                    <!-- ***** Logo End ***** -->
                    
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section">
                            <a href="mainpage.php" class="active">Home</a>
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

<script>
      document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault(); 
        var userConfirmed = confirm('您確定要登出嗎？'); 
        if (userConfirmed) {
          window.location.href = 'login.html';
        }
      });
    </script>