<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
   	$bannerDM = new BannerDM();
	$bannerDM->Xoa($query,$id);
	header("location:list");
?>
