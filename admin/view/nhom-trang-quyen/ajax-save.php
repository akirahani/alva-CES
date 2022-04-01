<?php 
	require_once("../../model/Query.php");
	$query = new Query();
	// $phanquyen = $query->DanhSach('phan-quyen',[],[],[],[]);
	// $data_check = [
	// 	"nhom" => $_POST['nhom'],
	// 	"trang" => $_POST['trang']
	// ];
	// $check = $query->DanhSach('phan-quyen',['nhom','trang'],[],[],[],$data_check);
	// if($check > 0)
	// {
	// 	// Update
	// 	$post_data=[
 //        	'nhom' => $_POST["nhom"],
 //        	'trang' => $_POST["trang"]
 //        ];
	// 	if($_POST['quyen'] == "xem")
	// 	{
	// 		if($_POST['trangthai'] == 1)
	// 		{
	// 			$post_data["xem"] = 0;
	// 		}
	// 		else
	// 		{
	// 			$post_data["xem"] = 1;
	// 		}
	// 		$query->CapNhat('phan-quyen',[],[],$post_data);
	// 	}
	// 	if($_POST['quyen'] == "sua")
	// 	{
	// 		if($_POST['trangthai'] == 1)
	// 		{
	// 			$post_data["sua"] = 0;
	// 		}
	// 		else
	// 		{
	// 			$post_data["sua"] = 1;
	// 		}
	// 		$query->CapNhat('phan-quyen',[],[],$post_data);
	// 	}
	// 	if($_POST['quyen'] == "xoa")
	// 	{
	// 		if($_POST['trangthai'] == 1)
	// 		{
	// 			$post_data["xoa"] = 0;
	// 		}
	// 		else
	// 		{
	// 			$post_data["xoa"] = 1;
	// 		}
	// 		$query->CapNhat('phan-quyen',[],[],$post_data);
	// 	}
	// }
	if(isset($_POST['nhom']) && isset($_POST['trang']) && isset($_POST['quyen']) && isset($_POST['trangthai']) )
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
		var_dump($post_data);
		$query->ThemMoi('phan-quyen',["nhom","trang","xem","sua","xoa"]	,$post_data);
	}
 ?>