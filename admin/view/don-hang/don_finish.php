<?php
	isset($_GET['id']) ? $id=(int) $_GET['id'] : $id=0;
	// Kiểm tra đơn đã được người khác nhận chưa
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_donhang = $query->ChiTiet("donhang", $fields, $operator, $condition);
	if(isset($_POST['giao']))
	{
		// Cập nhật trạng thái đơn hàng + set người nhận đơn gọi hàng
		$fields = ["tenkhach", "dienthoaikhach", "trangthai", "nguoigoi", "lydohuy", "ghichu"];
        $condition = ["id"];
        $post_form = [
            'tenkhach' => $_POST['tenkhach'],
			'dienthoaikhach' => $_POST['dienthoaikhach'],
			'trangthai' => 5,#5 - đơn giao thành công
			'nguoigoi' => $__ID__,
			'lydohuy' => NULL,
			'ghichu' => $_POST['ghichu'],
            "id" => $id
        ];
        $query->CapNhat("donhang", $fields, $condition, $post_form);#5 - đơn giao thành công
		header("location:don-dang-goi");
	}
	if(isset($_POST['huy']))
	{
		header("location:don-moi");
	}
?>
<div class="blog">
	<div class="bread">
		<h1>Đơn hàng <span>| giao thành công</span></h1>
		<div class="clear"></div>
	</div>
	<form method="post" class="form">
		<div class="nhom left">
			<p class="tit-label">Tên khách</p>
			<input type="text" name="tenkhach" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_donhang->tenkhach?>" />
		</div>

		<div class="nhom right">
			<p class="tit-label">Điện thoại khách hàng</p>
			<input type="text" name="dienthoaikhach" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_donhang->dienthoaikhach?>" />
		</div>
		<div class="clear"></div>

		<div class="nhom left">
			<p class="tit-label">Ghi chú đơn hàng</p>
			<textarea name="ghichu" rows="10" spellcheck="false"><?=$data_donhang->ghichu?></textarea>
		</div>
		<div class="clear"></div>

		<div class="nhom left">
			<p class="tit-label"><input type="hidden" name="lydohuy" value="<?=$data_donhang->lydohuy?>" /></p>
			<input type="submit" class="submit thanh-cong" name="giao" value="Đã giao">
			<div class="clear"></div>
		</div>
	</form>
	<div class="clear"></div>
</div>