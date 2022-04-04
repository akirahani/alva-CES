<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
    $landing = new Landing();
    $landing->Xoa($query,$id);
?>
