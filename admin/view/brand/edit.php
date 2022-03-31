<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("brand", $fields, $operator, $condition);

	if(isset($_POST['update']))
	{
		$fields = ["ten"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
            "id" => $id
        ];
        $query->CapNhat("brand", $fields, $condition, $post_form);
		header("location:chuyen-de");
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Chuyên đề <span>| cập nhật</span></h1>
		<div class="button"><button><a href="them-chuyen-de">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" placeholder="Tên" value="<?php echo $data_detail->ten;?>" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Update" />
	</form>
</div>