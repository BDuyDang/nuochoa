<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="background"></div>
    <div class="main">
        <img class="main-img" src="../assets/imgs/nuochoa.svg">
        <div class="title">Quản lý cửa hàng nước hoa</div>
        <form class="login" method="POST">
            <div class="login-main">
                <div class="login-left">
                    <div class="login-title">Tên người dùng:</div> 
                    <input class="login-input" type="input" name="username" placeholder="Nhập tên người dùng">
                </div>
                <div class="login-right">
                    <div class="login-title">Mật khẩu:</div> 
                    <input class="login-input" type="input" name="password" placeholder="Nhập mật khẩu">
                </div>
            </div>
            <div class="login-btn-box">
                <button class="login-btn" type="submit" name="login">Đăng nhập</button>
            </div>
            <?php
                if(isset($_POST["login"])) {
                    if($_POST["username"] == "admin" && $_POST["password"] == "admin") {
                        header("Location: ./main.php");
                    }
                }
            ?>
        </form>
    </div>
</body>
</html>