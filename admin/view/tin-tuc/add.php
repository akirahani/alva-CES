<?php
	$data_loaitin = $query->DanhSach("loaitin", [], [], [], [], [], []);
	if(isset($_POST['add']))
	{
		$tin = new Tin();
        $tin->ThemMoi($query,$lib,$data_detail);
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

		<p class="tit-label">Hình vuông</p> 500 x 359
		<div class ="mobile" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="mobile" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="mobile" name="vuong"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label>

		<p class="tit-label">Hình dài</p>600 x 214px
		<div class ="desktop" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="desktop" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="desktop" name="dai"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label> 

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
<script type="text/javascript" src="view/tin-tuc/tin.js"></script>