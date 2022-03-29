
<link rel="stylesheet" type="text/css" href="public/css/tin-tuc.css" />

<section class="news-top">
	<div class="wrap">
		<h1>TIN TỨC NỔI BẬT</h1>
		<ul class="pin owl-carousel owl-theme">
			<?php 
			foreach ($arr_hot as $key => $value)
			{
			?>
				<li>
					<a href="<?=$value->slug?>"><img class="owl-lazy" src="uploads/lazy/tin.svg" data-src="uploads/tin-tuc/<?=$value->vuong?>" alt="<?=$value->ten?>" /></a>
					<h2><a href="<?=$value->slug?>"><?=$value->ten?></a></h2>
					<div class="intro"><?=$value->mota?></div>
					<p class="time">Thời gian: <?=date("d/m/Y", strtotime($value->ngay))?></p>
				</li>
			<?php 
			}
			?>
		</ul>

		<ul class="hot news-blog">
			<?php
			$thutu = 0;
			foreach ($arr_noibat as $key => $value)
			{
				if($thutu < 4)
				{
				?>
				<li>
					<div class="left">
						<a href="<?=$value->slug?>"><img class="lazy" src="uploads/lazy/tin.svg" data-src="uploads/tin-tuc/<?=$value->vuong?>" alt="<?=$value->ten?>" /></a>
					</div>
					<div class="right">
						<h3><a href="<?=$value->slug?>"><?=$value->ten?></a></h3>
						<div class="intro"><?=$value->mota?></div>
						<p class="time">Thời gian: <?=date("d/m/Y", strtotime($value->ngay))?></p>
					</div>
				</li>
				<?php
				$thutu ++;
				}
			}
			?>
		</ul>
	</div>
</section>

<section class="news-bot scroll-new-bot">
	<h2>Tin tức mới</h2>
	<ul class="news-blog">
		<?php 
		foreach ($arr_page as $key => $value)
		{
		?>
		<li>
			<div class="left">
				<a href="<?=$value->slug?>"><img class="lazy" src="uploads/lazy/tin.svg" data-src="uploads/tin-tuc/<?=$value->vuong?>" alt="<?=$value->ten?>" /></a>
			</div>
			<div class="right">
				<h3><a href="<?=$value->slug?>"><?=$value->ten?></a></h3>
				<div class="intro"><?=$value->mota?></div>
				<p class="time">Thời gian: <?=date("d/m/Y", strtotime($value->ngay))?></p>
			</div>
		</li>
		<?php 
		}
		?>
	</ul>
	
	<?php 
	if($total_row > $num_of_page)
	{
        echo '<ul class="page">';
			echo $lib->PhanTrang($ps.'?', $total_page, $page);
		echo '</ul>';
	}
	?>

</section>
<script>
	$(".news-top ul.pin").owlCarousel({
		nav: false,
		lazyLoad: true,
		items: 1,
		dots: true
	});
	if($(document).width()>1200)
	{
		$(".news-top ul.hot").prepend('<h1>Tin tức nổi bật</h1>');
	}
	<?php 
	if(isset($_GET['page']))
	{
	?>
	$("html, body").animate({
        scrollTop: $(".scroll-new-bot").offset().top
    }, 800);
	<?php
	}
	?>
</script>