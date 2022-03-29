<?php
	if(isset($_POST['add']))
	{
        if(!empty($_FILES['file']['name']))
		{
			$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/doi-tac/'.$pic);
		}
		else
		{
			$pic = NULL;
		}
		$fields = [	"ten", "hinh", "mota", "diachi", "dienthoai", "website" ];
		$post_form = [
			"ten" => $_POST['ten'],
        	"hinh" => $pic,
        	"mota" => $_POST['mota'],
        	"diachi" => $_POST['diachi'],
        	"dienthoai" => $_POST['dienthoai'],
        	"website" => $_POST['website']
		];
		$query->ThemMoi("doitac", $fields, $post_form);
		header("location:doi-tac");
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Đối tác <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên đối tác</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />
		
		<p class="tit-label">Hình ảnh</p>
		<input type="file" name="file" />

		<p class="tit-label">Địa chỉ</p>
		<input type="text" name="diachi" spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Điện thoại</p>
		<input type="text" name="dienthoai" spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Website</p>
		<input type="text" name="website" spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Mô tả</p>
		<textarea rows="5" spellcheck="false" name="mota"></textarea>

		<p class="tit-label"></p>
		<input type="submit" name="add" value="Thêm mới"/>
	</form>
</div>