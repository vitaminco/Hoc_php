
<?php
    include("../../include/common.php");

    $id = $_GET["id"] ?? -1;
    if(is_method_get()){
        //lấy dữ liệu
        $sql = "select * from classes where id = ?";
        $data = db_select($sql, [$id]);
        if(empty($data)){
            //quay về trang chủ ko có dữ liệu
            redirect_to("/index3.php");
        }
        $data = $data[0];
    }else if(is_method_post()){
        //cập nhật dữ liệu
        $name = $_POST["class_name"];
        $sql = "update classes set class_name = ? where id = ?";
        db_execute($sql, [$name, $id]);
        redirect_to("/index3.php");
    }

    $_title = "Cập nhật lớp";
    include("../_header.php");
?>

    <form method="post">
        <label for="">Cập nhật lớp</label> <br>
        <input type="text" name="class_name" required value="<?php echo $data["class_name"]?>"> <!--required để hiện cái thông báo chưa nhập vào thêm valua để cho nó hiện dữ liệu lên-->

        <input type="submit" name="capnhat" value="Cập nhật">
    </form>
