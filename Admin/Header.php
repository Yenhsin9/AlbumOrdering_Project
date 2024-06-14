<?php
    // 啟動 session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">


                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section">
                            <a href="manage.php" class="active">Home</a>
                        </li>
                        <li class="scroll-to-section">
                            <a href="boardIndex.php" class="active">意見箱</a>
                        </li>
                        <li class="scroll-to-section">
                            <a href="memberIndex.php">會員管理</a>
                        </li>
                        <li class="scroll-to-section">
                            <a href="orderIndex.php">訂單管理</a>
                        </li>
                        <li class="scroll-to-section">
                            <a href="artistIndex.php">歌手管理</a>
                        </li>
                        <li class="submenu">
                            <a href="productIndex.php">商品管理</a>
                            <ul class="sub-menu">
                                <li><a href="productIndex.php">全部</a></li>
                                <li><a href="productIndex.php?field=product_id&search=k-pop">K-pop</a></li>
                                <li><a href="productIndex.php?field=product_id&search=j-pop">J-pop</a></li>
                                <li><a href="productIndex.php?field=product_id&search=m-pop">M-pop</a></li>
                                <li><a href="productIndex.php?field=product_id&search=west">West</a></li>
                            </ul>
                        </li>
                        <li class="scroll-to-section">
                            <?php include 'printAdminAccount.php'; ?>
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