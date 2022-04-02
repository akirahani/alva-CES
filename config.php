
<form method="post">
	<input type="text" name="route" placeholder="Route"/>
	<input type="submit" name="create" value="Tạo route"/>
</form>
<?php 
	if(isset($_POST["create"]))
	{
		$folder = $_POST['route'];
		#Tạo folder
		if (!file_exists('view/'.$folder)) 
		{
			mkdir("view/".$folder, 0700);
			mkdir("controller/".$folder, 0700);
			mkdir("admin/view/".$folder,0777);
			mkdir("admin/controller/".$folder,0777);
			#Tạo file
			if (!file_exists('view/'.$folder.'/list.php')) {
    			touch('view/'.$folder.'/list.php');
    			touch('view/'.$folder.'/detail.php');
    			touch('view/'.$folder.'/edit.php');
    			touch('view/'.$folder.'/add.php');
    		}
    		if (!file_exists('controller/'.$folder.'/list.php')) {
    			touch('controller/'.$folder.'/list.php');
    			touch('controller/'.$folder.'/detail.php');
    			touch('controller/'.$folder.'/add.php');
    			touch('controller/'.$folder.'/edit.php');
    		}
    		if(!file_exists('admin/view/'.$folder.'/list.php')){
    			touch('admin/view/'.$folder.'/list.php');
    			touch('admin/view/'.$folder.'/detail.php');
    			touch('admin/view/'.$folder.'/add.php');
    			touch('admin/view/'.$folder.'/edit.php');
    		}
    		if(!file_exists('admin/controller/'.$folder.'/list.php')){
    			touch('admin/controller/'.$folder.'/list.php');
    			touch('admin/controller/'.$folder.'/detail.php');
    			touch('admin/controller/'.$folder.'/add.php');
    			touch('admin/controller/'.$folder.'/edit.php');
    		}
		}
		else
		{
			echo "Folder tồn tại";
		}
	}
?>