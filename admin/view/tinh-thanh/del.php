<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    $tinhthanh = new TinhThanh();
    $tinhthanh->Xoa($query,$id);
?>