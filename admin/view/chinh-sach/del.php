<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$chinhsach = new ChinhSach();
	$chinhsach->Xoa($query,$id);
?>