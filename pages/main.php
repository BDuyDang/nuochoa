<?php 
session_start();
if (!isset($_SESSION["page"]))
    $_SESSION["page"] = "dssp";
if (isset($_POST["p"])) {
    $_SESSION["page"] = $_POST["p"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/alert.css">
    <link rel="stylesheet" href="<?="../css/".$_SESSION["page"].".css";?>">
</head>
<body>
    <div class="nav-bar">
        <div class="nav-img">
            <img class="glasses" src="../assets/imgs/nuochoa.svg">
        </div>
        <div class="nav-title">
            Xin chào, admin!
        </div>
        <div class="nav-space"></div>
        <div class="nav-option-box">
            <div class="nav-option btn">
                Quản lý ▾
            </div>
            <form class="nav-option-menu" method="POST">
                <button class="nav-menu-item btn <?=($_SESSION["page"] == "dssp" ? "menu-item-active" : "")?>" name="p" value="dssp" type="submit">Danh sách sản phẩm</button>
                <button class="nav-menu-item btn <?=($_SESSION["page"] == "thd" ? "menu-item-active" : "")?>" name="p" value="thd" type="submit">Danh sách hoá đơn</button>
            </form>
        </div>
        <button class="nav-signout btn" onclick="window.location.href='../index.php'">
            Đăng xuất
        </button>
    </div>
    <div class="center">
        <div class="main">
            <?php
                include '../pages/'.$_SESSION["page"].'.php';
                if(isset($alert) && isset($alert_type))
                    include '../pages/alert.php';
                unset($alert, $alert_type);
            ?>
        </div>
    </div>
</body>
</html>