<?php 
	require_once("../../model/Query.php");
	$query = new Query();
	$get_nhom = $_POST['nhom'];
	$get_trang = $_POST['trang'];
	$get_quyen = $_POST['quyen'];
	$get_trangthai = $_POST['trangthai'];
	$data_phanquyen = $query->ChiTiet("phanquyen", [], ["nhom"=>"=", "trang"=>"="], ["nhom"=>$get_nhom, "trang"=>$get_trang]);
	if($get_trangthai == 0)
	{
		$save_trangthai = 1;
	}
	else
	{
		$save_trangthai = 0;
	}
	if(!empty($data_phanquyen))
	{
		if($get_quyen == "xem")
		{
			$query->CapNhat("phanquyen", ["xem"],["nhom", "trang"], ["xem"=> $save_trangthai, "nhom" => $get_nhom, "trang" => $get_trang]);
		}
		else if($get_quyen == "sua")
		{
			$query->CapNhat("phanquyen", ["sua"],["nhom", "trang"], ["sua"=> $save_trangthai, "nhom" => $get_nhom, "trang" => $get_trang]);
		}
		else
		{
			$query->CapNhat("phanquyen", ["xoa"],["nhom", "trang"], ["xoa"=> $save_trangthai, "nhom" => $get_nhom, "trang" => $get_trang]);
		}
	}
	else
	{
		if($get_quyen == "xem")
		{
			$query->ThemMoi("phanquyen", ["nhom","trang", "xem"], ["nhom" =>$get_nhom, "trang"=>$get_trang, "xem"=> $save_trangthai ]);
		}
		else if($get_quyen == "sua")
		{
			$query->ThemMoi("phanquyen", ["nhom","trang", "sua"], ["nhom" =>$get_nhom, "trang"=>$get_trang, "sua" => $save_trangthai ]);
		}
		else{
			$query->ThemMoi("phanquyen", ["nhom","trang", "xoa"], ["nhom" =>$get_nhom, "trang"=>$get_trang, "xoa" => $save_trangthai ]);
		}
	}
 ?>