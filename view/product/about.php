
<link rel="stylesheet" type="text/css" href="public/css/pro-about.css?v151021" />

<section class="gioi-thieu">
	<h1>Đá tự nhiên Alva <span>-</span><br> Viên ngọc quý đến từ thiên nhiên</h1>
</section>

<section class="slideshow">
	<div class="owl-carousel owl-theme thuvien loop"></div>
</section>

<section class="marble">
	<div class="wrap">
		<div class="picture">
			<img src="public/image/marble/pro-large.png" align="Đá xuyên sáng tự nhiên Alva" />
		</div>
		<div class="text-slide">
			<div class="text">
				<h2>ĐÁ TỰ NHIÊN XUYÊN SÁNG ALVA</h2>
				
				<p>Đá Marble – thạch anh tự nhiên xuyên sáng của ALVA là sự kết hợp giữa đá cẩm thạch và thạch anh có khả năng xuyên sáng được khai thác từ mỏ đá của công ty tại Lục Yên – Yên Bái. Với rất nhiều các loại vân đá khác nhau. Mỗi một blog lại cho ra một loại vân đá tự nhiên, màu sắc tươi tắn hơn bất kỳ loại đá nào hiện nay</p>
				
				<p>Mỗi một tấm đá được cắt ra là duy nhất, không trộn lẫn vì chất vân có một không hai. Chất vân tự nhiên trên từng phiến đá lúc mềm mại như những nét chấm phá trong bức tranh thủy mặc, lúc quyến rũ như một dòng sông, khi lại có hình thù độc đáo trừu tượng</p>
			</div>
			<div class="slide xuyen-sang owl-carousel owl-theme">
				<img class="item owl-lazy" data-src="uploads/pro-marble/1.jpg" alt="Đá xuyên sáng tự nhiên Alva"/>
		        <img class="item owl-lazy" data-src="uploads/pro-marble/2.jpg" alt="Đá xuyên sáng tự nhiên Alva"/>
		        <img class="item owl-lazy" data-src="uploads/pro-marble/3.jpg" alt="Đá xuyên sáng tự nhiên Alva"/>
			</div>
		</div>
	</div>
</section>

<section class="den-tia-chop">
	<div class="wrap">
		<div class="picture">
			<img src="public/image/den-tia-chop/pro-large.png" align="Đá xuyên sáng tự nhiên Alva" />
		</div>
		<div class="text-slide">
			<div class="text">
				<h2>ĐÁ ĐEN TIA CHỚP ALVA</h2>
				<p>Đá Marble Đen tia chớp hay gọi là đá Đen tia chớp, là loại đá tự nhiên với sự kết hợp giữa màu đen huyền bí của bầu trời đêm và các đường vân trắng mạnh mẽ như những tia chớp sáng rực. Sự kết hợp tinh tế này khiến mọi không gian trở nên cuốn hút, độc đáo và tràn đầy năng lượng. Hiện nay, đá đen tia chớp là một trong những sự lựa chọn hàng đầu cho mọi công trình kiến trúc từ cổ điển đến hiện đại mang đến sự sang trọng bậc nhất</p>
			</div>
			<div class="slide slide-tia-chop owl-carousel owl-theme">
				<img class="item owl-lazy" data-src="uploads/pro-den-tia-chop/1.jpg" alt="Đá đen tia chớp" />
		        <img class="item owl-lazy" data-src="uploads/pro-den-tia-chop/2.jpg" alt="Đá đen tia chớp" />
		        <img class="item owl-lazy" data-src="uploads/pro-den-tia-chop/3.jpg" alt="Đá đen tia chớp" />
			</div>
		</div>
	</div>
</section>

<section class="muoi-trang">
	<div class="wrap">
		<div class="picture">
			<img src="public/image/muoi-trang/pro-large.png" align="Đá xuyên sáng tự nhiên Alva" />
		</div>
		<div class="text-slide">
			<div class="text">
				<h2>ĐÁ TRẮNG MUỐI ALVA</h2>
				
				<p>Đá marble Trắng Muối còn gọi là đá trắng muối tự nhiên là một loại đá vôi biến thể, được tạo thành trong quá trình kiến tạo của vỏ trái đất. Đá marble Trắng Muối  của ALVA được khai thác tại mỏ đá thuộc tỉnh Yên Bái nước ta. Đá có hai loại là đá trắng muối có vân và đá trắng muối không có vân. Đá có màu trắng tinh tế dễ dàng phối màu với các loại đá hoa cương khác. Có độ bền cao, khả năng chịu nhiệt, chống trầy xước, chống thấm, dễ dàng vệ sinh với bề mặt nhẵn, bóng nên được sử dụng trong ốp lát mặt tiền, cầu thang, mặt bàn bếp, ốp tường, bàn quầy bar....</p>
			</div>
			<div class="slide slide-muoi-trang owl-carousel owl-theme">
				<img class="item owl-lazy" data-src="uploads/pro-muoi-trang/1.jpg" alt="Đá trắng muối" />
		        <img class="item owl-lazy" data-src="uploads/pro-muoi-trang/2.jpg" alt="Đá trắng muối" />
		        <img class="item owl-lazy" data-src="uploads/pro-muoi-trang/3.jpg" alt="Đá trắng muối" />
		        <img class="item owl-lazy" data-src="uploads/pro-muoi-trang/4.jpg" alt="Đá trắng muối" />
			</div>
		</div>
	</div>
