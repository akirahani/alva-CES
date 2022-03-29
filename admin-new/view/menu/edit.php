<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("menu", $fields, $operator, $condition);

	if(isset($_POST['update']))
	{
		if(!empty($_FILES['file']['name']))
		{
			$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/menu/'.$pic);
			unlink('../uploads/menu/'.$data_detail->hinh);
		}
		else
		{
			$pic = $data_detail->hinh;
		}

		$fields = ["ten", "hinh", "slug"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
			"hinh" => $pic,
			"slug" => $_POST['link'],
            "id" => $id
        ];
        $query->CapNhat("menu", $fields, $condition, $post_form);
		header("location:menu");
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Menu <span>| cập nhật</span></h1>
		<div class="button"><button><a href="them-menu">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" value="<?=$data_detail->ten;?>" />
		
		<p class="tit-label">Hình</p>
		<input type="file" name="file"/> 500 x 282

		<p class="tit-label"></p>
		<img src="../uploads/menu/<?php echo $data_detail->hinh;?>" height=50 />

		<p class="tit-label">Link</p>
		<input class="input-text" type="text" name="link" autocomplete="off" value="<?=$data_detail->slug;?>" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Cập nhật" />
	</form>
</div>