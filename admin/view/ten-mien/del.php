<?php
	isset($_GET['id']) ? $id=$_GET['id'] : $id=0;
	isset($_GET ['page']) ? $page_get = intval($_GET ['page']) : $page_get = 1;
	$mien = new Mien();
    $mien->Xoa($query,$id);
	
?>