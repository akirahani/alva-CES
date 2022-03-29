<?php 
	$_SESSION['tenda'] = $data_da->ten;
?>
<link rel="stylesheet" type="text/css" href="public/css/product-detail.css?v=<?=time()?>" />
<main>
	<section class="bread">
		<ul>
			<li><a href="./">Trang chủ</a></li>
			<li><span>></span></li>
			<li><a href="da-ngoc-tu-nhien-xuyen-sang">Đá ngọc tự nhiên</a></li>
		</ul>
	</section>

	<section class="content">
		<div class="slide-wrap">
			<div class="slide owl-carousel owl-theme">
				<?php
				foreach ($arr_vanda as $key => $value) {
					echo '<img class="item owl-lazy" data-src="uploads/van-da/'.$value.'" alt="'.$data_da->ten.'" />';
				}
				?>
			</div>
		</div>

		<div class="lua-chon">
			<ul>
				<li class="active">Dành cho khách lẻ</li>
				<li>Dành cho bán buôn</li>
			</ul>
		</div>

		<div class="thong-tin">
			<div class="khach-le">DÀNH CHO KHÁCH LẺ</div>
			<h1><?=@$data_da->ten?></h1>
			<h2>Giá : Liên hệ</h2>
			<div class="dac-diem">
				<p>
					<b>Xuất xứ:</b>
					<span> Alva</span>
				</p>
				<p>
					<b>Độ dày:</b>
					<span>2 cm</span>
				</p>
				<p>
					<b>Loại đá:</b>
					<span> Đá tự nhiên</span>
				</p>
				<p>
					<b>Vân đá:</b>
					<span> Vân hồng</span>
				</p>
				<p>
					<b>Kích thước:</b>
					<span> 2 x 1.3 m</span>
				</p>
				<p>
					<b>Ứng dụng :</b>
					<span> Tranh đá</span>
				</p>
			</div>
			<div class="button">
				<div class="dang-ky">
					<h3>Đăng ký mua</h3>
					<p>Tư vấn miễn phí</p>
				</div>
				<div class="hen-lich">
					<h3>Hẹn lịch đến xem</h3>
					<p>Có chỗ để xe miễn phí</p>
				</div>
				<div class="bao-gia">
					<h3>Yêu cầu báo giá</h3>
					<p>Được tư vấn và báo giá tốt nhất</p>
				</div>
				<p class="work">Giờ làm việc: 8h00 - 17:00</p>
			</div>
			<div class="he-thong">
				<h3>HỆ THỐNG SHOWROOM ALVA</h3>
				<p>
					<img src="public/image/location-red.svg" alt="Đá xuyên sáng tự nhiên Alva" />
					<span>Hải Phòng : Số 9 lô 6 PG An Đồng, An Dương</span>
				</p>
				<p>
					<img src="public/image/location-red.svg" alt="Đá xuyên sáng tự nhiên Alva" />
					<span>Hà Nội: Shop House NT06 - 200 Vinhome Ocean Park Gia Lâm</span>
				</p>
				<p>
					<img src="public/image/location-red.svg" alt="Đá xuyên sáng tự nhiên Alva" />
					<span>Kho đá: Anh Dũng, Dương Kinh, Hải Phòng</span>
				</p>
			</div>
			<div class="social">
				<p>
					<img src="public/image/mes.png" alt="Liên hệ Alva"/>
					<a href="">Chat Facebook</a>
				</p>
				<p>
					<img src="public/image/zalo.png" alt="Liên hệ Alva"/>
					<a href="">Chat Zalo</a>
				</p>
			</div>
		</div>

		<div class="tong-quan">
			<div class="tab">
				<ul>
					<li class="active">PHỐI CẢNH VÂN ĐÁ</li>
					<li>ẢNH THỰC TẾ THI CÔNG</li>
					<li>MÔ TẢ</li>
					<li>HƯỚNG DẪN MUA HÀNG</li>
				</ul>
			</div>
			<article>
				<div class="child">
					<ul>
						<li class="active"><span>Tranh đá ban ngày</span></li>
						<li><span>Tranh đá ban đêm</span></li>
						<li><span>Lát sàn</span></li>
						<li><span>Cầu thang</span></li>
					</ul>
				</div>
				<div class="load">
					<div class="phoi-canh owl-carousel owl-theme">
						<img class="owl-lazy" data-src="uploads/van-da/tt0.png" />
						<img class="owl-lazy" data-src="uploads/van-da/tt1.png" />
					</div>
				</div>
			</article>
		</div>

		<div class="nhan-bao-gia">
			<div class="picture">
				<img class="lazy" data-src="uploads/van-da/tt0.png" />
			</div>
			<div class="form">
				<div class="tit">
					<h2>Nhận báo giá</h2>
					<p>Được tư vấn và báo giá tốt nhất</p>
				</div>
				<form>
					<input type="text" name="ten" placeholder="Tên khách" spellcheck="false" autocomplete="off" />
					<input type="text" name="dienthoai" placeholder="Điện thoại" spellcheck="false" autocomplete="off" />
					<textarea name="noidung" placeholder="Lời nhắn" spellcheck="false" autocomplete="off"></textarea>
					<input type="button" name="baogia" value="Gửi yêu cầu"/>
				</form>
			</div>
		</div>
	</section>

	<section class="right-pro">
		<div class="ban-buon">DÀNH CHO BÁN BUÔN</div>
		<div class="hop-tac">
			<h2>BÁN CÙNG ALVA</h2>
			<ul>
				<li>
					<b>Khách cũ giới thiệu khách mới</b>
					Nhận chiết khấu % lợi nhuận
				</li>
				<li>
					<b>Dành cho cộng tác viên</b>
					Giới thiệu khách & nhận hoa hồng
				</li>
				<li>
					<b>Nhà thiết kế nội thất, kiến trúc sư</b>
					Đưa khách đến mua thưởng phần trăm doanh thu
				</li>
			</ul>
		</div>
		<div class="ho-tro">
			<ul>
				<li>
					<h2>TƯ VẤN 24/7</h2>
					<p>Hotline: <a href="tel:07 6669 8883">07 6669 8883</a></p>
				</li>
				<li>
					<h2>HỖ TRỢ THI CÔNG</h2>
					<p>Chất lượng thi công cao</p>
				</li>
				<li>
					<h2>BẢO HÀNH TẬN NƠI</h2>
					<p>Nhanh chóng và đảm bảo</p>
				</li>
				<li>
					<h2>PHỐI CẢNH THIẾT KẾ 3D</h2>
					<p>Miễn phí</p>
				</li>
			</ul>
		</div>
		<div class="lien-quan">
			<h2>Sản phẩm mới</h2>
			<ul>
				<?php for ($i=0; $i < 5; $i++) { ?>
				<li>
					<div class="picture">
						<a href=""><img class="lazy" data-src="uploads/van-da/tt0.png" /></a>
					</div>
					<div class="text">
						<h3><a href="">ĐÁ NGỌC TỰ NHIÊN XUYÊN SÁNG AVB11</a></h3>
					</div>
				</li><?php } ?>
			</ul>
		</div>
	</section>

	<section class="tin-tuc">
		<ul class="owl-carousel owl-theme">
			<?php 
			for ($i=0; $i < 10; $i++) 
			{
				echo '<li>';
					echo '<div class="picture">';
						echo '<a href="link"><img class="lazy" src="uploads/lazy/tin.svg" data-src="uploads/tin-tuc/2021-06-19-13-46-43vuong.jpg" alt="Ten" /></a>';
					echo '</div>';
					echo '<div class="text">';
						echo '<h3><a href="link">Chào mừng bạn đến với ngôn ngữ lập trình PHP</a></h3>';
						echo '<p class="intro">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
						echo '<p class="time">22/03/2022</p>';
					echo '</div>';
				echo '</li>';
			}
			?>
		</ul>
	</section>
</main>
<script>
	$(".slide").owlCarousel({
      	dots: true,
      	items:1,
		lazyLoad: true
  	});
  	$(".phoi-canh").owlCarousel({
      	dots: true,
      	items:1,
		lazyLoad: true,
		autoHeight: true
  	});
  	$(".tin-tuc ul").owlCarousel({
		nav: true,
		lazyLoad: true,
		items: 3,
		dots: true,
		margin: 25,
		navText:["<img src='public/image/left.svg'>", "<img src='public/image/right.svg'>"]
	});
</script>