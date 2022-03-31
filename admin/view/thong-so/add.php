<?php
	$data_loai = $query->DanhSach("loai", [], [], [], [], [], []);
	$data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);

	if(isset($_POST['add']))
	{
        $fields = ["ten", "danhmuc", "loai", "thutu"];
		$post_form = [
			"ten" => $_POST['ten'],
        	"danhmuc" => $_POST['danhmuc'],
        	"loai" => $_POST['loai'],
        	"thutu" => $_POST['thutu']
		];
		$query->ThemMoi("thongso", $fields, $post_form);
        header("location:list");
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Thông số <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Danh mục</p>
		<select name="danhmuc">
			<option value="0">Chọn</option>
			<?php 
			foreach ($data_danhmuc as $key => $val) {
				echo '<option value="'.$val->id.'">'.$val->ten.'</option>';
			}
			?>
		</select>
		<br>

		<p class="tit-label">Loại</p>
		<select name="loai">
			<option value="0">Chọn</option>
			<?php 
			foreach ($data_loai as $key => $value) {
				echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
			}
			?>
		</select>
		<br>

		<p class="tit-label">Thứ tự</p>
		<input type="number" name="thutu" spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label"></p>
		<input type="submit" name="add" class="submit" value="Thêm mới">
	</form>
</div>
<script>
	$('select[name="danhmuc"]').change(function(){
		let danhmuc = $(this).val();
		$.ajax({
			method: "POST",
			data: {danhmuc:danhmuc},
			url: "view/thong-so/loai-danh-muc.php",
			success: function(data)
			{
				$('select[name="loai"]').html(data);
			}
		});
	});
</script>