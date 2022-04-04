<?php 
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$danhmuc = new DanhMuc();
    $danhmuc->Xoa($query,$id);
?>