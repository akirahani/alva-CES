<?php
	$data = $query->DanhSach("danhmuc", [], [], [], [], [], []);

	if(isset($_POST['insert']))
	{
		if(!empty($_POST['danhmuc']))
		{
			$str = implode(",", $_POST['danhmuc']);
		}
		else
		{
			$str = NULL;
		}
        $fields = ["ten", "slug", "danhmuc"];
		$post_form = [
			"ten" => $_POST['ten'],
        	"slug" => $_POST['slug'],
        	"danhmuc" => $str
		];
		$query->ThemMoi("loai", $fields, $post_form);
        header("location:list");
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
		foreach ($data as $key => $val) 
		{
			echo '<label><input type="checkbox" name="danhmuc[]" val="'.$val->id.'" /> '.$val->ten.'</label><br>';
		}
		?>

		<p class="tit-label"></p>
		<input type="submit" name="insert" class="submit" val="Thêm mới"/>
	</form>
</div>