</section>

<script>
	function Catalog(json)
	{
		let data = '';
		$.each(json, function(key, item){
			data +=`<img class="item owl-lazy" data-src="uploads/catalog/${item.hinh}" alt="${item.ten}" />`;
		});
		return data;
	}
	
	$(document).ready(function(){
		$.getJSON('api/catalog/list.php', function (data) {
		    $(".thuvien").html(Catalog(data));
		    if($(document).width() >= 1200)
			{
				$('.loop').on('initialized.owl.carousel translate.owl.carousel', function(e) {
			        idx = e.item.index;
			        $('.owl-item.big').removeClass('big');
			        $('.owl-item.medium').removeClass('medium');
			        $('.owl-item').eq(idx).addClass('big');
			        $('.owl-item').eq(idx - 1).addClass('medium');
			        $('.owl-item').eq(idx + 1).addClass('medium');
			    });
				var sync2 = $(".thuvien");
				$(sync2).owlCarousel({
				    nav: true,
				    navText: ["<img src='public/image/doi-tac/left.svg'>", "<img src='public/image/doi-tac/right.svg'>"],
				    loop: true,
				    items: 4,
				    center: true,
				    linked: sync2.prev(),
				    autoplay: true,
				    autoplayTimeout: 2000,
				    autoplayHoverPause: true,
				    lazyLoad: true,
				    autoHeight: true
				}).on('initialized.owl.carousel linked.to.owl.carousel', function() {
				    sync2.find('.owl-item.current').removeClass('current');
				    var current = sync2.find('.owl-item.active.center').length ? sync2.find('.owl-item.active.center') : sync2.find('.owl-item.active').eq(0);
				    current.addClass('current');
				});
			}
			else
			{
				$(".thuvien").owlCarousel({
					stagePadding: 70,
					loop:true,
					nav: true,
					navText:["<img src='public/image/doi-tac/left.svg'>", "<img src='public/image/doi-tac/right.svg'>"],
					dots: false,
					items:1,
					lazyLoad: true,
					autoHeight: true
				});
			}
		});
		if($(document).width() >= 1200)
		{
			$(".xuyen-sang").owlCarousel({
				margin:30,
				loop:true,
				nav: true,
				navText:["<img src='public/image/doi-tac/left.svg'>", "<img src='public/image/doi-tac/right.svg'>"],
				dots: true,
				items:3,
				lazyLoad: true
			});
			$(".slide-tia-chop").owlCarousel({
				margin:30,
				loop:true,
				nav: true,
				navText:["<img src='public/image/doi-tac/left.svg'>", "<img src='public/image/doi-tac/right.svg'>"],
				dots: true,
				items:3,
				lazyLoad: true
			});
			$(".slide-muoi-trang").owlCarousel({
				margin:30,
				loop:true,
				nav: true,
				navText:["<img src='public/image/doi-tac/left.svg'>", "<img src='public/image/doi-tac/right.svg'>"],
				dots: true,
				items:3,
				lazyLoad: true
			});
		}
		else
		{
			$(".xuyen-sang").owlCarousel({
				stagePadding: 50,
				margin:10,
				loop:true,
				nav: true,
				navText:["<img src='public/image/doi-tac/left.svg'>", "<img src='public/image/doi-tac/right.svg'>"],
				dots: true,
				items:1,
				lazyLoad: true
			});
			$(".slide-tia-chop").owlCarousel({
				stagePadding: 50,
				margin:10,
				loop:true,
				nav: true,
				navText:["<img src='public/image/doi-tac/left.svg'>", "<img src='public/image/doi-tac/right.svg'>"],
				dots: true,
				items:1,
				lazyLoad: true
			});
			$(".slide-muoi-trang").owlCarousel({
				stagePadding: 50,
				margin:10,
				loop:true,
				nav: true,
				navText:["<img src='public/image/doi-tac/left.svg'>", "<img src='public/image/doi-tac/right.svg'>"],
				dots: true,
				items:1,
				lazyLoad: true
			});
		}
	});
</script>