<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$data = $query->ChiTiet('trang',[],['id'=>'='],['id'=>$id]);;
	
	if(isset($_POST['submit']))
	{
		$id = $_POST['id_update'];
		$post_trang = [
			"id" => $id,
			"ten" => $_POST['ten'],
			"trang" => $_POST['trang'],
		];
		$query->CapNhat('trang',['ten','trang'],['id'],$post_trang);
		header("location:list");
	}
?>

<div class="blog small">
	<div class="bread">
		<h1>Trang <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data">
		<input type="hidden" name="id_update" value=" <?=$data->id?> " >
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data->ten?>" />
		<p class="tit-label">Link</p>
		<input type="text" name="trang" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data->trang?>" />
		<p class="tit-label"></p>
		<button type="submit" class="submit" name="submit">Cập nhật</button>
	</form>
</div>