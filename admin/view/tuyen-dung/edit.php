<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;

	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("tuyendung", $fields, $operator, $condition);

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
		// Xử lý file hồ sơ
        if(!empty($_FILES['file']['name']))
        {  
            $hinh=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['file']['name']);      
            move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/tuyen-dung/".$hinh);
            unlink('../uploads/tuyen-dung/'.$hinh_old);
            $hinh_save = $hinh;
        }
        else
        {
            $hinh_save = $hinh_old;
        }

        $fields = ["ten", "hinh", "mota", "noidung", "slug"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
        	"hinh" => $hinh_save,
        	"mota" => $_POST['mota'],
        	"noidung" => $_POST['noidung'],
        	"slug" => $_POST['slug'],
            "id" => $id
        ];
        $query->CapNhat("tuyendung", $fields, $condition, $post_form);
        header("location:list");
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Tuyển dụng <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
		
		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->slug?>" />

		<p class="tit-label">Hình ảnh</p> 500 x 500 px
		<div class ="desktop" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="desktop" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="desktop" name="file"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label> 
		<?php
		if($data_detail->hinh != NULL)
		{
			echo '<br><br><p><img src="../uploads/tuyen-dung/'.$data_detail->hinh.'" height="150" />';
		}
		?>
		
		<p class="tit-label">Mô tả</p>
		<textarea rows="5" spellcheck="false" name="mota" class="ckeditor"><?=$data_detail->mota?></textarea>

		<p class="tit-label">Nội dung</p>
		<textarea rows="5" spellcheck="false" name="noidung" class="ckeditor"><?=$data_detail->noidung?></textarea>

		<p class="tit-label"></p>
		<input type="submit" name="edit" value="Cập nhật"/>
	</form>
</div>
<script type="text/javascript" src="view/tuyen-dung/tuyendung.js"></script>