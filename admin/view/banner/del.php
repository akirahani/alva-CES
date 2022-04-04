<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$banner = new Banner();
	$banner->Xoa($query,$id);
?>
