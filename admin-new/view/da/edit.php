<?php
    isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    isset($_GET ['page']) ? $page_get = intval($_GET ['page']) : $page_get = 1;

    #Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_da_chitiet = $query->ChiTiet("da", $fields, $operator, $condition);

    $data_thongso = $query->DanhSach("thongso", [], [], [], [], [], []);
    
    #Xử lý đá danh mục
    $arr_dadanhmuc = [];
    $data_dadanhmuc = $query->DanhSach("dadanhmuc", [], ["da" => "="], [], [], ["da"=>$id]);
    $_SESSION['danhmuc'] = [];
    foreach ($data_dadanhmuc as $key => $value) 
    {
        array_push($arr_dadanhmuc, $value->danhmuc);
        if(!array_key_exists($value->danhmuc, $_SESSION['danhmuc']))
        {
            $_SESSION['danhmuc'][$value->danhmuc] = $value->danhmuc;
        }
    }

    #Đá thông số
    $arr_dathongso = [];
    $data_dathongso = $query->DanhSach("dathongso", [], ["da" => "="], [], [], ["da" => $id], []);
    foreach ($data_dathongso as $key => $value) {
    	array_push($arr_dathongso, $value->thongso);
    }
 
    #Xử lý danh mục
    $data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
    $arr_danhmuc = [];
    foreach ($data_danhmuc as $key => $value) {
        $arr_danhmuc[$value->id] = $value->ten;
    }

    #Xử lý loại
    $data_loai = $query->DanhSach("loai", [], [], [], [], [], []);
    $arr_loai = [];
    foreach ($data_loai as $key => $value) {
        $arr_loai[$value->id] = [
            "ten" => $value->ten,
            "danhmuc" => $value->danhmuc
        ];
    }

	// Hình vuông
	if($data_da_chitiet->vuong != NULL)
	{
		$vuong_old = json_decode($data_da_chitiet->vuong);
	}
	else
	{
		$vuong_old = NULL;
	}

	// Album
	if($data_da_chitiet->album != NULL)
	{
		$arr_album_old = explode(",", $data_da_chitiet->album);
	}
	else
	{
		$arr_album_old = [];
	}
	if(isset($_POST['edit']))
	{
        // Album
        if(!empty($_FILES['album']['tmp_name'][0]))
        {
        	// Lưu file album
            $arr_album=[];
            foreach($_FILES['album']['tmp_name'] as $key => $tmp_name)
            {
                $album_ten=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['album']['name'][$key]); 
                array_push($arr_album, $album_ten);      
                move_uploaded_file($_FILES['album']['tmp_name'][$key], "../uploads/van-da/".$album_ten);
            }
            $save_album = implode(",", $arr_album);
            // Xóa file
            if($data_da_chitiet->album != NULL)
            {
            	foreach ($arr_album_old as $key_del => $value_del) {
            		unlink('../uploads/van-da/'.$value_del);
            	}
            }
        }
        else
        {
            $save_album = implode(",", $arr_album_old);
        }

        // Danh mục
        if(!empty($_POST['danhmuc']))
        {
            $query->Xoa("dadanhmuc", ["da" => "="], ["da" => $id]);
            foreach ($_POST['danhmuc'] as $key_ddm => $value_ddm) 
            {
                $query->ThemMoi("dadanhmuc", ["da", "danhmuc"], ["da" => $id, "danhmuc" => $value_ddm]);
            }
            $str_danhmuc = implode(",", $_POST['danhmuc']);
        }
        else
        {
            $query->Xoa("dadanhmuc", ["da" => "="], ["da" => $id]);
            $str_danhmuc = NULL;
        }
        // Hình ảnh đại diện
        $file_tmp = [];
        foreach ($arr_danhmuc as $key => $value)
        {
            $str_pic = "dm-".$key;
            // Hinhg vuông
            if(isset($_FILES['vuong'.$key]['name']) && !empty($_FILES['vuong'.$key]['name']))
            {
                $vuong=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['vuong'.$key]['name']);
                move_uploaded_file($_FILES['vuong'.$key]['tmp_name'], "../uploads/van-da/".$vuong);
                if($vuong_old != NULL)
                {
                    unlink('../uploads/van-da/'.$vuong_old->$str_pic);
                }
                $file_tmp[$str_pic] = $vuong;
            }
            else
            {
                if(isset($vuong_old->$str_pic))
                {
                    $file_tmp[$str_pic] = $vuong_old->$str_pic;
                }
                else
                {
                    $file_tmp[$str_pic] = NULL;
                }
            }
        }
        $vuong_save = json_encode($file_tmp);
  
        $fields = ["ten", "vuong", "album", "gioithieu", "noidung", "danhmuc", "xuatxu", "slug", "noibat", "mota"];
        $condition = ["id"];
        $post_form = [
            "ten" => $_POST['ten'],
            "vuong" => $vuong_save,
            "album" => $save_album,
            "gioithieu" => $_POST['gioithieu'],
            "noidung" => $_POST['noidung'],
            "danhmuc" => $str_danhmuc,
            "xuatxu" => $_POST['xuatxu'],
            "slug" => $_POST['slug'],
            "noibat" => $_POST['noibat'],
            "mota" => $_POST['mota'],
            "id" => $id
        ];
        $query->CapNhat("da", $fields, $condition, $post_form);
        $query->Xoa("dathongso", ["da" => "="], ["da" => $id]);
        if(!empty($_POST['thongso']))
        {
            foreach ($_POST['thongso'] as $key => $value) 
            {
                $fields = [ "da", "thongso" ];
                $post_form = [
                    "da" => $id,
                    "thongso" => $value
                ];
                $query->ThemMoi("dathongso", $fields, $post_form);
            }
        }
        #Xử lý sản phẩm
        $data_list = $query->DanhSach("da", ["ten", "vuong", "mota", "slug", "danhmuc"], ["noibat" => "="], [], [], ["noibat" => 1]);
        $fields = ["sanpham"];
        $condition = ["id"];
        $post_form = [
            "sanpham" => json_encode($data_list),
            "id" => 1
        ];
        $query->CapNhat("company", $fields, $condition, $post_form);
        header("location:da?page=".$page_get);
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Đá tự nhiên <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
        <p class="tit-label"></p>
        <input type="submit" name="edit" class="submit" value="Cập nhật" />
        
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_da_chitiet->ten?>" />
		
        <p class="tit-label">Tên không dấu</p>
        <input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_da_chitiet->slug?>" />

        <p class="tit-label">Sản phẩm nổi bật</p>
        <label><input type="radio" name="noibat" value="1" <?php if($data_da_chitiet->noibat == 1) echo 'checked'; ?>> Có</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input type="radio" name="noibat" value="0" <?php if($data_da_chitiet->noibat == 0) echo 'checked'; ?>> không</label>

		<p class="tit-label">Danh mục</p>
        <?php
        foreach ($data_danhmuc as $key => $value) 
        {
            if(in_array($value->id, $arr_dadanhmuc))
        	{
                echo '<label><input type="checkbox" name="danhmuc[]" value="'.$value->id.'" checked/> '.$value->ten.'</label><br>';
        	}
        	else
        	{
                echo '<label><input type="checkbox" name="danhmuc[]" value="'.$value->id.'"/> '.$value->ten.'</label><br>';
        	}
        }
        ?>

        <p class="tit-label">Hình vuông</p>
        <div class="load-hinh">
            <?php 
            foreach ($_SESSION['danhmuc'] as $key_file => $value_file) 
            {
                $id_danhmuc_tmp = $value_file;
                $str_dm = "dm-".$id_danhmuc_tmp;
                echo '<p><input type="file" name="vuong'.$id_danhmuc_tmp.'" /> 500 x 408 | '.$arr_danhmuc[$id_danhmuc_tmp].'<p>';
                if( isset($vuong_old->$str_dm) )
                {
                    echo '<p><img src="../uploads/van-da/'.$vuong_old->$str_dm.'" height="150" /></p>';
                }
            }
            ?>
        </div>

        <p class="tit-label">Album</p>
        <input type="file" name="album[]" multiple /> 800 x 800 px<br><br>
        <?php
        if($data_da_chitiet->album != NULL)
        {
            foreach ($arr_album_old as $key_p => $value_p) {
                echo '<img src="../uploads/van-da/'.$value_p.'" height="100" />';
            }
        }
        ?>

        <?php 
        foreach ($data_loai as $key => $value) 
        {
            $id_loai = $value->id;
            echo '<p class="tit-label">'.$value->ten.'</p>';
            foreach ($data_thongso as $keyts => $valuets) 
            {
                $ten_danhmuc = $arr_danhmuc[$valuets->danhmuc];
                if($valuets->loai == $id_loai)
                {
                    if(in_array($valuets->id, $arr_dathongso))
                    {
                        echo '<label class="danhmuc-'.$valuets->danhmuc.'"><input type="checkbox" name="thongso[]" value="'.$valuets->id.'" checked> '.$valuets->ten.' - '.$ten_danhmuc.'</label><br><br>';
                    }
                    else
                    {
                        echo '<label class="danhmuc-'.$valuets->danhmuc.'"><input type="checkbox" name="thongso[]" value="'.$valuets->id.'"> '.$valuets->ten.' - '.$ten_danhmuc.'</label><br><br>';
                    }
                }
            }
        }
        ?>

		<p class="tit-label">Giới thiệu</p>
		<textarea rows="5" spellcheck="false" name="gioithieu" class="ckeditor"><?=$data_da_chitiet->gioithieu?></textarea>

        <p class="tit-label">Mô tả</p>
        <textarea rows="5" spellcheck="false" name="mota"><?=$data_da_chitiet->mota?></textarea>

		<p class="tit-label">Nội dung</p>
		<textarea rows="5" spellcheck="false" name="noidung" class="ckeditor"><?=$data_da_chitiet->noidung?></textarea>

		<p class="tit-label">Xuất xứ</p>
        <input type="text" name="xuatxu" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_da_chitiet->xuatxu?>" />

		<p class="tit-label"></p>
		<input type="submit" name="edit" class="submit" value="Cập nhật" />
	</form>
</div>
<script>
    $('input[name="danhmuc[]"]').change(function(){
        let iddanhmuc = $(this).val();
        let sanpham = <?=$id?>;
        if ($(this).prop("checked")) {
            $.ajax({
                method: "POST",
                data: {danhmuc:iddanhmuc, sanpham:sanpham, thaotac:"them"},
                url: "view/da/process-file-edit.php",
                success:function(data)
                {
                    $(".load-hinh").html(data);
                }
            });
        }
        else
        {
            $.ajax({
                method: "POST",
                data: {danhmuc:iddanhmuc, sanpham:sanpham, thaotac:"xoa"},
                url: "view/da/process-file-edit.php",
                success:function(data)
                {
                    $(".load-hinh").html(data);
                }
            });
        }
    });
</script>