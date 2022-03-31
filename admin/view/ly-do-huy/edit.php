<?php
	isset($_GET['id']) ? $id=(int)$_GET['id'] : $id=0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_lydo = $query->ChiTiet("lydohuy", $fields, $operator, $condition);
	if(isset($_POST['edit']))
	{
		$fields = ["ten"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
            "id" => $id
        ];
        $query->CapNhat("lydohuy", $fields, $condition, $post_form);
		header("location:list");
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Lý do hủy đơn <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>
	
	<form method="post" class="form">
		<p class="tit-label">Tên</p>
		<input required="" type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_lydo->ten?>" />

		<p class="tit-label"></p>
		<input type="submit" class="submit thanh-cong" name="edit" value="Cập nhật">

	</form>
	<div class="clear"></div>
</div>