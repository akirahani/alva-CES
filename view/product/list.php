
<link rel="stylesheet" type="text/css" href="public/css/product.css?v=071221" />

<section class="banner">
	<div class="slide owl-carousel">
		<img class="owl-lazy" data-src="uploads/danh-muc/1.png" alt=""/>
		<img class="owl-lazy" data-src="uploads/danh-muc/2.png" alt=""/>
		<img class="owl-lazy" data-src="uploads/danh-muc/3.png" alt=""/>
	</div>
</section>

<section class="danh-muc">
	<ul>
		<li class="active"><a href="">Tranh đá</a></li>
		<li><a href="">Đá ốp lát</a></li>
		<li><a href="">Trụ đá</a></li>
		<li><a href="">Lavabo</a></li>
	</ul>
</section>

<section class="thong-tin">
	<div class="so-luong"><p><?=$number_vanda?> mẫu đá</p></div>
	<div class="dac-tinh">
		<ul>
			<li>Vân trắng</li>
			<li>Vân trắng</li>
			<li>Vân trắng</li>
			<li>Vân trắng</li>
			<li>Vân trắng</li>
			<li>Vân trắng</li>
		</ul>
	</div>
	<div class="sap-xep">
		<p class="sap-xep">Sắp xếp</p>
		<ul>
			<li>Mới nhất</li>
			<li>Bán chạy</li>
		</ul>
	</div>
</section>

<section class="san-pham">
	<ul>
		<?php 
		foreach ($data_dadanhmuc as $key => $value) 
		{
			$id_vanda = $value->da;
			$get_vanda = $arr_vanda[$id_vanda];
			$arr_hinh = json_decode($get_vanda->vuong);
			$str_hinh = "dm-".$id_danhmuc;
		?>

		<li>
			<a href="<?=$ps."/".$get_vanda->slug?>"><img class="lazy" src="uploads/lazy/da.svg" data-src="uploads/van-da/<?=$arr_hinh->$str_hinh?>" alt="Đá Ngọc Tự Nhiên Xuyên Sáng AT22" style=""></a>
			<h2 class="title"><a href="<?=$ps."/".$get_vanda->slug?>"><?=$get_vanda->ten?></a></h2>
			<?=$get_vanda->gioithieu?>
		</li>
		<?php } ?>

	</ul>
</section>

