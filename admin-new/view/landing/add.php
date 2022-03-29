<?php
	if(isset($_POST['insert']))
	{
		if($_POST['ten'] != '' && $_POST['link'] != '' && (strtotime($_POST['ngaydau']) < strtotime($_POST['ngayhet'])))
		{
			$fields = [	"ten", "link", "ngaydau", "ngayhet" ];
			$post_form = [
				"ten" => $_POST['ten'],
				"link" => $_POST['link'],
				"ngaydau" => $_POST['ngaydau'],
				"ngayhet" => $_POST['ngayhet']
			];
			$query->ThemMoi("landing", $fields, $post_form);
			// Xử lý save
	        $data_landing = $query->DanhSach("landing", [], [], [], [], [], []);
	        $arr_landing = [];
	        foreach ($data_landing as $key => $value) {
	        	$arr_landing[$value->link] = [$value->id, $value->ten];
	        }
	        $fields = ["landing"];
	        $condition = ["id"];
	        $post_form = [
				"landing" => json_encode($arr_landing),
	            "id" => 1
	        ];
	        $query->CapNhat("company", $fields, $condition, $post_form);
			header("location:list");
		}
		else
		{	
			echo "<script>
		     	 window.location.href = 'landing/add';
		      	alert('Cần xem lại thông tin về thời gian');
			</script>";
		}
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Landing <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>
	<form method="post" class="form">
		<div class="nhom">
			<p class="tit-label">Tên</p>
			<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" required />
		</div>
		
		<div class="nhom">
			<p class="tit-label">Link</p>
			<input type="text" name="link" spellcheck="false" autocomplete="off" class="input-text" required />
		</div>

		<div class="nhom">
			<p class="tit-label">Ngày bắt đầu</p>
			<input type="text" name="ngaydau" spellcheck="false" autocomplete="off" class="input-text chon-ngay" required />
		</div>

		<div class="nhom">
			<p class="tit-label">Ngày kết thúc</p>
			<input type="text" name="ngayhet" spellcheck="false" autocomplete="off" class="input-text chon-ngay" required />
		</div>

		<div class="nhom">
			<p class="tit-label"></p>
			<input type="submit" name="insert" value="Thêm mới"/>
		</div>
	</form>
</div>