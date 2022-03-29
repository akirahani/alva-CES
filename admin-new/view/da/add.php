<?php
    $_SESSION['danhmuc'] = [];
    $data_thongso = $query->DanhSach("thongso", [], [], [], [], [], []);

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
    $arr_loai[0] = "Update";

	if(isset($_POST['add']))
	{
        // Hình vuông
        $file_tmp = [];
        foreach ($arr_danhmuc as $keyv => $valuev)
        {
            $str_pic = "dm-".$keyv;
    		if(!empty($_FILES['vuong'.$keyv]['tmp_name']))
            {
                $hinh_vuong=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['vuong'.$keyv]['name']); 
                move_uploaded_file($_FILES['vuong'.$keyv]['tmp_name'], "../uploads/van-da/".$hinh_vuong);
                $file_tmp[$str_pic] = $hinh_vuong;
            }
        }

        // Album
        if(!empty($_FILES['album']['tmp_name'][0]))
        {
            $arr_album=[];
            foreach($_FILES['album']['tmp_name'] as $key => $tmp_name)
            {
                $album_ten=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['album']['name'][$key]); 
                array_push($arr_album, $album_ten);      
                move_uploaded_file($_FILES['album']['tmp_name'][$key], "../uploads/van-da/".$album_ten);
            }
            $save_album = implode(",", $arr_album);
        }
        else
        {
            $save_album = NULL;
        }

        // Danh mục
        if(!empty($_POST['danhmuc']))
        {
            $str_danhmuc = implode(",", $_POST['danhmuc']);
        }
        else
        {
            $str_danhmuc = NULL;
        }

        $fields = [ "ten", "vuong", "album", "gioithieu", "noidung", "danhmuc", "xuatxu", "slug", "noibat", "mota" ];
        $post_form = [
            "ten" => $_POST['ten'],
            "vuong" => json_encode($file_tmp),
            "album" => $save_album,
            "gioithieu" => $_POST['gioithieu'],
            "noidung" => $_POST['noidung'],
            "danhmuc" => $str_danhmuc,
            "xuatxu" => $_POST['xuatxu'],
            "slug" => $_POST['slug'],
            "noibat" => $_POST['noibat'],
            "mota" => $_POST['mota']
        ];
        $last = $query->ThemMoi("da", $fields, $post_form);
        if(!empty($_POST['thongso']))
        {
            foreach ($_POST['thongso'] as $key => $value) 
            {
                $fields = [ "da", "thongso" ];
                $post_form = [
                    "da" => $last,
                    "thongso" => $value
                ];
                $query->ThemMoi("dathongso", $fields, $post_form);
            }
        }
        if(!empty($_POST['danhmuc']))
        {
            foreach ($_POST['danhmuc'] as $key_ddm => $value_ddm) 
            {
                $query->ThemMoi("dadanhmuc", ["da", "danhmuc"], ["da" => $last, "danhmuc" => $value_ddm]);
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
        header("location:da");
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Đá tự nhiên <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />
		
        <p class="tit-label">Tên không dấu</p>
        <input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" />
        
        <p class="tit-label">Sản phẩm nổi bật</p>
        <label><input type="radio" name="noibat" value="1"> Có</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input type="radio" name="noibat" value="0" checked> không</label>

        <p class="tit-label">Danh mục</p>
        <?php 
        foreach ($data_danhmuc as $key => $value) 
        {
            echo '<label><input type="checkbox" name="danhmuc[]" value="'.$value->id.'" /> '.$value->ten.'</label><br>';
        }
        ?>
        <div class="load-hinh">
            <p class="tit-label">Hình vuông</p>
        </div>

        <p class="tit-label">Album</p>
        <input type="file" name="album[]" multiple /> 800 x 800 px
        
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
                    echo '<label class="danhmuc-'.$valuets->danhmuc.'"><input type="checkbox" name="thongso[]" value="'.$valuets->id.'"> '.$valuets->ten.' - '.$ten_danhmuc.'</label><br><br>';
                }
            }
        }
        ?>
        
        <div class="load-thongso"></div>

		<p class="tit-label">Giới thiệu</p>
		<textarea rows="5" spellcheck="false" name="gioithieu" class="ckeditor"></textarea>

        <p class="tit-label">Mô tả</p>
        <textarea rows="5" spellcheck="false" name="mota"></textarea>

		<p class="tit-label">Nội dung</p>
		<textarea rows="5" spellcheck="false" name="noidung" class="ckeditor"></textarea>

		<p class="tit-label">Xuất xứ</p>
        <input type="text" name="xuatxu" spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label"></p>
		<input type="submit" name="add" class="submit" value="Thêm mới" />
	</form>
</div>
<script>
    $('input[name="danhmuc[]"]').change(function(){
        let iddanhmuc = $(this).val();
        if ($(this).prop("checked")) {
            $.ajax({
                method: "POST",
                data: {danhmuc:iddanhmuc, thaotac:"them"},
                url: "view/da/process-file-add.php",
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
                data: {danhmuc:iddanhmuc, thaotac:"xoa"},
                url: "view/da/process-file-add.php",
                success:function(data)
                {
                    $(".load-hinh").html(data);
                }
            });
        }
    });
</script>