<script>
	$(".banner .slide").owlCarousel({
		nav: false,
		lazyLoad: true,
		dots: false,
		responsive:{
			0:{
				items: 1
			},
			1200:{
				items: 3,
				margin: 7
			}
		}
	});
	function Filter(cate, loai, thongso)
	{
		let data = '';
		if($(document).width()<1200)
		{
			data += `<ul>`;
			$.each(cate, function(key, item){
				data+=`<li id="${item.id}" choose="no">${item.ten}</li>`;
			});
			data += `</ul>`;
			data += `<div class="sub-filter"></div>`;
			data += `<div class="clear"></div>`;
			data += `<div class="load-thongso"></div>`;
			data += `<div class="clear"></div>`;
		}
		else
		{
			let thongsoArr = [];
			if(localStorage.thongsoRecord)
			{
				let thongso_tmp=JSON.parse(localStorage.thongsoRecord);
				for (let i = 0; i < thongso_tmp.length; i++) 
				{
					thongsoArr.push( thongso_tmp[i].id );
				}
			}
			data += `<ul>`;
			$.each(cate, function(key, item){
				data += `<li>`;
					data += `<h2>${item.ten}</h2>`;
					$.each(item.loai, function(key1, item1){
						data += `<p>${loai[item1]}</p>`;
						$.each(thongso, function(key2,item2){
							if(item2.danhmuc == item.id && item2.loai == item1)
							{
								if(thongsoArr.includes(key2))
								{
									data += `<span class="chon-thong-so active cts-${key2}" danhmuc="${item2.danhmuc}" loai="${item2.loai}" thongso="${key2}" choose="yes"><img class="cts-${key2}" danhmuc="${item2.danhmuc}" loai="${item2.loai}" thongso="${key2}" choose="yes" src="public/image/product/checked.svg" /> ${item2.ten}</span>`;
								}
								else
								{
									data += `<span class="chon-thong-so cts-${key2}" danhmuc="${item2.danhmuc}" loai="${item2.loai}" thongso="${key2}" choose="no"><img class="cts-${key2}" danhmuc="${item2.danhmuc}" loai="${item2.loai}" thongso="${key2}" choose="no" src="public/image/product/check-gray.svg" /> ${item2.ten}</span>`;
								}
							}
						});
					});
				data += `</li>`;
			});
			data +=`</ul>`;
		}
		return data;
	}

	function Product(json)
	{
		let data = '';
		$.each(json, function(key, item){
			// Xử lý hình ảnh mới
			let obj_pic = JSON.parse(item.hinh);
			let pic = '';
			$.each(obj_pic, function(keyp, itemp){
				if(itemp != null)
				{
					pic = itemp;
				}
			});
			// Xử lý hình ảnh mới
			data +=`<li>
				<a href="da-xuyen-sang/${item.slug}"><img class="lazy" src="uploads/lazy/vuong.svg" data-src="uploads/van-da/${pic}" alt="${item.ten}" /></a>
				<h2 class="title"><a href="da-xuyen-sang/${item.slug}">${item.ten}</a></h2>
				${item.gioithieu}
			</li>`;
		});
		return data;
	}

	function DuAn(json)
	{
		let data = '';
		if($(document).width()<1200)
		{
			$.each(json, function(key, item){
				if(key<4)
				{
					data+=`
					<li>
						<img class="view-project lazy" duan="${item.id}" src="uploads/lazy/vuong.svg" data-src="uploads/du-an/${item.hinh}" align="${item.ten}" />
					</li>`;
				}
				
			});
		}
		else
		{
			$.each(json, function(key, item){
				if(key<5)
				{
					data+=`
					<li>
						<img class="view-project lazy" duan="${item.id}" src="uploads/lazy/vuong.svg" data-src="uploads/du-an/${item.hinh}" align="${item.ten}" />
					</li>`;
				}
				
			});
		}
		return data;
	}

	$(document).ready(function(){
		$.getJSON('api/san-pham/list.php', function (data) {
			$(".filter").html(Filter(data.danhmuc, data.loai, data.thongso));

			$(".filter ul li").click(function(){
				let choose = $(this).attr("choose");
				let id = $(this).attr("id");
				if(localStorage.thongsoRecord)
				{
					localStorage.removeItem("danhmuc");
					localStorage.removeItem("loai");
					localStorage.removeItem("thongsoRecord");
				}
				if($(document).width()<1200)
				{
					if(choose == "yes")
					{
						$(".filter ul li").attr("choose", "no");
						$(".filter ul li").removeAttr("class");
						$(this).attr("choose", "no");
						$(".sub-filter").hide();
						$(".load-thongso").html('');
					}
					else
					{
						$(".filter ul li").attr("choose", "no");
						$(this).attr("choose", "yes");
						$(".filter ul li").removeAttr("class");
						$(this).addClass("active");
						$.ajax({
							method: "POST",
							data: {id:id},
							url: "view/product/ajax-load-loai.php",
							success:function(dulieu)
							{
								let view = '';
								let info = JSON.parse(dulieu);
								$.each(info, function(key, item){
									view += `<span class="chon-mau-da" danhmuc="${id}" loai="${item.id}" choose="no">${item.ten}</span>`;
								});
								$(".sub-filter").html(view);
								$(".sub-filter").show();
								$(".load-thongso").html('');
							}
						});
					}
				}
			});
			// if(data.vanda.length > 8)
			// {
			// 	$(".product").append(`
			// 		<div class="load-more">
			// 			<span>Xem thêm 8 mẫu đá</span>
			// 		</div>
			// 	`);
			// }
			if(localStorage.thongsoRecord)
			{		
				$.ajax({
					method : "POST",
					data: {
						danhmuc: 		localStorage.danhmuc, 
		        		loai: 			localStorage.loai,
						thongso: 		localStorage.thongsoRecord
					},
					url: "view/filter/load.php",
					success: function(dulieu)
					{
						let info = JSON.parse(dulieu);
						$(".filter ul li#"+info.danhmuc).attr("choose", "yes");
						$(".filter ul li#"+info.danhmuc).attr("class", "active");
						let loaiview = '';
						$.each(info.loai, function(key, item)
						{
							if(item.id == info.loaiactive)
							{
								loaiview += `<span class="chon-mau-da active" danhmuc="${info.danhmuc}" loai="${item.id}" choose="yes">${item.ten}</span>`;
							}
							else
							{
								loaiview += `<span class="chon-mau-da" danhmuc="${info.danhmuc}" loai="${item.id}" choose="no">${item.ten}</span>`;
							}
						});
						$(".sub-filter").html(loaiview);
						let thongsoview = '';
						thongsoview += '<div class="wrap">';
						$.each(info.thongso, function(key1, item1){
							if(info.thongsosave.includes(item1.id))
							{
								thongsoview += `<span>`;
									thongsoview += `<img class="chon-thong-so active cts-${item1.id}" thongso="${item1.id}" src="public/image/product/checked.png" choose="yes" danhmuc="${info.danhmuc}" loai="${item1.loai}">`;
									thongsoview += `<label class="chon-thong-so active cts-${item1.id}" thongso="${item1.id}" choose="yes" danhmuc="${info.danhmuc}" loai="${item1.loai}">${item1.ten}</label>`;
								thongsoview += `</span>`;
							}
							else
							{
								thongsoview += `<span>`;
									thongsoview += `<img class="chon-thong-so cts-${item1.id}" thongso="${item1.id}" src="public/image/product/check-gray.png" choose="no" danhmuc="${info.danhmuc}" loai="${item1.loai}">`;
									thongsoview += `<label class="chon-thong-so cts-${item1.id}" thongso="${item1.id}" choose="no" danhmuc="${info.danhmuc}" loai="${item1.loai}">${item1.ten}</label>`;
								thongsoview += `</span>`;
							}
						});
						thongsoview += '</div>';
						$(".load-thongso").html(thongsoview);
						let daview = '';
						$.each(info.da, function(key2, item2){
							// Xử lý hình ảnh mới
							let obj_pic = JSON.parse(item2.vuong);
							let pic = '';
							$.each(obj_pic, function(keyp, itemp){
								if(itemp != null)
								{
									pic = itemp;
								}
							});
							// Xử lý hình ảnh mới
							daview +=`<li>`;
								daview +=`<a href="da-xuyen-sang/${item2.slug}"><img class="lazy" src="uploads/lazy/vuong.svg" data-src="uploads/van-da/${pic}" alt="${item2.ten}"></a>`;
								daview +=`<h2 class="title"><a href="da-xuyen-sang/${item2.slug}">${item2.ten}</a></h2>`;
								daview +=`${item2.gioithieu}`;
							daview +=`</li>`;
						});
						$(".product ul").html(daview);
						$('.lazy').Lazy();
					}
				});
			}
			else
			{
				$(".product ul").html(Product(data.vanda));
			}

			$(".du-an ul").html(DuAn(data.duan));
			$('.lazy').Lazy();
		});

		$(".keyword").keyup(function(){
			let keyword = $(this).val();
			if(keyword.length != '')
			{
				$.ajax({
					method: "POST",
					data: {keyword:keyword},
					url: "view/product/ajax-search.php",
					success:function(dulieu)
					{
						$(".load-timkiem").show();
						$(".load-timkiem ul").html(dulieu);
					}
				});
			}
			else
			{
				$(".load-timkiem").hide();
				$(".load-timkiem ul").html('');
			}
		});
	});

	$(document).on("click", ".view-project", function(){
		let idduan = $(this).attr("duan");
		$.ajax({
			method: "POST",
			data: {duan:idduan},
			url: "view/du-an/ajax.php",
			success:function(dulieu)
			{
				$('#photobook').show();
				$('#photobook').html(dulieu);
			}
		});
  	});

  	$(document).on("click", ".chon-mau-da", function(){
  		let danhmuc = $(this).attr("danhmuc");
  		let loai = $(this).attr("loai");
  		let choose = $(this).attr("choose");
  		if(localStorage.thongsoRecord)
		{
			localStorage.removeItem("danhmuc");
			localStorage.removeItem("loai");
			localStorage.removeItem("thongsoRecord");
		}
		if (choose == "no")
        {
        	$(".sub-filter span").removeClass("active");
        	$(".sub-filter span").attr("choose", "no");
        	$(this).attr("choose", "yes");
        	$(this).addClass("active");
        	$.ajax({
	  			method: "POST",
				data: {danhmuc:danhmuc, loai:loai},
				url: "view/product/ajax-danh-muc-loai.php",
				success:function(dulieu)
				{
					$(".load-thongso").html(dulieu)
				}
	  		});
        }
        else
        {
        	$(".sub-filter span").removeClass("active");
        	$(".sub-filter span").attr("choose", "no");
        	$(this).attr("choose", "no");
        	$(this).removeClass("active");
        	$(".load-thongso").html('');
        }
  	});

  	function removeItemChecked(arr,id)
	{
		for (var i = arr.length - 1; i >= 0; i--) {
        	if(arr[i].id==id)
        	{
        		arr.splice(i, 1);
        	}
        }
	}

	$(document).on("click", ".chon-thong-so", function(){
		let thongsoArr=[];
        let choose = $(this).attr("choose");
        let id_danhmuc = parseInt($(this).attr("danhmuc"));
        let id_loai = $(this).attr("loai");
        let id_thongso = $(this).attr("thongso");
        localStorage.danhmuc = id_danhmuc;
        localStorage.loai = id_loai;
        //Reset value and attribute - Process code add new
        $(".chon-thong-so").removeClass("active");
        $(".chon-thong-so").attr("choose", "no");
        $('.chon-thong-so img').attr("src", "public/image/product/check-gray.svg");
        $('.chon-thong-so').attr("src", "public/image/product/check.svg");
        $('.chon-thong-so img').attr("choose", "no");
        //Reset value and attribute - Process code add new
        localStorage.removeItem("thongsoRecord");
        if (choose == "no")
        {
            $('img.cts-'+id_thongso).attr("src", "public/image/product/checked.png");
            $('img.cts-'+id_thongso).attr("choose", "yes");
            $('label.cts-'+id_thongso).attr("choose", "yes");
            $('span.cts-'+id_thongso).attr("choose", "yes");
            if(localStorage.thongsoRecord)
            {
            	let thongso_tmp=JSON.parse(localStorage.thongsoRecord);
            	for (let i = 0; i < thongso_tmp.length; i++)
            	{
            		thongsoArr.push( {id:thongso_tmp[i].id} );
            	}
            	let thongsoObj={id:id_thongso};
            	thongsoArr.push(thongsoObj);
            }
            else
            {
            	let thongsoObj={id:id_thongso};
	    		thongsoArr.push(thongsoObj);
            }
	    	localStorage.thongsoRecord = JSON.stringify(thongsoArr);
        } 
        else 
        {
            $('img.cts-'+id_thongso).attr("src", "public/image/product/check-gray.svg");
            $('img.cts-'+id_thongso).attr("choose", "no");
            $('label.cts-'+id_thongso).attr("choose", "no");
            $('span.cts-'+id_thongso).attr("choose", "no");
            if(localStorage.thongsoRecord)
            {
            	let thongso_tmp=JSON.parse(localStorage.thongsoRecord);
				for (let i = 0; i < thongso_tmp.length; i++) 
				{
					thongsoArr.push( {id:thongso_tmp[i].id} );
				}
            }
            removeItemChecked(thongsoArr, id_thongso);
            localStorage.thongsoRecord = JSON.stringify(thongsoArr);
        }

        $.ajax({
        	method: "POST",
        	data: {
        		danhmuc: 	localStorage.danhmuc, 
        		loai: 		localStorage.loai, 
        		thongso: 	localStorage.thongsoRecord
        	},
        	url: "view/filter/list.php",
        	success: function(dulieu)
        	{
        		let info = JSON.parse(dulieu);
				let daview = '';
				$.each(info.da, function(key2, item2){
					// Xử lý hình ảnh mới
					let obj_pic = JSON.parse(item2.vuong);
					let str_cate = 'dm-'+localStorage.danhmuc;
					// Xử lý hình ảnh mới
					daview +=`<li>`;
						daview +=`<a href="da-xuyen-sang/${item2.slug}"><img class="lazy" src="uploads/lazy/vuong.svg" data-src="uploads/van-da/${obj_pic[str_cate]}" alt="${item2.ten}"></a>`;
						daview +=`<h2 class="title"><a href="da-xuyen-sang/${item2.slug}">${item2.ten}</a></h2>`;
						daview +=`${item2.gioithieu}`;
					daview +=`</li>`;
				});
        		$(".product ul").html(daview);
        		$(".lazy").Lazy();
        		var filter_height = $('.filter').height();
        		$("html, body").animate({
		            scrollTop: $(".product ul").offset().top - filter_height
		        }, 800);
        	}
        });
	});
</script>