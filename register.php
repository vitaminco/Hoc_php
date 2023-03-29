<?php
    include("include/common.php");

    if(is_method_post()){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cf_password = $_POST["cf_password"];
        
        if($password != $cf_password){
            js_alert("MẬT KHẨU KHÔNG KHỚP!!!!!!!");
            js_redirect_to("register.php");
            die;
        }

        if(isUsernameExists($username)){
            js_alert("Tài khoảng đã tồn tại!!!!!!!");
            js_redirect_to("register.php");
            die;
        }
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users values(default, ?, ?)";
        $params = [$username, $password_hash];
        db_execute($sql, $params);
        js_redirect_to("index3.php");
    }

    function isUsernameExists(string $username):bool{
        $sql = "select * from users where username = ?";
        $data = db_select($sql, [$username]);
        return !empty($data);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php asset("./CSS/style.css");?>"/>
</head>
<body>
    <h2>ĐĂNG KÍ TÀI KHOẢNG</h2>
    <form method="post" class="KHUNG">
        <div class="THE">
            <label for="">Tên đăng nhập</label>
            <input type="text" name="username" minlength="4" required>
        </div>
        <div class="THE">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" minlength="4" required>
        </div>
        <div class="THE">
            <label for="">Nhập lại mật khẩu</label>
            <input type="password" name="cf_password" minlength="4" required>
        </div>
        <div class="dk">
            <hr>
            <input type="submit" value="ĐĂNG KÝ">
        </div>
    </form>
</body>
</html>