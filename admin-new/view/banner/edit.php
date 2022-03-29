<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("banner", $fields, $operator, $condition);

	if(isset($_POST['update']))
	{
		if(!empty($_FILES['mobile']['name']))
		{
			$mobile = date('Y-m-d-H-i-s-').$_FILES['mobile']['name'];
			move_uploaded_file($_FILES['mobile']['tmp_name'], '../uploads/banner/'.$mobile);
			unlink('../uploads/banner/'.$data_detail->mobile);
		}
		else
		{
			$mobile = $data_detail->mobile;;
		}

		if(!empty($_FILES['file']['name']))
		{
			$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/banner/'.$pic);
			unlink('../uploads/banner/'.$data_detail->desktop);
		}
		else
		{
			$pic = $data_detail->desktop;
		}

		$fields = ["ten", "link", "thutu", "mobile", "desktop"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
			"link" => $_POST['link'],
			"thutu" => $_POST['thutu'],
			"mobile" => $mobile,
			"desktop" => $pic,
            "id" => $id
        ];
        $query->CapNhat("banner",$fields, $condition, $post_form);
        #Xử lý banner
		$data_list = $query->DanhSach("banner", [], [], ["thutu" => "ASC"], [], []);
		$fields = ["banner"];
        $condition = ["id"];
        $post_form = [
			"banner" => json_encode($data_list),
            "id" => 1
        ];
        // $query->CapNhat("company", $fields, $condition, $post_form);
		header("location:list");
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Banner <span>| cập nhật</span></h1>
		<!-- <div class="button"><button><a href="them-loai">Thêm mới</a></button></div> -->
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" value="<?=$data_detail->ten;?>" />
		
		<p class="tit-label">Mobile</p> 800 x 610
        <div class ="mobile" style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="mobile" class="mobile-img" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="mobile" name="mobile" accept="image/*" class="mb-2" multiple hidden/>
        </label>

		<p class="tit-label"></p>
		<img src="../uploads/banner/<?=$data_detail->mobile;?>" height=50 />

		<p class="tit-label">Desktop</p> 1200 x 558
		<div class ="desktop" style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="desktop" class="desktop"   style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="desktop" name="file" accept="image/*" class="mb-2" multiple hidden />
        </label>

		<p class="tit-label"></p>
		<img src="../uploads/banner/<?=$data_detail->desktop;?>" height=50 />

		<p class="tit-label">Link</p>
		<input class="input-text" type="text" name="link" autocomplete="off" value="<?=$data_detail->link;?>" />

		<p class="tit-label">Thứ tự</p>
		<input class="input-text" type="number" min="1" name="thutu" autocomplete="off" value="<?=$data_detail->thutu;?>" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Update" />
	</form>
</div>
 <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
	      $("#mobile").change(function() {
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

	        $('#mobile').change(function(){
	            imagesPreview(this,'div.mobile');
	        });
	    });

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
	      $("#desktop").change(function() {
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

	        $('#desktop').change(function(){
	            imagesPreview(this,'div.desktop');
	        });
	    });
    </script>