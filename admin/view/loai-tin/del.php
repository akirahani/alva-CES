<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$loaitin = new loaiTin();
    $loaitin->Xoa($query,$id);
?>