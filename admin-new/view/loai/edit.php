<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_loai = $query->ChiTiet("loai", $fields, $operator, $condition);
	$data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
	if(isset($_POST['edit']))
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
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
        	"slug" => $_POST['slug'],
        	"danhmuc" => $str_danhmuc,
            "id" => $id
        ];
        $query->CapNhat("loai", $fields, $condition, $post_form);
        header("location:loai");
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Loại <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_loai->ten?>" />

		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_loai->slug?>" />

		<p class="tit-label">Danh mục</p>
		<p class="tit-label">Danh mục</p>
		<?php
		$arr_danhmuc = explode(",", $data_loai->danhmuc);
		foreach ($data_danhmuc as $key => $value) 
		{
			if(in_array($value->id, $arr_danhmuc))
			{
				echo '<label><input type="checkbox" name="danhmuc[]" value="'.$value->id.'" checked /> '.$value->ten.'</label><br>';
			}
			else
			{
				echo '<label><input type="checkbox" name="danhmuc[]" value="'.$value->id.'" /> '.$value->ten.'</label><br>';
			}
		}
		?>

		<p class="tit-label"></p>
		<input type="submit" name="edit" class="submit" value="Cập nhật"/>
	</form>
</div>