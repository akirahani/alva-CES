<?php

    	isset($_GET['id']) ? $id=$_GET['id'] : $id=0;
    	$operator = ["id" => "="];
        $condition = ["id" => $id];
        #Delete
        $query->Xoa("thanhvien", $operator, $condition);
    	header("location:thanh-vien");
?>