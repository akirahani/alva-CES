<?php
	$data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);

	if(isset($_POST['add']))
	{
		if(!empty($_POST['danhmuc']))
		{
			$str_danhmuc = implode(",", $_POST['danhmuc']);
		}
		else
		{
			$str_danhmuc = NULL;
		}
        $fields = ["ten", "slug", "danhmuc"];
		$post_form = [
			"ten" => $_POST['ten'],
        	"slug" => $_POST['slug'],
        	"danhmuc" => $str_danhmuc
		];
		$query->ThemMoi("loai", $fields, $post_form);
        header("location:loai");
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Loại <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Danh mục</p>
		<?php
		foreach ($data_danhmuc as $key => $value) 
		{
			echo '<label><input type="checkbox" name="danhmuc[]" value="'.$value->id.'" /> '.$value->ten.'</label><br>';
		}
		?>

		<p class="tit-label"></p>
		<input type="submit" name="add" class="submit" value="Thêm mới"/>
	</form>
</div>