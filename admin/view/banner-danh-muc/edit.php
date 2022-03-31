<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$data_danhmuc = $query->DanhSach("danhmuc");
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("bannerdanhmuc", $fields, $operator, $condition);

	if(isset($_POST['update']))
	{
		if(!empty($_FILES['file']['name']))
		{
			$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/banner-danh-muc/'.$pic);
			unlink('../uploads/banner-danh-muc/'.$data_detail->hinh);
		}
		else
		{
			$pic = $data_detail->hinh;
		}

		$fields = ["ten", "link", "hinh", "danhmuc"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
			"link" => $_POST['link'],
			"hinh" => $pic,
			"danhmuc" => $_POST['danhmuc'],
            "id" => $id
        ];
        $query->CapNhat("bannerdanhmuc", $fields, $condition, $post_form);
        #Xử lý banner
		$data_list = $query->DanhSach("bannerdanhmuc");
		$fields = ["bannerdanhmuc"];
        $condition = ["id"];
        $post_form = [
			"bannerdanhmuc" => json_encode($data_list),
            "id" => 1
        ];
        $query->CapNhat("company", $fields, $condition, $post_form);
		header("location:list");
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Banner danh mục <span>| cập nhật</span></h1>
		<div class="button"><button><a href="them-banner-danh-muc">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<select name="danhmuc">
			<?php 
			foreach ($data_danhmuc as $key => $value) {
				if($value->id == $data_detail->danhmuc)
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

		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" value="<?=$data_detail->ten;?>" />

		<p class="tit-label">Hình</p> 395 x 207
		<div class ="desktop" style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="desktop" class="desktop"   style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="desktop" name="file" accept="image/*" class="mb-2" multiple hidden />
        </label>

		<p class="tit-label"></p>
		<img src="../uploads/banner-danh-muc/<?php echo $data_detail->hinh;?>" height=50 />

		<p class="tit-label">Link</p>
		<input class="input-text" type="text" name="link" autocomplete="off" value="<?=$data_detail->link;?>" />

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