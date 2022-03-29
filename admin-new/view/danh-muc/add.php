<?php
	if(isset($_POST['add']))
	{
        $fields = ["ten", "slug"];
		$post_form = [
			"ten" => $_POST['ten'],
        	"slug" => $_POST['slug']
		];
		$query->ThemMoi("danhmuc", $fields, $post_form);
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
        header("location:danh-muc");
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Danh mục <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label"></p>
		<input type="submit" name="add" class="submit" value="Thêm mới"/>
	</form>
</div>