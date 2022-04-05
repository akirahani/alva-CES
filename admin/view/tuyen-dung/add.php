<?php
	if(isset($_POST['add']))
	{
		if(!empty($_FILES['file']['tmp_name']))
        {
            $hinh=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['file']['name']); 
            move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/tuyen-dung/".$hinh);
        }
        else
        {
            $hinh = NULL;
        }
        $fields = ["ten", "hinh", "mota", "noidung", "ngay", "slug"];
		$post_form = [
			"ten" => $_POST['ten'],
        	"hinh" => $hinh,
        	"mota" => $_POST['mota'],
        	"noidung" => $_POST['noidung'],
        	"ngay" => date("Y-m-d"),
        	"slug" => $_POST['slug']
		];
		$query->ThemMoi("tuyendung", $fields, $post_form);
        header("location:list");
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Tuyển dụng <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />
		
		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Hình ảnh</p>500 x 500 px
		<div class ="desktop" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="desktop" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="desktop" name="file"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label> 
		<p class="tit-label">Mô tả</p>
		<textarea rows="5" spellcheck="false" name="mota" class="ckeditor"></textarea>

		<p class="tit-label">Nội dung</p>
		<textarea rows="5" spellcheck="false" name="noidung" class="ckeditor"></textarea>

		<p class="tit-label"></p>
		<input type="submit" name="add" value="Thêm mới" />
	</form>
</div>
<script type="text/javascript" src="view/tuyen-dung/tuyendung.js"></script>