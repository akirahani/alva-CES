<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    $data_detail = $query->ChiTiet("duan", [], ["id" => "="], ["id" => $id]);
    $duan= new DuAn();
    $arr_album_old =   $duan->ChiTietAlbum($data_detail);
	if(isset($_POST['edit']))
	{
		$duan= new DuAn();
        $duan->CapNhat($query,$id,$data_detail,$lib);
        
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Dự án <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
		
		<p class="tit-label">Hình ảnh</p> 600 x 600 px
		<div class ="vuong"  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="vuong" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="vuong" name="vuong"   accept="image/*"  class="mb-2" multiple hidden/>
        </label> 
		<?php
		if($data_detail->vuong != NULL)
		{
			echo '<br><br><p><img src="../uploads/du-an/'.$data_detail->vuong.'" height="150" />';
		}
		?>

		<p class="tit-label">Hình dài</p> 600 x 314 px
		   <div class ="dai"  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="dai" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="dai" name="dai"   accept="image/*"  class="mb-2" multiple hidden/>
        </label> 
		<?php
		if($data_detail->dai != NULL)
		{
			echo '<br><br><p><img src="../uploads/du-an/'.$data_detail->dai.'" height="150" />';
		}
		?>

		<p class="tit-label">Album</p>
		 <div class ="album" style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="album" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="album" name="album[]"   accept="image/*"  class="mb-2" multiple hidden />
        </label> 
		<?php
		if($data_detail->album != NULL)
		{
			foreach ($arr_album_old as $key_p => $value_p) {
				echo '<br><br><p style="display: inline-flex ;padding: 5px;"><img src="../uploads/du-an/'.$value_p.'" height="150" />';
			}
		}
		?>

		<p class="tit-label">Giới thiệu</p>
		<textarea rows="5" spellcheck="false" name="gioithieu" class="ckeditor"><?=$data_detail->gioithieu?></textarea>

		<p class="tit-label">Nội dung</p>
		<textarea rows="5" spellcheck="false" name="noidung" class="ckeditor"><?=$data_detail->noidung?></textarea>

		<p class="tit-label">Loại dự án</p>
		<label><input type="radio" name="loai" value="1" <?php if($data_detail->loai ==1) echo 'checked';?> /> Nổi bật</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="loai" value="0" <?php if($data_detail->loai ==0) echo 'checked';?> /> khách hàng</label>

		<p class="tit-label"></p>
		<input type="submit" name="edit" value="Cập nhật" />
	</form>
</div>
<script src="view/du-an/du-an.js"></script>