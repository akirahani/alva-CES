<?php
	isset($_GET['id']) ? $id=(int) $_GET['id'] : $id=0;
	// Kiểm tra đơn đã được người khác nhận chưa
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_donhang = $query->ChiTiet("donhang", $fields, $operator, $condition);

	if($data_donhang->trangthai == 1)
	{
		// Đơn chưa có ai nhận
	}
	else
	{
		// Đơn đã có người nhận
		header("location:don-moi");
	}
	if(isset($_POST['nhan']))
	{
		$fields = ["tenkhach", "dienthoaikhach", "trangthai", "nguoigoi", "lydohuy", "ghichu"];
        $condition = ["id"];
        $post_form = [
            'tenkhach' => $_POST['tenkhach'],
			'dienthoaikhach' => $_POST['dienthoaikhach'],
			'trangthai' => 2,
			'nguoigoi' => $__ID__,
			'lydohuy' => NULL,
			'ghichu' => $data_donhang->ghichu,
            "id" => $id
        ];
        $query->CapNhat("donhang", $fields, $condition, $post_form);#2 - đơn hàng calling
		header("location:don-dang-goi");
	}
	if(isset($_POST['huy']))
	{
		header("location:don-moi");
	}
?>
<div class="blog">
	<div class="bread">
		<h1>Đơn hàng <span>| nhận đơn hàng</span></h1>
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
			<p class="tit-label"><input type="hidden" name="lydohuy" value="0" /><input type="hidden" name="ghichu" value="" /></p>
			<input type="submit" class="submit thanh-cong" name="nhan" value="Nhận gọi">
			<input type="submit" class="submit that-bai" name="huy" value="Không nhận">
			<div class="clear"></div>
		</div>
	</form>
</div>