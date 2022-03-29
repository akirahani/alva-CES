
<link rel="stylesheet" type="text/css" href="public/css/du-an.css?v151021" />

<section class="du-an">
	<h1>Dự án<br> Titan Stone</h1>
	<ul>
		<?php 
		foreach ($data_list as $key => $value) 
		{
			echo '<li>';
				echo '<img class="view-project" duan="'.$value->id.'" src="uploads/du-an/'.$value->vuong.'" alt="'.$value->ten.'" />';
				echo '<h2 class="view-project" duan="'.$value->id.'">'.$value->ten.'</h2>';
				echo '<p>'.$value->gioithieu.'</p>';
			echo '</li>';
		}
		?>
		
	</ul>
</section>

<section id="photobook"></section>

<script>
	$(document).on("click", ".view-project", function(){
		let duan = $(this).attr("duan");
		$.ajax({
			method: "POST",
			data: {duan:duan},
			url: "view/du-an/ajax.php",
			success:function(dulieu)
			{
				$('#photobook').show();
				$('#photobook').html(dulieu);
			}
		});
	});
</script>