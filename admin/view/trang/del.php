<?php

	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$query->Xoa('trang',["id"=>"="],["id"=>$id]);
	header("location:list");
    ?>