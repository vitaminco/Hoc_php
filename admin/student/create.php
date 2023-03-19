
<?php
 include("../../include/common.php");

 if(is_method_post()){
    $fullname =  $_POST["fullname"] ?? "";
    $ngaysinh =  $_POST["ngaysinh"] ?? "";
    $gioitinh =  $_POST["gioitinh"] ?? "";
    $diachi =  $_POST["diachi"] ?? "";
    $idlop =  $_POST["idlop"] ?? "";
    $filename = upload_and_return_filename("img_path");
    $sql = "insert into students(fullname, dob, genden, address, class_id, img_path)
        values(?,?,?,?,?,?)";

    $params = [$fullname, $ngaysinh, $gioitinh, $diachi, $idlop, $filename];
    db_execute($sql, $params);
    
    js_alert("thêm mới thành công");
    redirect_to("/indexstudents.php");
}

$_title = "Cập nhật học sinh";
include("../_header.php");
?>

    <form method="post" enctype="multipart/form-data">
            <label for="">Thêm họ và tên</label>
            <input type="text" name="fullname" required> <br>
            <label for="">giới tính</label>
            <label for="">
                <input type="radio" name="gioitinh" value="0">
                Nam
            </label>
            <label for="">
                <input type="radio" name="gioitinh" value="1">
                Nữ
            </label>
            <br>
            <label for="">ngày sinh</label>
            <input type="date" name="ngaysinh" required> <br>
            <label for="">địa chỉ</label>
            <input type="text" name="diachi" required> <br>

            <label for="">id lớp</label>
            <select name="idlop" id="">
                <option value=""> -- chọn một lớp --</option>
                <?php
                    gen_option_ele("classes", "id","class_name");
                ?>
            </select> <br>

            <label for="">chọn ảnh</label>
            <input type="file" name="img_path" accept=".png, .ipg, .jpeg"> <br> <hr>

            <input type="submit" value="nhập" name="nhap">
    </form>
    <?php include("../_footer.php");?>