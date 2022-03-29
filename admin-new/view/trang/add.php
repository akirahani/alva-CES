<?php
	#Nhóm - Trang - Phân quyền
    require_once "model/PhanQuyen.php";
    $phanquyen = new PhanQuyen();
    $data_phanquyen = $phanquyen->NhomTrangQuyen($__NHOM__, 1);
    if( empty($data_phanquyen) || $data_phanquyen->sua == 0 ) header("location:./");

	require_once "model/Trang.php";
	$trang = new Trang();
	if(isset($_POST['submit']))
	{
		$post_trang = [
			"ten" => $_POST['ten']
		];
		$trang->ThemMoi($post_trang);
		header("location:trang");
	}
?>

<div class="row small">
	<div class="bread">
		<h1>Trang <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" />
		
		<p class="tit-label"></p>
		<button type="submit" class="submit" name="submit">Thêm mới</button>
	</form>
</div>