<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$loai = new Loai();
    $loai->Xoa($query,$id);
?>
