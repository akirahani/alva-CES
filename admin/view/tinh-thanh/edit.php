<?php
	$option_vungmien = $query->DanhSach("vungmien", [], [], [], [], [], []);
    isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    $data = $query->ChiTiet("tinhthanh", [],["id" => "="], ["id" => $id]);
    $tinhthanh = new TinhThanh();
    $tinhthanh->CapNhat($query,$id);
?>
<div class="blog small">

	<div class="bread">
		<h1>Tỉnh thành <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data->ten?>" />

		<p class="tit-label">Vùng miền</p>
		<select name="vungmien">
			<option value="0">Chọn</option>
			<?php
			foreach ($option_vungmien as $key => $value) 
			{
				if($value->id == $data->vungmien)
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
		<input type="submit" name="update" value="Cập nhật" />
	</form>
</div>