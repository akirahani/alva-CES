<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$doitac = new DoiTac();
	$doitac->Xoa($query,$id);
?>