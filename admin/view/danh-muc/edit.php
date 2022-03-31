<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("danhmuc", $fields, $operator, $condition);
	if(isset($_POST['update']))
	{
        $fields = ["ten", "slug"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
        	"slug" => $_POST['slug'],
            "id" => $id
        ];
        $query->CapNhat("danhmuc", $fields, $condition, $post_form);
        // Xử lý danh mục
        $data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
        $arr_danhmuc = [];
        foreach ($data_danhmuc as $key => $value) 
        {
        	$arr_danhmuc[$value->slug] = [$value->id, $value->ten, $value->slug];
        }
        $fields = ["danhmuc"];
        $condition = ["id"];
        $post_form = [
			"danhmuc" => json_encode($arr_danhmuc),
            "id" => 1
        ];
        $query->CapNhat("company", $fields, $condition, $post_form);
        header("location:list");
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Danh mục <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />

		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->slug?>" />

		<p class="tit-label"></p>
		<input type="submit" name="update" class="submit" value="Cập nhật">
	</form>
</div>