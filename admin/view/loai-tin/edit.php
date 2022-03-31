<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("loaitin", $fields, $operator, $condition);

	if(isset($_POST['edit']))
	{
		$fields = [	"ten", "slug" ];
        $condition = ["id"];
        $post_form = [
        	"id" => $id,
        	"ten" => $_POST['ten'],
        	"slug" => $_POST['slug']
        ];
        $query->CapNhat("loaitin", $fields, $condition, $post_form);

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
		<h1>Loại tin <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />

		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->slug?>" />

		<p class="tit-label"></p>
		<input type="submit" name="edit" value="Cập nhật" />
	</form>
</div>