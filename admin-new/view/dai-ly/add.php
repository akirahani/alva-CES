<?php
	if(isset($_POST['add']))
	{
        if(!empty($_FILES['album']['tmp_name'][0]))
        {
            $arr_album=[];
            foreach($_FILES['album']['tmp_name'] as $key => $tmp_name)
            {
                $album_ten=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['album']['name'][$key]); 
                array_push($arr_album, $album_ten);      
                move_uploaded_file($_FILES['album']['tmp_name'][$key], "../uploads/dai-ly/".$album_ten);
            }
            $save_album = implode(",", $arr_album);
        }
        else
        {
            $save_album = NULL;
        }
        $fields = [	"ten", "diachi", "dienthoai", "hethong", "tinhthanh", "slug", "map", "gioithieu", "album" ];
		$post_form = [
			"ten" => $_POST['ten'],
        	"diachi" => $_POST['diachi'],
        	"dienthoai" => $_POST['dienthoai'],
        	"hethong" => $_POST['hethong'],
        	"tinhthanh" => $_POST['tinhthanh'],
        	"slug" => $_POST['slug'],
        	"map" => $_POST['map'],
        	"gioithieu" => $_POST['gioithieu'],
        	"album" => $save_album
		];
		$query->ThemMoi("daily", $fields, $post_form);
        header("location:dai-ly");
	}
	$data_tinhthanh = $query->DanhSach("tinhthanh", [], [], [], [], [], []);
?>
<div class="blog medium">

	<div class="bread">
		<h1>Đại lý <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />
		
		<p class="tit-label">Địa chỉ</p>
		<input type="text" name="diachi" spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Điện thoại</p>
		<input type="text" name="dienthoai" spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Hệ thống</p>
		<label><input type="radio" name="hethong" value="1"> Đại lý hệ thống</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="hethong" value="0" checked> Đại lý thường</label>

		<p class="tit-label">Tỉnh thành</p>
		<select name="tinhthanh">
			<option value="0">Chọn</option>
			<?php
			foreach ($data_tinhthanh as $key => $value) {
				echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
			}
			?>
		</select>

		<p class="tit-label">Album</p>
		<input type="file" name="album[]" multiple /> 16 x 9 px

		<p class="tit-label">Tên Không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Map</p>
		<textarea rows="6" name="map"></textarea>

		<p class="tit-label">Giới thiệu</p>
		<textarea class="ckeditor" name="gioithieu"></textarea>

		<p class="tit-label"></p>
		<input type="submit" name="add" value="Thêm mới" />
	</form>
</div>