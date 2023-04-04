<?php
    include("include/common.php");

    if(is_logged()){
        js_redirect_to("index3.php");
    }
    if(is_method_post()){
//nhận thông tin từ from post
        $username = $_POST["username"];
        $password = $_POST["password"];
//select từ db dựa vào username
        $sql = "select * from `users` where `username` = ?";
        $user = db_select($sql, [$username]);
//kiểm tra select nếu rông thì => nhập sai
        if(empty($user)){
            js_alert("Nhập sai mật khẩu");
            //quay về trang chủ ko có dữ liệu
            js_redirect_to("login.php");
            die;
        }
         $user = $user[0];
//nếu kết quả select khác rổng thì so sánh password trong db với password ở bước 1
        if(password_verify($password,$user["password"]) == true){
            js_alert("OK GOOD!!!");
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $user["id"];
        }else{
            js_alert("Tên đăng nhập hoặc mật khẩu không đúng");
            js_redirect_to("login.php");
            die;
        }
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
    <h2>ĐĂNG NHẬP TÀI KHOẢNG</h2>
    <form method="post" class="KHUNG">
        <div class="THE">
            <label for="">Tên đăng nhập</label>
            <input type="text" name="username" minlength="4" required>
        </div>
        <div class="THE">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" minlength="4" required>
        </div>
        <div class="dk">
            <hr>
            <input type="submit" value="ĐĂNG ĐĂNG NHẬP">
        </div>
    </form>
</body>
</html>