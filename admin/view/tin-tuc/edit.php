<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    $data_detail = $query->ChiTiet("tintuc", [], ["id" => "="], ["id" => $id]);
    $data_loaitin = $query->DanhSach("loaitin", [], [], [], [], [], []);
	// Mảng tag
	$tintuc = new Tin();
	$arr_tag =$tintuc->MangTag($data_detail);
	// Vuông
	$vuong_old =$tintuc->Vuong($data_detail);
	// Dài
	$dai_old =$tintuc->Dai($data_detail);
	if(isset($_POST['edit']))
	{
		$tin = new Tin();
        $tin->CapNhat($query,$id,$lib,$data_detail);   
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Tin tức <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
		
		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->slug?>" />

		<p class="tit-label">Loại tin</p>
		<select name="loai">
			<option value="0">Chọn</option>
			<?php
			foreach ($data_loaitin as $key => $value) {
				if($value->id == $data_detail->loai)
				{
					echo '<option value="'.$value->id.'" selected>'.$value->ten.'</option>';
				}
				else
				{
					echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
				}
			}
			?>
		</select>

		<p class="tit-label">Hình vuông</p>
		<input type="file" name="vuong" /> 500 x 359
		<?php
		if($data_detail->vuong != NULL)
		{
			echo '<br><br><p><img src="../uploads/tin-tuc/'.$data_detail->vuong.'" height="150" />';
		}
		?>
		
		<p class="tit-label">Hình dài</p>
		<input type="file" name="dai" /> 600 x 214px
		<?php
		if($data_detail->dai != NULL)
		{
			echo '<br><br><p><img src="../uploads/tin-tuc/'.$data_detail->dai.'" height="150" />';
		}
		?>

		<p class="tit-label">Mô tả</p>
		<textarea rows="5" spellcheck="false" name="mota" class="ckeditor"><?=$data_detail->mota?></textarea>

		<p class="tit-label">Nội dung</p>
		<textarea rows="5" spellcheck="false" name="noidung" class="ckeditor"><?=$data_detail->noidung?></textarea>

		<p class="tit-label">Tag</p>
		<?php
		foreach ($data_loaitin as $key => $value) {
			if(in_array($value->id, $arr_tag))
			{
				echo '<label><input type="checkbox" name="tag[]" value="'.$value->id.'" checked /> '.$value->ten.'</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			else
			{
				echo '<label><input type="checkbox" name="tag[]" value="'.$value->id.'" /> '.$value->ten.'</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
		}
		?>

		<p class="tit-label">Nổi bật</p>
		<label><input type="radio" name="noibat" value="1" <?php if($data_detail->noibat == 1) echo "checked";?> /> Có</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="noibat" value="0" <?php if($data_detail->noibat == 0) echo "checked";?> /> Không</label>

		<p class="tit-label"></p>
		<input type="submit" name="edit" value="Cập nhật" />
	</form>
</div>