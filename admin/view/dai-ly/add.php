<?php
	$data_tinhthanh = $query->DanhSach("tinhthanh", [], [], [], [], [], []);
	$daily = new DaiLy();
	$daily->ThemMoi($query,$lib);
?>
<div class="blog medium">

	<div class="bread">
		<h1>Đại lý <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />
		
		<p class="tit-label">Địa chỉ</p>
		<input type="text" name="diachi" spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Điện thoại</p>
		<input type="text" name="dienthoai" spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Hệ thống</p>
		<label><input type="radio" name="hethong" value="1"> Đại lý hệ thống</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="hethong" value="0" checked> Đại lý thường</label>

		<p class="tit-label">Tỉnh thành</p>
		<select name="tinhthanh">
			<option value="0">Chọn</option>
			<?php
			foreach ($data_tinhthanh as $key => $value) {
				echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
			}
			?>
		</select>

		<p class="tit-label">Album</p>  16 x 9 px
		<div class ="file" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="file" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="file" name="album[]"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label>

		<p class="tit-label">Tên Không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Map</p>
		<textarea rows="6" name="map"></textarea>

		<p class="tit-label">Giới thiệu</p>
		<textarea class="ckeditor" name="gioithieu"></textarea>

		<p class="tit-label"></p>
		<input type="submit" name="insert" value="Thêm mới" />
	</form>
</div>
<script src="view/dai-ly/daily.js"></script>