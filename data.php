<?php
include("include/common.php");

$x = '03'; //cái cần tìm
$x = "%$x%";
$sql = "select * from classes where class_name like ?";

$data = db_select($sql, [$x]);

foreach ($data as $item){
    $id = $item["id"];
    $name = $item["class_name"];

    echo "$id $name";
}

// js_alert("Tải dữ liệu thành công");
?>
