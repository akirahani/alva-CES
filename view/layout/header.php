<header>
	<section class="top">
		<div class="left"><img src="public/image/clock.svg" alt="Thời gian làm việc"/> Thứ 2 - thứ 7 : 8:00 - 17:00</div>
		<div class="right">
			<p><a href="">Tranh đá tự nhiên đối xứng - Tranh đá tự nhiên ốp phòng khách</a></p>
			<p><a href="">Hướng dẫn đặt hàng</a></p>
			<p><a href="">Hướng dẫn thanh toán và vận chuyển</a></p>
		</div>
	</section>
	<section class="wrap">
		<a href="./"><img class="logo" src="public/image/logo.svg" alt="Đá xuyên sáng Alva" /></a>
		<img class="icon-menu" src="public/image/menu.svg" alt="Menu" />
		<div class="desktop">
			<form method="post" action="tim-kiem" class="form-search">
				<input type="text" name="keyword" placeholder="Bạn tìm gì" spellcheck="false" autocomplete="off" />
				<input type="submit" name="search" value="" />
			</form>
			<div class="tu-van">
				<img src="public/image/phone.svg" alt="Hotline"/>
				<p>
					<span>TƯ VẤN 24/7</span>
					<span>07 6669 8883</span>
				</p>
			</div>
			<p class="social">
				<span>Kết nối</span>
				<span><a href="<?=$data_company->facebook?>" target="_blank"><img src="public/image/home/facebook.svg" alt="Fanpage Alva" /></a></span>
				<span><a href="<?=$data_company->youtube?>" target="_blank"><img src="public/image/home/youtube.svg" alt="Youtube Alva" /></a></span>
			</p>
		</div>
	</section>
</header>

<nav>
	<img class="close-menu" src="public/image/close.svg" alt="Close menu" />
	<div class="form-wrap">
		<form method="post" action="tim-kiem" class="form-search">
			<input type="text" name="keyword" placeholder="Bạn tìm gì" spellcheck="false" autocomplete="off" />
			<input type="submit" name="search" value="" />
		</form>
	</div>
	<ul>
		<li <?php if($p == "ve-chung-toi") echo 'class="active"'; ?>><a href="ve-chung-toi">Giới thiệu</a></li>
		<?php 
		foreach ($arr_danhmuc as $key => $value) {
			if($value[2] == $p)
			{
				echo '<li class="active"><a href="'.$key.'">'.$value[1].'</a></li>';
			}
			else
			{
				echo '<li><a href="'.$key.'">'.$value[1].'</a></li>';
			}
		}
		?>
		
		<li <?php if($p == "du-an") echo 'class="active"'; ?>><a href="du-an">Dự án</a></li>
		<li <?php if($p == "tin-tuc") echo 'class="active"'; ?>><a href="tin-tuc">Tin tức</a></li>
		<li <?php if($p == "ho-so-nang-luc") echo 'class="active"'; ?>><a href="ho-so-nang-luc">Hồ sơ năng lực</a></li>
		<li <?php if($p == "lien-he") echo 'class="active"'; ?>><a href="lien-he">Liên hệ</a></li>
	</ul>
</nav>