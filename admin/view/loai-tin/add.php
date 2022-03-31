<?php
	if(isset($_POST['add']))
	{
        $fields = [	"ten", "slug" ];
		$post_form = [
			"ten" => $_POST['ten'],
        	"slug" => $_POST['slug']
		];
		$query->ThemMoi("loaitin", $fields, $post_form);

        // Xử lý save
        $data_loaitin = $query->DanhSach("loaitin", [], [], [], [], [], []);
        $arr_loaitin = [];
        foreach ($data_loaitin as $key => $value) 
        {
        	$arr_loaitin[$value->slug] = [$value->id, $value->ten];
        }
        $fields = [	"loaitin" ];
        $condition = ["id"];
		$post_form = [
			"id" => 1,
			"loaitin" => json_encode($arr_loaitin)
		];
        $query->CapNhat("company", $fields, $condition, $post_form);
        header("location:list");
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Loại tin <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label"></p>
		<input type="submit" name="add" value="Thêm mới" />
	</form>
</div>