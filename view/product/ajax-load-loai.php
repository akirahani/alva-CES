<?php 
	require_once "../../admin/model/Loai.php";
	$loai = new Loai();
	$data_loai = $loai->DanhSach();
	$id_danhmuc = $_POST['id'];
	$arr_loai = [];
	foreach ($data_loai as $key => $value) 
	{
		$str_danhmuc = explode(",", $value->danhmuc);
		if(!empty($str_danhmuc))
		{
			if(in_array($id_danhmuc, $str_danhmuc))
			{
				array_push($arr_loai, ["id" => $value->id, "ten" => $value->ten]);
			}
		}
	}
	echo json_encode($arr_loai);
?>