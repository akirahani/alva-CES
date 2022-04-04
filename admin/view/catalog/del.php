<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$catalog = new Catalog();
   	$catalog->Xoa($query,$id);
?>