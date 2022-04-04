<?php
    $_SESSION['danhmuc'] = [];
    $data_thongso = $query->DanhSach("thongso");
    $data_danhmuc = $query->DanhSach("danhmuc");
    $arr_danhmuc = [];
    foreach ($data_danhmuc as $key => $value) {
        $arr_danhmuc[$value->id] = $value->ten;
    }
    #Xử lý loại
    $data_loai = $query->DanhSach("loai");
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
        $da = new Da();
        $da->ThemMoi($query,$lib,$data_danhmuc,$data_loai);
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
<script src="view/da/da_add.js"></script>