<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("doitac", $fields, $operator, $condition);

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
        if(!empty($_FILES['file']['name']))
        {  
            $hinh=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['file']['name']);      
            move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/doi-tac/".$hinh);
            unlink('../uploads/doi-tac/'.$hinh_old);
            $hinh_save = $hinh;
        }
        else
        {
            $hinh_save = $hinh_old;
        }
        $fields = [	"ten", "hinh", "mota", "diachi", "dienthoai", "website" ];
        $condition = ["id"];
        $post_form = [
        	"id" => $id,
        	"ten" => $_POST['ten'],
        	"hinh" => $hinh_save,
        	"mota" => $_POST['mota'],
        	"diachi" => $_POST['diachi'],
        	"dienthoai" => $_POST['dienthoai'],
        	"website" => $_POST['website']
        ];
        $query->CapNhat("doitac", $fields, $condition, $post_form);
        header("location:list");
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Đối tác <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên đối tác</p>
		<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
		
		<p class="tit-label">Hình ảnh</p>
				<div class ="file"  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="file" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="file" name="file"   accept="image/*"  class="mb-2" multiple hidden />
        </label>
		<?php
		if($data_detail->hinh != NULL)
		{
			echo '<br><br><p><img src="../uploads/doi-tac/'.$data_detail->hinh.'" height="150" />';
		}
		?>
		
		<p class="tit-label">Địa chỉ</p>
		<input type="text" name="diachi" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->diachi?>" />

		<p class="tit-label">Điện thoại</p>
		<input type="text" name="dienthoai" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->dienthoai?>" />

		<p class="tit-label">Website</p>
		<input type="text" name="website" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->website?>" />

		<p class="tit-label">Mô tả</p>
		<textarea rows="5" spellcheck="false" name="mota"><?=$data_detail->mota?></textarea>

		<p class="tit-label"></p>
		<input type="submit" name="edit" value="Cập nhật" />
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
	      $("#file").change(function() {
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

	        $('#file').change(function(){
	            imagesPreview(this,'div.file');
	        });
	    });
</script>