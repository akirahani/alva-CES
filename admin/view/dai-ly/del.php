<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$daily = new DaiLy();
	$daily->Xoa($query,$id);
?>