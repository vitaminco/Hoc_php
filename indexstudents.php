<?php
	include("include/common.php");

    $data = db_select("SELECT st.*, cls.class_name FROM students st
                        left join classes cls on st.class_id = cls.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>students</title>
    <link rel="stylesheet" href="<?php asset("./CSS/CSSTD.css");?>"/>

</head>
<body>
    <table border="1" align="center" class="box">
        <tr>
            <td class="name">ID</td>
            <td class="name">họ tên</td>
            <td class="name">ngày sinh</td>
            <td class="name">giới tính<td>
            <td class="name">địa chỉ</td>
            <td class="name">class id</td>
            <td class="name">Lớp</td>
            <td class="name">ảnh</td>
            
            <td class="name"><a href="./admin/student/create.php" style="background-color: palegreen;">Thêm</a></td>
        </tr>
        <?php 
            foreach($data as $item){
                $id = $item["id"];
                $fullname = $item["fullname"];
                $gioitinh = $item["genden"];
                $ngaysinh = $item["dob"];
                $diachi = $item["address"];
                $idlop = $item["class_id"];
                $img_path = $item["img_path"];
                $class_name = $item["class_name"];
                echo <<<IEN
                <tr>
                    <td>$id</td>
                    <td>$fullname</td>
                    <td>$ngaysinh</td>
                    <td>$gioitinh<td>
                    <td>$diachi</td>
                    <td>$idlop</td>
                    <td>$class_name</td>
                    <td><img src="upload/$img_path" width=100 /></td>
                    <td>
                        <button style="background-color: violet; border: none"><a href="">Chi tiết</a></button>
                        <button style="background-color: orange; border: none"><a href="./admin/student/edit.php?id=$id">Sửa</a></button>
                        <button style="background-color: yellow; border: none"><a href="./admin/student/delete.php?id=$id">Xóa</a></button>
                    </td>
                </tr>
IEN;    
            }
        ?>


    </table>
</body>
</html>