<?php 
	session_start();
	require_once "../../model/Query.php";
	$query = new Query();
	#Sản phẩm đá
	$data_detail = $query->ChiTiet("da", [], ["id" => "="], ["id" => $_POST['sanpham']]);
	$arr_hinhanh = json_decode($data_detail->vuong);
	
	#Xử lý danh mục
    $data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
    $arr_danhmuc = [];
    foreach ($data_danhmuc as $key => $value) {
        $arr_danhmuc[$value->id] = $value->ten;
    }

	if($_POST['thaotac'] == "them")
	{
		if(!array_key_exists($_POST['danhmuc'], $_SESSION['danhmuc']))
		{
			$_SESSION['danhmuc'][$_POST['danhmuc']] = $_POST['danhmuc'];
		}
	}
	else
	{
		if(array_key_exists($_POST['danhmuc'], $_SESSION['danhmuc']))
		{
			unset($_SESSION['danhmuc'][$_POST['danhmuc']]);
		}
	}
    foreach ($_SESSION['danhmuc'] as $key_file => $value_file) 
    {
        $id_danhmuc_tmp = $value_file;
        $str_pic = "dm-".$id_danhmuc_tmp;
        if(isset($arr_hinhanh->$str_pic))
        {
        	echo '<p><input type="file" name="vuong'.$id_danhmuc_tmp.'" /> 500 x 408 | '.$arr_danhmuc[$id_danhmuc_tmp].'<p>';
        	echo '<p><img src="../uploads/van-da/'.$arr_hinhanh->$str_pic.'" height="150" /></p>';
        }
        else
        {
        	echo '<p><input type="file" name="vuong'.$id_danhmuc_tmp.'" required /> 500 x 408 | '.$arr_danhmuc[$id_danhmuc_tmp].'<p>';
        }
    }
?>