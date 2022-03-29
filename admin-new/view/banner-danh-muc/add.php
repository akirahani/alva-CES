<?php
	$data_danhmuc = $query->DanhSach("danhmuc");
	if(isset($_POST['update']))
	{
		if(!empty($_FILES['file']['name']))
		{
			$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/banner-danh-muc/'.$pic);
		}
		else
		{
			$pic = NULL;
		}
		
		$fields = ["ten", "link", "hinh", "danhmuc"];
		$post_form = [
			"ten" => $_POST['ten'],
			"link" => $_POST['link'],
			"hinh" => $pic,
			"danhmuc" => $_POST['danhmuc']
		];
		$query->ThemMoi("bannerdanhmuc", $fields, $post_form);
		#Xử lý banner
		$data_list = $query->DanhSach("bannerdanhmuc");
		$fields = ["bannerdanhmuc"];
        $condition = ["id"];
        $post_form = [
			"bannerdanhmuc" => json_encode($data_list),
            "id" => 1
        ];
        $query->CapNhat("company", $fields, $condition, $post_form);
		header("location:banner-danh-muc");
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Banner danh mục <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Danh mục</p>
		<select name="danhmuc">
			<?php 
			foreach ($data_danhmuc as $key => $value) {
				echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
			}
			?>
		</select>

		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" autocomplete="off" />

		<p class="tit-label">Hình</p>
		<input type="file" name="file"/> 395 x 207

		<p class="tit-label">Link</p>
		<input class="input-text" type="text" name="link" autocomplete="off" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Thêm mới" />
	</form>
</div>