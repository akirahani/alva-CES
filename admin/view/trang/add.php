<?php
	#Nhóm - Trang - Phân quyền
 //    require_once "model/PhanQuyen.php";
 //    $phanquyen = new PhanQuyen();
 //    $data_phanquyen = $phanquyen->NhomTrangQuyen($__NHOM__, 1);
 //    if( empty($data_phanquyen) || $data_phanquyen->sua == 0 ) header("location:./");

	// require_once "model/Trang.php";
	// $trang = new Trang();
	if(isset($_POST['submit']))
	{
		$post_trang = [
			"name" => $_POST['name'],
			"permission" => $_POST['permission'],
		];
		
		$query->ThemMoi('trang',["name","permission"],$post_trang);
		header("location:list");
	}

?>


<div class="blog small">
	<div class="bread">
		<h1>Trang <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" class="form" enctype="multipart/form-data">
		<p class="tit-label">Tên</p>
			<input type="text" name="name" spellcheck="false" autocomplete="off" class="input-text" />
		<p class="tit-label">Đường link</p>
		<input type="text" name="permission" spellcheck="false" autocomplete="off" class="input-text" />
		<p class="tit-label"></p>
		<button type="submit" class="submit" class="form input" name="submit">Thêm mới</button>
	</form>
</div>