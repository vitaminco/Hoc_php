
<?php
    include("../../include/common.php");

    check_login();
    if(is_method_post()){
        $name = $_POST["class_name"];
        $sql = "insert into classes values(default, ?)";

        $insert_success = db_execute($sql, [$name]);
        if($insert_success){
            js_alert("thêm mới thành công");
            redirect_to("/index3.php");
        }
    }

$_title = "Cập nhật lớp";
include("../_header.php");
?>


    <form method="post">
        <label for="">Class name</label> <br>
        <input type="text" name="class_name" required> <!--required để hiện cái thông báo chưa nhập vào-->

        <input type="submit" name="them" value="Thêm">
    </form>

<?php include("../_footer.php");?>