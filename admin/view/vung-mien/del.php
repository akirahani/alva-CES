<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$vungmien = new VungMien();
	$vungmien->Xoa($query,$id);
?>