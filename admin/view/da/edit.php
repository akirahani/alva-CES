<?php
    isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    isset($_GET ['page']) ? $page_get = intval($_GET ['page']) : $page_get = 1;
    $data_da_chitiet = $query->ChiTiet("da",  [], ["id" => "="],["id" => $id]);
    $data_thongso = $query->DanhSach("thongso", [], [], [], [], [], []);
    $data_dadanhmuc = $query->DanhSach("dadanhmuc", [], ["da" => "="], [], [], ["da"=>$id]);
    $data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
    $data_loai = $query->DanhSach("loai", [], [], [], [], [], []);
    $data_dathongso = $query->DanhSach("dathongso", [], ["da" => "="], [], [], ["da" => $id], []);
    #Xử lý đá danh mục
    $da = new Da();
    $arr_dadanhmuc = $da->XuLiDanhMucCapNhat($data_dadanhmuc);
    #Đá thông số
    $arr_dathongso= $da->XuLiDaThongSoCapNhat($data_dathongso,$query,$id);
    #Xử lý danh mục
   
    $arr_danhmuc = $da->XuLiDanhMuc($data_danhmuc);
    $arr_loai = $da->XuLiLoai($data_loai);
    // Hình vuông
    $vuong_old = $da->HinhVuong($data_da_chitiet);
    $arr_album_old = $da->AlbumVuong($data_da_chitiet);
    if(isset($_POST['edit']))
    {
        $da->CapNhat($query,$id,$data_da_chitiet,$lib,$data_dadanhmuc, $data_dathongso,$data_danhmuc,$data_loai);
       
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