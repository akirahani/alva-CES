<footer>
	<section class="wrap">
		<div class="logobot">
			<a href="./"><img src="public/image/logo.svg" alt="TitanStone" /></a>
		</div>

		<div class="menubot">
			<h2>THÔNG TIN AlVA</h2>
			<ul>
				<li><a href="ve-chung-toi">Giới thiệu</a></li>
				<li><a href="du-an">Dự án</a></li>
				<li><a href="tin-tuc">Tin tức</a></li>
				<li><a href="lien-he">Liên hệ</a></li>
				<li><a href="quy-dinh/chinh-sach-bao-hanh">Chính sách bảo hành</a></li>
				<li><a href="quy-dinh/chinh-sach-van-chuyen">Chính sách vận chuyển</a></li>
				<li><a href="quy-dinh/chinh-sach-mua-hang">Chính sách mua hàng</a></li>
			</ul>
		</div>

		<div class="lien-he">
			<h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
			<ul>
				<li><img src="public/image/tell.svg" alt="Đá xuyên sáng Alva"/><b>Hotline</b> : <?=$data_company->dienthoai?></li>
				<li><img src="public/image/email.svg" alt="Đá xuyên sáng Alva"/><b>Email</b> : <?=$data_company->email?></li>
				<li><img src="public/image/location.svg" alt="Đá xuyên sáng Alva"/><b>Địa chỉ</b> : <?=$data_company->diachi?></li>
				<li>
					<span><a href="<?=$data_company->facebook?>" target="_blank"><img src="public/image/home/facebook.svg" alt="Fanpage TitanStone" /></a></span>
					<span><a href="<?=$data_company->youtube?>" target="_blank"><img src="public/image/home/youtube.svg" alt="Youtube TitanStone" /></a></span>
				</li>
			</ul>
		</div>

		<div class="ban-do">
			<a href=""><img class="lazy" data-src="public/image/footer/map.png" alt="Đá xuyên sáng Alva"/>
				</a>
		</div>
	</section>
	<p class="copy"><span>&copy; Copyright <?=date("Y")?> by Công Ty TNHH ALVA</span></p>
</footer>

<div class="tong-dai">
	<div class="hotline-wrap">
		<div class="hotline-one"></div>
		<div class="hotline-three"><a href="tel:<?=$data_company->dienthoai?>">
			<svg class="phone-icon" viewBox="0 0 512 512">
				<path d="M439.44,411.595l-77.319-77.318c-9.299-9.298-24.374-9.298-33.672,0l-32.036,32.036c-62.811-35.428-115.3-87.917-150.728-150.728l34.21-34.21c9.299-9.298,9.299-24.374,0-33.672l-77.319-77.316c-9.299-9.298-24.374-9.298-33.672,0l-49.374,49.374l0.191,0.191C2.241,134.231-4.924,158.937,3.575,183.288C56.242,334.211,177.788,455.756,328.71,508.423c23.26,8.117,46.773,1.962,61.305-13.832l0.05,0.05l49.374-49.374C448.739,435.969,448.739,420.894,439.44,411.595z"/>
				<path d="M260.948,135.95c-9.271,0-16.787,7.516-16.787,16.787c0,9.271,7.515,16.787,16.787,16.787c44.954,0,81.528,36.573,81.528,81.527c0,9.271,7.516,16.787,16.787,16.787s16.787-7.516,16.787-16.787C376.05,187.585,324.415,135.95,260.948,135.95z"/>
				<path d="M260.948,67.591c-9.271,0-16.787,7.516-16.787,16.787c0,9.271,7.515,16.787,16.787,16.787c82.648,0,149.887,67.239,149.887,149.885c0,9.271,7.516,16.787,16.787,16.787c9.271,0,16.787-7.516,16.787-16.787C444.409,149.89,362.109,67.591,260.948,67.591z"/>
				<path d="M438.467,73.531C391.049,26.114,328.005,0,260.948,0c-9.271,0-16.787,7.516-16.787,16.787c0,9.271,7.516,16.787,16.787,16.787c119.916,0,217.477,97.559,217.477,217.477c0,9.271,7.516,16.787,16.787,16.787c9.271,0,16.787-7.516,16.787-16.787C511.999,183.992,485.885,120.948,438.467,73.531z"/>
			</svg>
		</a></div>
	</div>
</div>