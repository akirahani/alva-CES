<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Delete
	$query->Xoa("nhom", ["id" => "="],["id" => $id]);
	header("location:list");
?>