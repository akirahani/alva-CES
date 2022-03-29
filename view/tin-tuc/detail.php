
<link rel="stylesheet" type="text/css" href="public/css/news.css?v=161121" />

<section class="noi-dung">
	<div class="wrap">
		<article>
			<div class="top">
				<ul>
					<li class="time">Thời gian: <?=date("d/m/Y", strtotime($data_detail->ngay))?></li>
					<li>
						<span>Chia sẻ</span>
						<img src="public/image/footer/facebook.svg" alt="Fanpage" />
						<img src="public/image/footer/youtube.svg" alt="Youtube" />
					</li>
				</ul>
			</div>
			<div class="bai-viet">
				<h1><?=$data_detail->ten?></h1>
				<?=$data_detail->noidung?>
			</div>
		</article>
		
		<div class="bottom">
			<div class="scroll">
				<h2 class="tit">Tin mới nhất</h2>
				<ul class="moi">
					<?php 
					foreach ($data_list as $key => $value) 
					{
						echo '<li>';
							echo '<div class="left">';
								echo '<a href="'.$value->slug.'"><img class="lazy" src="uploads/lazy/tin.svg" data-src="uploads/tin-tuc/'.$value->vuong.'" alt="'.$value->ten.'" /></a>';
							echo '</div>';
							echo '<div class="right">';
								echo '<h3><a href="'.$value->slug.'">'.$value->ten.'</a></h3>';
								echo '<p class="time">Thời gian: '.date("d/m/Y", strtotime($value->ngay)).'</p>';
							echo '</div>';
						echo '</li>';
						}
					?>

				</ul>
			</div>
		</div>
	</div>
</section>