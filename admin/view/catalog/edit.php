<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    $data_detail = $query->ChiTiet("catalog",[],["id" => "="],["id" => $id]);

	if(isset($_POST['edit']))
	{
       $catalog = new Catalog();
       $catalog->CapNhat($query,$id,$data_detail);
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Catalog <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
		
		<p class="tit-label">Hình ảnh</p> 800 x 521 px
		<div class ="file" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="file" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="file" name="file"   accept="image/*"  class="mb-2" multiple hidden/>
        </label>
		<?php
		if($data_detail->hinh != NULL)
		{
			echo '<br><br><p><img src="../uploads/catalog/'.$data_detail->hinh.'" height="150" />';
		}
		?>
		<p class="tit-label"></p>
		<input type="submit" name="edit" value="Cập nhật" />
	</form>
</div>
<script src="view/catalog/catalog.js"></script>