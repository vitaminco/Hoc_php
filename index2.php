
<?php

    include("include/common.php");

    $sql = "select * from students";

    $data = db_select($sql);

    foreach($data as $item){
        $id = $item["id"];
        $fullname = $item["fullname"];
        $gioitinh = $item["genden"];
        $ngaysinh = $item["dob"];
        $diachi = $item["address"];
        $idlop = $item["class_id"];

        echo " id: $id <br/> full name: $fullname <br/> gioi tinh:  $gioitinh <br/> ngay sinh: $ngaysinh <br/> dia chi: $diachi <br/> id lop: $idlop <hr/>";
    }
?>
