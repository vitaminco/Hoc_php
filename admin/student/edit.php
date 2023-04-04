
<?php
    include("../../include/common.php");

    $id = $_GET["id"] ?? -1;
    if(is_method_get()){
        //lấy dữ liệu
        $sql = "select * from students where id = ?";
        $data = db_select($sql, [$id]);

        if(empty($data)){
            //quay về trang chủ ko có dữ liệu
            redirect_to("/admin/student");
        }
        $data = $data[0];
        
    }else if(is_method_post()){
        //cập nhật dữ liệu
        $fullname =  $_POST["fullname"];
        $ngaysinh =  $_POST["dob"];
        $gioitinh =  $_POST["genden"];
        $diachi =  $_POST["address"];
        $idlop =  $_POST["class_id"];
        
        $filename = upload_and_return_filename("img_path","student/img");
        $sql = "update students set fullname = ?, dob = ?, genden = ?, address = ?, class_id = ?, img_path = ? where id = ?";

        $params = [$fullname, $ngaysinh, $gioitinh, $diachi, $idlop, $filename, $id];
        db_execute($sql, $params);
    
        redirect_to("/indexstudents.php");
    }

    $_title = "Cập nhật sửa";
    include("../_header.php");
?>

    <form method="post" enctype="multipart/form-data">
        <label for="">Cập nhật họ tên</label> 
        <input type="text" name="fullname" required value="<?php echo $data["fullname"]?>"> <br>
        <label for="">Cập nhật ngày sinh</label> 
        <input type="date" name="dob" required value="<?php echo $data["dob"]?>"> <br>
        <label for="">Cập nhật giới tính</label> 
        <label for="">
            <input type="radio" name="genden">
            nam
        </label>
        <label for="">
            <input type="radio" name="genden">
            nữ
        </label> <br>
        <label for="">Cập nhật dịa chỉ</label> 
        <input type="text" name="address" value="<?php echo $data["address"]?>"> <br>
        <label for="">Cập nhật id lop</label>
        <select name="class_id" id="">
            <option value="">-- chọn lại id lớp --</option>
            <?php
                gen_option_ele("classes", "id", "class_name");
            ?>
        </select> <br>
        <label for="">Cập nhật hình</label>
        <?php if(!empty($data["img_path"])) { ?>
            <img src="<?php upload($data["img_path"]); ?>" width="100"/>
            <br>
        <?php }?>
        <input type="file" name="img_path" accept=".png, .ipg, .jpeg"> <br> <hr>

        <input type="submit" name="capnhat" value="Cập nhật">
    </form>
