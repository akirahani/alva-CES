<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$thongso = new ThongSo();
	$thongso->Xoa($query,$id);
?>