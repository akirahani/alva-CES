<?php
	#Nhóm - Trang - Phân quyền
 //    require_once "model/PhanQuyen.php";
 //    $phanquyen = new PhanQuyen();
 //    $data_phanquyen = $phanquyen->NhomTrangQuyen($__NHOM__, 1);
 //    if( empty($data_phanquyen) || $data_phanquyen->sua == 0 ) header("location:./");
    
	// require_once "model/Trang.php";
	

	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$data = $query->ChiTiet('trang',[],['id'=>'='],['id'=>$id]);;
	
	if(isset($_POST['submit']))
	{
		$id = $_POST['id_update'];
		$post_trang = [
			"id" => $id,
			"name" => $_POST['name'],
			"permission" => $_POST['permission'],
		];
		$query->CapNhat('trang',['name','permission'],['id'],$post_trang);
		header("location:list");
	}
?>

<div class="row small">
	<div class="bread">
		<h1>Trang <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data">
		<input type="hidden" name="id_update" value=" <?=$data->id?> " >
		<p class="tit-label">Tên</p>
		<input type="text" name="name" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data->name?>" />
		<p class="tit-label">Link</p>
		<input type="text" name="permission" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data->permission?>" />
		<p class="tit-label"></p>
		<button type="submit" class="submit" name="submit">Cập nhật</button>
	</form>
</div>