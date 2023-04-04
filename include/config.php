<?php

/*
 * Thay "php_common_function" bằng tên thư mục của bạn ở htdocs
 */

// Thư mục gốc ở htdocs (đối với XAMPP)
define('ROOT_PATH', "/Hoc_php"); //tên file chính

// Thư mục chứa file asset (css/js/img)
define('ASSET_PATH', "/Hoc_php/asset");

// Thư mục chứa file upload bởi user
define('UPLOAD_PATH', "/Hoc_php/upload");

// Đường dẫn đầy đủ đến thư mục hiện tại, không cần chỉnh sửa nếu dùng XAMPP
define('DOCUMENT_ROOT_PATH', $_SERVER["DOCUMENT_ROOT"]);

// Thông tin đăng nhập database
$database = [
	"host" => "localhost",
	"db" => "web_php",
	"username" => "root",
	"password" => "",
];
