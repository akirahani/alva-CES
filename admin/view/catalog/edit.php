<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("catalog", $fields, $operator, $condition);

	if(isset($_POST['edit']))
	{
        if(!empty($_FILES['file']['name']))
        {  
            $pic=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['file']['name']);      
            move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/catalog/".$pic);
            unlink('../uploads/catalog/'.$data_detail->hinh);
        }
        else
        {
            $pic = $data_detail->hinh;
        }
        $fields = ["ten", "hinh"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
			"hinh" => $pic,
            "id" => $id
        ];
        $query->CapNhat("catalog", $fields, $condition, $post_form);
        header("location:list");
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Catalog <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
		
		<p class="tit-label">Hình ảnh</p> 800 x 521 px
		<div class ="file" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="file" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="file" name="file"   accept="image/*"  class="mb-2" multiple hidden/>
        </label>
		<?php
		if($data_detail->hinh != NULL)
		{
			echo '<br><br><p><img src="../uploads/catalog/'.$data_detail->hinh.'" height="150" />';
		}
		?>
		<p class="tit-label"></p>
		<input type="submit" name="edit" value="Cập nhật" />
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