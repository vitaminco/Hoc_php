
<?php
	include("include/common.php");

	$data = db_select("select * from classes");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh sách lớp</title>
	<link rel="stylesheet" href="<?php asset("./CSS/style.css");?>"/>

</head>
<body>
	<div class="container">
		<div class="mb-3">
			<a href="./admin/class/create.php" class="btn btn-a">Thêm mới lớp</a>
			<?php if(is_logged()) { ?>
				<a href="./logout.php" class="btn btn-a">TRANG ĐĂNG XUẤT</a>
			<?php } else {?>
				<a href="register.php" class="btn btn-a">TRANG ĐĂNG KÝ</a>
				<a href="login.php" class="btn btn-a">TRANG ĐĂNG NHẬP</a>
			<?php }?>
		</div>

		<table>
			<col style="width: 10%;" />
			<col style="width: 70%;" />
			<col style="width: 20%;" />
			<thead>
				<tr>
					<th>ID</th>
					<th>Lớp</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php  
					foreach($data as $x){
						$id = $x["id"];
						$class_name = $x["class_name"];

						echo <<<EOL
						<tr>
						<td>$id</td>
						<td>$class_name</td>
						<td>
							<a href="./indexstudents.php" class="btn btn-a">Chi tiết</a>
							<a href="./admin/class/edit.php?id=$id" class="btn btn-b">Sửa</a>
							<a href="admin/class/delete.php?id=$id" class="btn btn-c">Xóa</a>
						</td>
				</tr>
EOL;
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>