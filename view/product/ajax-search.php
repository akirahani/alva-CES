<?php
	if(isset($_POST['keyword']))
	{
		require_once "../../admin/model/Da.php";
		$da = new Da();
		$data = $da->TimKiem($_POST['keyword']);
		foreach ($data as $key => $value) {
			echo '<li><a href="da-xuyen-sang-alva/'.$value->slug.'">'.$value->ten.'</a></li>';
		}
	}
?>