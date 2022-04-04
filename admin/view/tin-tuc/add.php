<?php
	$data_loaitin = $query->DanhSach("loaitin", [], [], [], [], [], []);
	if(isset($_POST['add']))
	{
		$tin = new Tin();
        $tin->CapNhat($query);
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Tin tức <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />
		
		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Loại tin</p>
		<select name="loai" required>
			<option value="0">Chọn</option>
			<?php
			foreach ($data_loaitin as $key => $value) {
				echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
			}
			?>
		</select>

		<p class="tit-label">Hình vuông</p>
		<input type="file" name="vuong" /> 500 x 359

		<p class="tit-label">Hình dài</p>
		<input type="file" name="dai" /> 600 x 214px

		<p class="tit-label">Mô tả</p>
		<textarea rows="5" spellcheck="false" name="mota" class="ckeditor"></textarea>

		<p class="tit-label">Nội dung</p>
		<textarea rows="5" spellcheck="false" name="noidung" class="ckeditor"></textarea>

		<p class="tit-label">Tag</p>
		<?php
		foreach ($data_loaitin as $key => $value) {
			echo '<label><input type="checkbox" name="tag[]" value="'.$value->id.'" /> '.$value->ten.'</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		}
		?>

		<p class="tit-label">Nổi bật</p>
		<label><input type="radio" name="noibat" value="1" /> Có</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="noibat" value="0" checked /> Không</label>

		<p class="tit-label"></p>
		<input type="submit" name="add" value="Thêm mới" />
	</form>
</div>