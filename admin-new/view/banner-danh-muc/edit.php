<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$data_danhmuc = $query->DanhSach("danhmuc");
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("bannerdanhmuc", $fields, $operator, $condition);

	if(isset($_POST['update']))
	{
		if(!empty($_FILES['file']['name']))
		{
			$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/banner-danh-muc/'.$pic);
			unlink('../uploads/banner-danh-muc/'.$data_detail->hinh);
		}
		else
		{
			$pic = $data_detail->hinh;
		}

		$fields = ["ten", "link", "hinh", "danhmuc"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
			"link" => $_POST['link'],
			"hinh" => $pic,
			"danhmuc" => $_POST['danhmuc'],
            "id" => $id
        ];
        $query->CapNhat("bannerdanhmuc", $fields, $condition, $post_form);
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

		<p class="tit-label">Hình</p>
		<input type="file" name="file"/> 395 x 207

		<p class="tit-label"></p>
		<img src="../uploads/banner-danh-muc/<?php echo $data_detail->hinh;?>" height=50 />

		<p class="tit-label">Link</p>
		<input class="input-text" type="text" name="link" autocomplete="off" value="<?=$data_detail->link;?>" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Update" />
	</form>
</div>