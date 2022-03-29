<?php
	isset($_GET['id']) ? $id=$_GET['id'] : $id=0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $detail = $query->ChiTiet("landing", $fields, $operator, $condition);
	
	if(isset($_POST['update']))
	{
		if($_POST['ten'] != '' && $_POST['link'] != ''  && (strtotime($_POST['ngaydau']) < strtotime($_POST['ngayhet'])))
		{
			$fields = ["ten", "link", "ngaydau", "ngayhet"];
	        $condition = ["id"];
	        $post_form = [
				"ten" => $_POST['ten'],
				"link" => $_POST['link'],
				"ngaydau" => $_POST['ngaydau'],
				"ngayhet" => $_POST['ngayhet'],
	            "id" => $id
	        ];
	        $query->CapNhat("landing", $fields, $condition, $post_form);

			// Xử lý save
	        $landing = $query->DanhSach("landing", [], [], [], [], [], []);
	        $arr_landing = [];
	        foreach ($landing as $key => $value) {
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
		     	 window.location.href = 'landing/edit?id=$id';
		      	alert('Cần xem lại thông tin về thời gian');
			</script>";
		}
	}
?>

<div class="blog small">
	<div class="bread">
		<h1>Landing <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>
	<form method="post" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" required="" value="<?=$detail->ten?>" />
		
		<p class="tit-label">Link</p>
		<input type="text" name="link" spellcheck="false" autocomplete="off" class="input-text" required="" value="<?=$detail->link?>"/>
		
		<p class="tit-label">Ngày bắt đầu</p>
		<input type="text" name="ngaydau" spellcheck="false" autocomplete="off" class="input-text ngaydau" value="<?=$detail->ngaydau?>"/>
		
		<p class="tit-label">Ngày kết thúc</p>
		<input type="text" name="ngayhet" spellcheck="false" autocomplete="off" class="input-text ngayhet" value="<?=$detail->ngayhet?>"/>
		
		<p class="tit-label"></p>
		<input type="submit" name="update" value="Cập nhật" />
	</form>
</div>