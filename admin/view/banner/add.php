<?php 
	if($arr_phanquyen->sua == 0){header("location:thong-bao");}

	if(isset($_POST['insert']))
	{
		if(!empty($_FILES['mobile']['name']))
		{
			$mobile = date('Y-m-d-H-i-s-').$_FILES['mobile']['name'];
			move_uploaded_file($_FILES['mobile']['tmp_name'], '../uploads/banner/'.$mobile);
		}
		else
		{
			$mobile = NULL;
		}

		if(!empty($_FILES['file']['name']))
		{
			$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/banner/'.$pic);
		}
		else
		{
			$pic = NULL;
		}
		
        $query->ThemMoi("banner", ["ten","link","thutu","mobile","desktop"],["ten"=>$_POST['ten'],"link"=>$_POST['link'],"thutu"=>$_POST['thutu'],"mobile"=>$mobile,"desktop"=>$pic]);
		header("location:list");
	} 

 ?>


<div class="blog small">
	<div class="bread">
		<h1>Banner <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form" action="">
		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" autocomplete="off" required />

		<p class="tit-label">Mobile</p> 800 x 610
        <div class ="mobile" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="mobile" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="mobile" name="mobile"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label>
  
		<p class="tit-label">Desktop</p> 1200 x 558
		<div class ="desktop" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="desktop" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="desktop" name="file"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label>

		<p class="tit-label">Link</p>
		<input class="input-text" type="text"  name="link" autocomplete="off" required />

		<p class="tit-label">Thứ tự</p>
		<input class="input-text" type="number" min="1" name="thutu" autocomplete="off" required />

		<p class="tit-label"></p>
		<input type="submit" name="insert" value="Thêm mới" />
	</form>

  <script type="text/javascript" src="add.js"></script>
</div>