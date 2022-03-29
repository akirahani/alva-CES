<?php
	if(isset($_POST['update']))
	{
		if(!empty($_FILES['file']['name']))
		{
			$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/menu/'.$pic);
		}
		else
		{
			$pic = NULL;
		}
		
		$fields = ["ten", "hinh", "slug"];
		$post_form = [
			"ten" => $_POST['ten'],
			"hinh" => $pic,
			"slug" => $_POST['link']
		];
		$query->ThemMoi("menu", $fields, $post_form);
		header("location:menu");
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Menu <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" autocomplete="off" />

		<p class="tit-label">Hình</p>
		<input type="file" name="file"/> 500 x 282

		<p class="tit-label">Link</p>
		<input class="input-text" type="text" name="link" autocomplete="off" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Thêm mới" />
	</form>
</div>