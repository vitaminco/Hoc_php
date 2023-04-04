<?php
    include("../../include/common.php");

    $id = $_GET["id"] ?? -1;
    $sql_sel = "select * from students where id = ?";
    $sql_del = "delete from students where id = ?";

    $data=db_select($sql_sel, [$id]);
    if (empty($data)){
        js_alert("Không có gì để xóa");
        js_redirect_to("indexstudents.php");
        die;
    }
$data = $data[0];
  //xóa file ảnh
  remove_file($data["img_path"]);
  //Xóa trong db
  db_execute($sql_del, [$id]);
  js_alert("Xóa thành công");
  js_redirect_to("indexstudents.php");
?>