<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    $data_detail = $query->ChiTiet("banner",[],["id" => "="], ["id" => $id]);
	if(isset($_POST['update']))
	{
		$banner = New Banner();
		$banner->CapNhat($query,$id,$data_detail);
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Banner <span>| cập nhật</span></h1>
		<!-- <div class="button"><button><a href="them-loai">Thêm mới</a></button></div> -->
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" value="<?=$data_detail->ten;?>" />
		
		<p class="tit-label">Mobile</p> 800 x 610
        <div class ="mobile" style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="mobile" class="mobile-img" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="mobile" name="mobile" accept="image/*" class="mb-2" multiple hidden/>
        </label>

		<p class="tit-label"></p>
		<img src="../uploads/banner/<?=$data_detail->mobile;?>" height=50 />

		<p class="tit-label">Desktop</p> 1200 x 558
		<div class ="desktop" style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="desktop" class="desktop"   style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="desktop" name="file" accept="image/*" class="mb-2" multiple hidden />
        </label>

		<p class="tit-label"></p>
		<img src="../uploads/banner/<?=$data_detail->desktop;?>" height=50 />

		<p class="tit-label">Link</p>
		<input class="input-text" type="text" name="link" autocomplete="off" value="<?=$data_detail->link;?>" />

		<p class="tit-label">Thứ tự</p>
		<input class="input-text" type="number" min="1" name="thutu" autocomplete="off" value="<?=$data_detail->thutu;?>" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Update" />
	</form>
</div>
<script type="text/javascript" src="view/banner/add.js"></script>