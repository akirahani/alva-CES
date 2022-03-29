<?php 
	require_once "../../model/PhanQuyen.php";
	$phanquyen = new PhanQuyen();
	$data_check = [
		"nhom" => $_POST['nhom'],
		"trang" => $_POST['trang']
	];
	$check = $phanquyen->KiemTra($data_check);
	if($check > 0)
	{
		// Update
		$post_data=[
        	'nhom' => $_POST["nhom"],
        	'trang' => $_POST["trang"]
        ];
		if($_POST['quyen'] == "xem")
		{
			if($_POST['trangthai'] == 1)
			{
				$post_data["xem"] = 0;
			}
			else
			{
				$post_data["xem"] = 1;
			}
			$phanquyen->CapNhatXem($post_data);
		}
		if($_POST['quyen'] == "sua")
		{
			if($_POST['trangthai'] == 1)
			{
				$post_data["sua"] = 0;
			}
			else
			{
				$post_data["sua"] = 1;
			}
			$phanquyen->CapNhatSua($post_data);
		}
		if($_POST['quyen'] == "xoa")
		{
			if($_POST['trangthai'] == 1)
			{
				$post_data["xoa"] = 0;
			}
			else
			{
				$post_data["xoa"] = 1;
			}
			$phanquyen->CapNhatXoa($post_data);
		}
	}
	else
	{
		// Insert
		if($_POST['quyen'] == "xem")
		{
			$post_data=[
	        	'nhom' => $_POST["nhom"],
	        	'trang' => $_POST["trang"],
	        	'xem' => 1,
	        	'sua' => 0,
	        	'xoa' => 0
	        ];
		}
		if($_POST['quyen'] == "sua")
		{
			$post_data=[
	        	'nhom' => $_POST["nhom"],
	        	'trang' => $_POST["trang"],
	        	'xem' => 0,
	        	'sua' => 1,
	        	'xoa' => 0
	        ];
		}
		if($_POST['quyen'] == "xoa")
		{
			$post_data=[
	        	'nhom' => $_POST["nhom"],
	        	'trang' => $_POST["trang"],
	        	'xem' => 0,
	        	'sua' => 0,
	        	'xoa' => 1
	        ];
		}
		$phanquyen->ThemMoi($post_data);
	}
 ?>