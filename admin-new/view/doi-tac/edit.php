<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("doitac", $fields, $operator, $condition);

	if($data_detail->hinh != NULL)
	{
		$hinh_old = $data_detail->hinh;
	}
	else
	{
		$hinh_old = NULL;
	}
	if(isset($_POST['edit']))
	{
        if(!empty($_FILES['file']['name']))
        {  
            $hinh=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['file']['name']);      
            move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/doi-tac/".$hinh);
            unlink('../uploads/doi-tac/'.$hinh_old);
            $hinh_save = $hinh;
        }
        else
        {
            $hinh_save = $hinh_old;
        }
        $fields = [	"ten", "hinh", "mota", "diachi", "dienthoai", "website" ];
        $condition = ["id"];
        $post_form = [
        	"id" => $id,
        	"ten" => $_POST['ten'],
        	"hinh" => $hinh_save,
        	"mota" => $_POST['mota'],
        	"diachi" => $_POST['diachi'],
        	"dienthoai" => $_POST['dienthoai'],
        	"website" => $_POST['website']
        ];
        $query->CapNhat("doitac", $fields, $condition, $post_form);
        header("location:doi-tac");
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Đối tác <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên đối tác</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
		
		<p class="tit-label">Hình ảnh</p>
		<input type="file" name="file" />
		<?php
		if($data_detail->hinh != NULL)
		{
			echo '<br><br><p><img src="../uploads/doi-tac/'.$data_detail->hinh.'" height="150" />';
		}
		?>
		
		<p class="tit-label">Địa chỉ</p>
		<input type="text" name="diachi" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->diachi?>" />

		<p class="tit-label">Điện thoại</p>
		<input type="text" name="dienthoai" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->dienthoai?>" />

		<p class="tit-label">Website</p>
		<input type="text" name="website" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->website?>" />

		<p class="tit-label">Mô tả</p>
		<textarea rows="5" spellcheck="false" name="mota"><?=$data_detail->mota?></textarea>

		<p class="tit-label"></p>
		<input type="submit" name="edit" value="Cập nhật" />
	</form>
</div>