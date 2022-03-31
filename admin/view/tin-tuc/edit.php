<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("tintuc", $fields, $operator, $condition);
    $data_loaitin = $query->DanhSach("loaitin", [], [], [], [], [], []);
	// Mảng tag
	if($data_detail->tag != NULL)
	{
		$arr_tag = explode(",", $data_detail->tag);
	}
	else
	{
		$arr_tag = [];
	}
	// Vuông
	if($data_detail->vuong != NULL)
	{
		$vuong_old = $data_detail->vuong;
	}
	else
	{
		$vuong_old = NULL;
	}
	// Dài
	if($data_detail->dai != NULL)
	{
		$dai_old = $data_detail->dai;
	}
	else
	{
		$dai_old = NULL;
	}
	if(isset($_POST['edit']))
	{
		// Hình vuông
        if(!empty($_FILES['vuong']['name']))
        {  
            $vuong=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['vuong']['name']);      
            move_uploaded_file($_FILES['vuong']['tmp_name'], "../uploads/tin-tuc/".$vuong);
            unlink('../uploads/tin-tuc/'.$vuong_old);
            $vuong_save = $vuong;
        }
        else
        {
            $vuong_save = $vuong_old;
        }
        // Hình dài
        if(!empty($_FILES['dai']['name']))
        {  
            $dai=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['dai']['name']);      
            move_uploaded_file($_FILES['dai']['tmp_name'], "../uploads/tin-tuc/".$dai);
            unlink('../uploads/tin-tuc/'.$dai_old);
            $dai_save = $dai;
        }
        else
        {
            $dai_save = $dai_old;
        }
        // Tag
        if(!empty($_POST['tag']))
        {
        	$tag_string = implode(",", $_POST['tag']);
        }
        else
        {
        	$tag_string = NULL;
        }
        $fields = [	"ten", "vuong", "dai", "mota", "noidung", "tag", "noibat", "slug", "loai" ];
        $condition = ["id"];
        $post_form = [
        	"id" => $id,
        	"ten" => $_POST['ten'],
        	"vuong" => $vuong_save,
        	"dai" => $dai_save,
        	"mota" => $_POST['mota'],
        	"noidung" => $_POST['noidung'],
        	"tag" => $tag_string,
        	"noibat" => $_POST['noibat'],
        	"slug" => $_POST['slug'],
        	"loai" => $_POST['loai']
        ];
        $query->CapNhat("tintuc", $fields, $condition, $post_form);
        #Xử lý tin tức
		$data_list = $query->DanhSach("tintuc", ["ten", "vuong", "mota", "ngay", "slug"], [], ["id" => "DESC"], [3], []);
		$fields = ["tintuc"];
        $condition = ["id"];
        $post_form = [
			"tintuc" => json_encode($data_list),
            "id" => 1
        ];
        $query->CapNhat("company", $fields, $condition, $post_form);
        header("location:list");
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Tin tức <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
		
		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->slug?>" />

		<p class="tit-label">Loại tin</p>
		<select name="loai">
			<option value="0">Chọn</option>
			<?php
			foreach ($data_loaitin as $key => $value) {
				if($value->id == $data_detail->loai)
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

		<p class="tit-label">Hình vuông</p>
		<input type="file" name="vuong" /> 500 x 359
		<?php
		if($data_detail->vuong != NULL)
		{
			echo '<br><br><p><img src="../uploads/tin-tuc/'.$data_detail->vuong.'" height="150" />';
		}
		?>
		
		<p class="tit-label">Hình dài</p>
		<input type="file" name="dai" /> 600 x 214px
		<?php
		if($data_detail->dai != NULL)
		{
			echo '<br><br><p><img src="../uploads/tin-tuc/'.$data_detail->dai.'" height="150" />';
		}
		?>

		<p class="tit-label">Mô tả</p>
		<textarea rows="5" spellcheck="false" name="mota" class="ckeditor"><?=$data_detail->mota?></textarea>

		<p class="tit-label">Nội dung</p>
		<textarea rows="5" spellcheck="false" name="noidung" class="ckeditor"><?=$data_detail->noidung?></textarea>

		<p class="tit-label">Tag</p>
		<?php
		foreach ($data_loaitin as $key => $value) {
			if(in_array($value->id, $arr_tag))
			{
				echo '<label><input type="checkbox" name="tag[]" value="'.$value->id.'" checked /> '.$value->ten.'</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			else
			{
				echo '<label><input type="checkbox" name="tag[]" value="'.$value->id.'" /> '.$value->ten.'</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
		}
		?>

		<p class="tit-label">Nổi bật</p>
		<label><input type="radio" name="noibat" value="1" <?php if($data_detail->noibat == 1) echo "checked";?> /> Có</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="noibat" value="0" <?php if($data_detail->noibat == 0) echo "checked";?> /> Không</label>

		<p class="tit-label"></p>
		<input type="submit" name="edit" value="Cập nhật" />
	</form>
</div>