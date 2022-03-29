<?php
	require_once "../../admin/model/Query.php";
	$query = new Query();
	$data_duan = $query->ChiTiet("duan", [], ["id" => "="], ["id" => $_POST['duan']]);
	$arr_slide = explode(",", $data_duan->album);
?>
<script src="public/js/jquery.js"></script>
<link href="public/css/fotorama.css" rel="stylesheet">
<script src="public/js/fotorama.js"></script>
<img class="close-slide" src="public/image/close.svg" alt="Close" />
<div class="fotorama" data-allowfullscreen="true">
	<?php
	foreach ($arr_slide as $key => $value) 
	{
		echo '<a href="uploads/du-an/'.$value.'"></a>';
	}
  	?>
</div>
<script>
	$(".close-slide").click(function(){
		$("#photobook").html('');
		$("#photobook").hide();
	});
</script>