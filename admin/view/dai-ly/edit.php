<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    $data_detail = $query->ChiTiet("daily", [], ["id" => "="], ["id" => $id]);
    $daily = new DaiLy();
	$arr_album_old = $daily->Album($data_detail);
	$data_tinhthanh = $query->DanhSach("tinhthanh", [], [], [], [], [], []);
	if(isset($_POST['update']))
	{
		$daily = new DaiLy();
        $daily->CapNhat($query,$id,$lib,$data_detail);
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Đại lý <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
		
		<p class="tit-label">Địa chỉ</p>
		<input type="text" name="diachi" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->diachi?>" />

		<p class="tit-label">Điện thoại</p>
		<input type="text" name="dienthoai" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->dienthoai?>" />

		<p class="tit-label">Hệ thống</p>
		<label><input type="radio" name="hethong" value="1" <?php if($data_detail->hethong==1) echo "checked";?>> Đại lý hệ thống</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="hethong" value="0" <?php if($data_detail->hethong==0) echo "checked";?>> Đại lý thường</label>

		<p class="tit-label">Tỉnh thành</p>
		<select name="tinhthanh">
			<option value="0">Chọn</option>
			<?php
			foreach ($data_tinhthanh as $key => $value) {
				if($value->id == $data_detail->tinhthanh)
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

		<p class="tit-label">Album</p>  16 x 9 px
		<div class ="file"  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="file" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="file" name="album[]"   accept="image/*"  class="mb-2" multiple hidden />
        </label>
        <br><br>
		<?php
		if($data_detail->album != NULL)
		{
			foreach ($arr_album_old as $key_p => $value_p) {
				echo '<img src="../uploads/dai-ly/'.$value_p.'" height="100" style="padding: 2px;" />';
			}
		}
		?>

		<p class="tit-label">Tên Không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->slug?>" />

		<p class="tit-label">Map</p>
		<textarea rows="6" name="map"><?=$data_detail->map?></textarea>

		<p class="tit-label">Giới thiệu</p>
		<textarea class="ckupdateor" name="gioithieu"><?=$data_detail->gioithieu?></textarea>

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Cập nhật" />
	</form>
</div>
<script src="view/dai-ly/daily.js"></script>