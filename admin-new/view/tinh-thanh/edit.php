<?php
	$data_vungmien = $query->DanhSach("vungmien", [], [], [], [], [], []);
    isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    #Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("tinhthanh", $fields, $operator, $condition);
	if(isset($_POST['edit']))
	{
        $fields = ["ten", "vungmien"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
			"vungmien" => $_POST['vungmien'],
            "id" => $id
        ];
        $query->CapNhat("tinhthanh", $fields, $condition, $post_form);
        header("location:tinh-thanh");
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Tỉnh thành <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />

		<p class="tit-label">Vùng miền</p>
		<select name="vungmien">
			<option value="0">Chọn</option>
			<?php
			foreach ($data_vungmien as $key => $value) 
			{
				if($value->id == $data_detail->vungmien)
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

		<p class="tit-label"></p>
		<input type="submit" name="edit" value="Cập nhật" />
	</form>
</div>