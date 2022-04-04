<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    $data_loai = $query->ChiTiet("loai", [], ["id" => "="],["id" => $id]);
	$data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
	if(isset($_POST['update']))
	{
		$loai = new Loai();
		$loai->CapNhat($query,$id);
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Loại <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_loai->ten?>" />

		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_loai->slug?>" />

		<p class="tit-label">Danh mục</p>
		<p class="tit-label">Danh mục</p>
		<?php
		$arr_danhmuc = explode(",", $data_loai->danhmuc);
		foreach ($data_danhmuc as $key => $val) 
		{
			if(in_array($val->id, $arr_danhmuc))
			{
				echo '<label><input type="checkbox" name="danhmuc[]" value="'.$val->id.'" checked /> '.$val->ten.'</label><br>';
			}
			else
			{
				echo '<label><input type="checkbox" name="danhmuc[]" value="'.$val->id.'" /> '.$val->ten.'</label><br>';
			}
		}
		?>

		<p class="tit-label"></p>
		<input type="submit" name="update" class="submit" val="Cập nhật"/>
	</form>
</div>