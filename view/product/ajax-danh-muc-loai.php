<?php 
	require_once "../../admin/model/ThongSo.php";
	$thongso = new ThongSo();
	$data_thongso = $thongso->DanhSachDanhMucLoai(["danhmuc" => $_POST['danhmuc'], "loai" => $_POST['loai']]);
	echo '<div class="wrap">';
		if(!empty($data_thongso))
		{
			foreach ($data_thongso as $key => $value) 
			{
				echo '<span>';
					echo '<img class="chon-thong-so cts-'.$value->id.'" thongso="'.$value->id.'" src="public/image/product/check.png" choose="no" danhmuc="'.$_POST['danhmuc'].'" loai="'.$_POST['loai'].'" />';
					echo '<label class="chon-thong-so cts-'.$value->id.'" thongso="'.$value->id.'" choose="no" danhmuc='.$_POST['danhmuc'].' loai='.$_POST['loai'].'>'.$value->ten.'</label>';
				echo '</span>';
			}
		}
		else
		{
			echo '<span><label>Chưa có bộ lọc</label></span>';
		}
	echo '</div>';
?>