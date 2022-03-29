<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_thongso = $query->ChiTiet("thongso", $fields, $operator, $condition);

	$data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
	$data_loai = $query->DanhSach("loai", [], [], [], [], [], []);

	if(isset($_POST['edit']))
	{
        $fields = ["ten", "danhmuc", "loai", "thutu"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
        	"danhmuc" => $_POST['danhmuc'],
        	"loai" => $_POST['loai'],
        	"thutu" => $_POST['thutu'],
            "id" => $id
        ];
        $query->CapNhat("thongso", $fields, $condition, $post_form);
        header("location:thong-so");
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Thông số <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_thongso->ten?>" />

		<p class="tit-label">Danh mục</p>
		<select name="danhmuc">
			<option value="0">Chọn</option>
			<?php 
			foreach ($data_danhmuc as $key => $value) 
			{
				if($value->id == $data_thongso->danhmuc)
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
		<br>

		<p class="tit-label">Loại</p>
		<select name="loai">
			<option value="0">Chọn</option>
			<?php 
			foreach ($data_loai as $key => $value) 
			{
				if($value->id == $data_thongso->loai)
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
		<br>

		<p class="tit-label">Thứ tự</p>
		<input type="number" name="thutu" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_thongso->thutu?>" />

		<p class="tit-label"></p>
		<input type="submit" name="edit" class="submit" value="Cập nhật"/>
	</form>
</div>
<script>
	$('select[name="danhmuc"]').change(function(){
		let danhmuc = $(this).val();
		$.ajax({
			method: "POST",
			data: {danhmuc:danhmuc, loai:loai},
			url: "view/thong-so/loai-danh-muc.php",
			success: function(data)
			{
				$('select[name="loai"]').html(data);
			}
		});
	});
</script>