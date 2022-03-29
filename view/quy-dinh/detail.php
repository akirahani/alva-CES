
<link rel="stylesheet" type="text/css" href="public/css/news.css?v=161121" />

<section class="noi-dung">
	<div class="wrap">
		<article>
			<div class="top">
				<ul>
					<li class="time">Thời gian: <?=date("d/m/Y")?></li>
					<li>
						<span>Chia sẻ</span>
						<img src="public/image/footer/facebook.svg" alt="Fanpage" />
						<img src="public/image/footer/youtube.svg" alt="Youtube" />
					</li>
				</ul>
			</div>
			<div class="bai-viet">
				<h1><?=$arr_chinhsach[$one]->ten?></h1>
				<?=$arr_chinhsach[$one]->noidung?>
			</div>
		</article>
		
		<div class="bottom">
			<div class="scroll">
				<h2 class="tit">Điều khoản chính sách</h2>
				<ul class="moi">
					<?php 
					foreach ($arr_chinhsach as $key => $value) {
						echo '<li>';
							echo '<div class="left">';
								echo '<a href="slug"><img src="uploads/chinh-sach/'.$value->hinh.'" alt="'.$value->ten.'" /></a>';
							echo '</div>';
							echo '<div class="right">';
								echo '<h3><a href="quy-dinh/'.$value->slug.'">'.$value->ten.'</a></h3>';
								echo '<p class="time">Thời gian: '.date("d/m/Y").'</p>';
							echo '</div>';
						echo '</li>';
						}
					?>

				</ul>
			</div>
		</div>
	</div>
</section>