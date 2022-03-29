<?php
	if(isset($_POST['insert']))
	{
		// Hình vuông
		if(!empty($_FILES['vuong']['tmp_name']))
        {
            $hinh_vuong=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['vuong']['name']); 
            move_uploaded_file($_FILES['vuong']['tmp_name'], "../uploads/du-an/".$hinh_vuong);
        }
        else
        {
            $hinh_vuong = NULL;
        }
        // Hình dài
        if(!empty($_FILES['dai']['tmp_name']))
        {
            $hinh_dai=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['dai']['name']); 
            move_uploaded_file($_FILES['dai']['tmp_name'], "../uploads/du-an/".$hinh_dai);
        }
        else
        {
            $hinh_dai = NULL;
        }
        // Album
        if(!empty($_FILES['album']['tmp_name'][0]))
        {
            $arr_album=[];
            foreach($_FILES['album']['tmp_name'] as $key => $tmp_name)
            {
                $album_ten=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['album']['name'][$key]); 
                array_push($arr_album, $album_ten);      
                move_uploaded_file($_FILES['album']['tmp_name'][$key], "../uploads/du-an/".$album_ten);
            }
            $save_album = implode(",", $arr_album);
        }
        else
        {
            $save_album = NULL;
        }
        $fields = [	"ten", "vuong", "dai", "album", "gioithieu", "noidung", "loai" ];
        $post_form=[
        	"ten" => $_POST['ten'],
        	"vuong" => $hinh_vuong,
        	"dai" => $hinh_dai,
        	"album" => $save_album,
        	"gioithieu" => $_POST['gioithieu'],
        	"noidung" => $_POST['noidung'],
        	"loai" => $_POST['loai']
        ];
        $query->ThemMoi("duan", $fields, $post_form);
        header("location:list");
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Dự án <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />
		
		<p class="tit-label">Hình vuông</p> 600 x 600 px
		  <div class ="vuong"  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="vuong" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="vuong" name="vuong"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label> 

		<p class="tit-label">Hình dài</p> 600 x 314 px
        <div class ="dai"  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="dai" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="dai" name="dai"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label> 

		<p class="tit-label">Album</p>
        <div class ="album" style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="album" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="album" name="album[]"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label> 

		<p class="tit-label">Giới thiệu</p>
		<textarea rows="5" spellcheck="false" name="gioithieu" class="ckeditor"></textarea>

		<p class="tit-label">Nội dung</p>
		<textarea rows="5" spellcheck="false" name="noidung" class="ckeditor"></textarea>

		<p class="tit-label">Loại dự án</p>
		<label><input type="radio" name="loai" value="1"> Nổi bật</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="loai" value="0" checked> khách hàng</label>

		<p class="tit-label"></p>
		<input type="submit" name="insert" value="Thêm mới" />
	</form>
</div>
<script>
          // desktop
    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
          $("#vuong").change(function() {
            readURL(this);
          });
          $("#dai").change(function() {
            readURL(this);
          });
          $("#album").change(function() {
            readURL(this);
          });
          $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img  class="img-display" style=" width:10%; padding:10px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#vuong').change(function(){
                imagesPreview(this,'div.vuong');
            });
            $('#dai').change(function(){
                imagesPreview(this,'div.dai');
            });
            $('#album').change(function(){
                imagesPreview(this,'div.album');
            });
        });
    </script>