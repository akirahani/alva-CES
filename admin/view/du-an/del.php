<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$duan= new DuAn();
	$duan->Xoa($query,$id);
?>