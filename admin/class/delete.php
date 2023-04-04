<?php
    include("../../include/common.php");

    $id = $_GET["id"] ?? -1;
    $sql = "delete from classes where id = ?";
    
    if(db_execute($sql, [$id])){
        js_alert("Xóa thành công");
    }else{
        js_alert("Xóa không thành công");
    }
    js_redirect_to("/index3.php");
?>