<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$data_danhmuc = $query->DanhSach("danhmuc");
    $data_detail = $query->ChiTiet("bannerdanhmuc",[], ["id" => "="],["id" => $id]);

	if(isset($_POST['update']))
	{
		$bannerDM = new BannerDM();
		$bannerDM->CapNhat($query,$id,$data_detail);
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Banner danh mục <span>| cập nhật</span></h1>
		<div class="button"><button><a href="them-banner-danh-muc">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<select name="danhmuc">
			<?php 
			foreach ($data_danhmuc as $key => $value) {
				if($value->id == $data_detail->danhmuc)
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

		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" value="<?=$data_detail->ten;?>" />

		<p class="tit-label">Hình</p> 395 x 207
		<div class ="desktop" style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="desktop" class="desktop"   style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="desktop" name="file" accept="image/*" class="mb-2" multiple hidden />
        </label>

		<p class="tit-label"></p>
		<img src="../uploads/banner-danh-muc/<?php echo $data_detail->hinh;?>" height=50 />

		<p class="tit-label">Link</p>
		<input class="input-text" type="text" name="link" autocomplete="off" value="<?=$data_detail->link;?>" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Update" />
	</form>
</div>
<script src="view/banner-danh-muc/bannerDM.js"></script>