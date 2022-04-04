<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$tin = new Tin();
    $tin->Xoa($query,$id); 
	
?>
