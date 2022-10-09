<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<style>
    nav.navbar .nav-item .nav-link.active {
        background-color: coral;
        color: white;
        font-weight: bold;
        border-radius: 10px;
    }
</style>
<div class="container mb-3">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">快速選單</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $pageName == 'base' ? 'active' : '' ?>" href="05-basepage-no-admin.php">首頁</a>
                    </li>
                    <li class="nav-item <?= $pageName == 'product' ? 'active' : '' ?>">
                        <a class="nav-link" href="#">商品</a>
                    </li>
                    <li class="nav-item <?= $pageName == 'event' ? 'active' : '' ?>">
                        <a class="nav-link" href="#">活動</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <?php if (empty($_SESSION['member']) && empty($_SESSION['shop'])) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?= $pageName == 'mb_register' ? 'active' : '' ?>" role="button" data-bs-toggle="dropdown">註冊</a>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="05-mb_register.php">會員</a></li>
                                <li><a class="dropdown-item" href="#">商家</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?= $pageName == 'mb_login' ? 'active' : '' ?>" role="button" data-bs-toggle="dropdown">登入</a>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="05-mb_login.php">會員</a></li>
                                <li><a class="dropdown-item" href="#">商家</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <?php if (!empty($_SESSION['member'])) : ?>
                                <a class="nav-link"><?= empty($_SESSION['member']['nickname']) ? $_SESSION['member']['forename'] : $_SESSION['member']['nickname'] ?>
                                </a>
                            <?php else : ?>
                                <a class="nav-link"><?= $_SESSION['shop']['account'] ?></a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="cursor: pointer;" onclick="Logout()">登出</a>
                            <!-- <a class="nav-link" style="cursor: pointer;" href="05-mb_logout.php" onclick="return confirm('確定要登出嗎?')">登出</a> -->
                        </li>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </nav>
</div>

<script>
    function Logout() {

        if (confirm('確定要登出嗎?')) {
            location.href = "00-logout-mb-shop.php";
        }
    }
</script>