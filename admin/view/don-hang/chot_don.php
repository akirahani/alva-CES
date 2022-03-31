<?php
	//Khi nào chốt đơn
	//Đơn hàng chỉ cốt khi đơn hàng có người gọi và trạng thái đơn hàng là 2 - đơn hàng đang gọi
	//chuyển trạng thái sang 3 - chuẩn bị giao hàng
	//chuyển trạng thái sang 4 - đơn hàng hủy -> và nêu lý do hủy đơn hàng
	//chuyển trạng thái sang 5 - đơn hàng giao thành công
?>
<?php
	$fields = [];
    $sorts = [];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data_donhuy = $query->DanhSach("lydohuy", $fields, $condition, $sorts, $limits, $forms, $search);

	isset($_GET['id']) ? $id=(int) $_GET['id'] : $id=0;
	
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_donhang = $query->ChiTiet("donhang", $fields, $operator, $condition);

	// Kiểm tra đơn hàng có người gọi + trạng thái đơn hàng là 2 - đơn hàng đang gọi
	if($data_donhang->trangthai == 2 || $data_donhang->nguoigoi!=0)
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
		// Cập nhật trạng thái đơn hàng + set người nhận đơn gọi hàng
		if($_POST['lydohuy']!=0)
		{
			//$donhang->CapNhat($_POST, $id, 4, $_SESSION['alvaid']); //4 - hủy đơn hàng
			$fields = ["tenkhach", "dienthoaikhach", "trangthai", "nguoigoi", "lydohuy", "ghichu"];
	        $condition = ["id"];
	        $post_form = [
	            'tenkhach' => $_POST['tenkhach'],
				'dienthoaikhach' => $_POST['dienthoaikhach'],
				'trangthai' => 4,#4 - hủy đơn hàng
				'nguoigoi' => $__ID__,
				'lydohuy' => $_POST["lydohuy"],
				'ghichu' => $_POST['ghichu'],
	            "id" => $id
	        ];
	        $query->CapNhat("donhang", $fields, $condition, $post_form);#4 - hủy đơn hàng
			header("location:don-huy");
		}
		if($_POST['lydohuy']==0)
		{
			$fields = ["tenkhach", "dienthoaikhach", "trangthai", "nguoigoi", "lydohuy", "ghichu"];
	        $condition = ["id"];
	        $post_form = [
	            'tenkhach' => $_POST['tenkhach'],
				'dienthoaikhach' => $_POST['dienthoaikhach'],
				'trangthai' => 3,#3 - chuẩn bị giao hàng
				'nguoigoi' => $__ID__,
				'lydohuy' => NULL,
				'ghichu' => $_POST['ghichu'],
	            "id" => $id
	        ];
	        $query->CapNhat("donhang", $fields, $condition, $post_form);#3 - chuẩn bị giao hàng
			header("location:don-chuan-bi-giao");
		}
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
			<input required="" type="text" name="tenkhach" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_donhang->tenkhach?>" />
		</div>

		<div class="nhom right">
			<p class="tit-label">Điện thoại khách hàng</p>
			<input required="" type="text" name="dienthoaikhach" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_donhang->dienthoaikhach?>" />
		</div>
		<div class="clear"></div>

		<div class="nhom left">
			<p class="tit-label">Ghi chú đơn hàng</p>
			<textarea name="ghichu" rows="10" spellcheck="false"><?=$data_donhang->ghichu?></textarea>
		</div>
		<div class="clear"></div>

		<div class="nhom left">
			<p class="tit-label">Chọn</p>
			<label><input required="" type="radio" name="tinhtrang" value="1" checked="" class="luachondon" /> Xuất đơn hàng</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label><input required="" type="radio" name="tinhtrang" value="0" class="luachondon"/> Hủy đơn hàng</label>
			<div class="full ly-do-huy" style="display: none;">
				<p class="tit-label">Chọn lý do hủy đơn hàng</p>
				<select name="lydohuy" required>
					<option value="0">Chọn</option>
					<?php
					foreach ($data_donhuy as $key => $value) {
						echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
					}
					?>
				</select>
			</div>
		</div>
		<div class="clear"></div>

		<div class="nhom left">
			<p class="tit-label"></p>
			<input type="submit" class="submit thanh-cong" name="nhan" value="Cập nhật đơn">
			<div class="clear"></div>
		</div>
	</form>
	<div class="clear"></div>
</div>
<script>
	$(document).ready(function(){
		$(".luachondon").change(function(){
			let luachondon = $(this).val();
			if(luachondon == 1)
			{
				$(".ly-do-huy").slideUp();
			}
			else
			{
				$(".ly-do-huy").slideDown();
			}
		});
	});
</script>