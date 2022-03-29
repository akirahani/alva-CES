<?php 
	require_once "../../model/Query.php";
	$query = new Query();
	$id_danhmuc = $_POST['danhmuc'];
	if($id_danhmuc != 0)
	{
		$data_list = $query->DanhSach("loai", [], [], [], [], [], []);
		foreach ($data_list as $key => $value) 
		{
			$tmp_danhmuc = explode(",", $value->danhmuc);
			if(in_array($id_danhmuc, $tmp_danhmuc))
			{
				echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
			}
		}
	}
?>