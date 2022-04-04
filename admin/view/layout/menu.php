<nav data-scrollbar>
	<ul>
		<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="fal fa-map-marker-exclamation"></i>
		    	<span><?=__NAME__?></span>
		    </a>
		    <ul <?php if( in_array($p, ["info"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		      	<li <?php if($p == "info") echo 'class="active"';?>><a href="info">Info</a></li>
		    </ul>
	  	</li>

	  	<!-- Landing -->
	  	<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="fad fa-align-left"></i>
		    	<span>Landing</span>
		    </a>
		    <ul <?php if( in_array($p, ["landing", "them-landing", "sua-landing"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		      	<li <?php if(in_array($p, ["landing", "sua-landing"])) echo 'class="active"';?>><a href="landing">Danh sách</a></li>
		      	<li <?php if(in_array($p, ["them-landing"])) echo 'class="active"';?>><a href="landing/add">Thêm mới</a></li>
		    </ul>
	  	</li>

	  	<!-- Banner -->
	  	<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="fal fa-image"></i>
		    	<span>Banner</span>
		    </a>
		    <ul <?php if( in_array($p, ["banner", "them-banner", "sua-banner"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		      	<li <?php if(in_array($p, ["banner", "sua-banner"])) echo 'class="active"';?>><a href="banner">Danh sách</a></li>
		      	<li <?php if(in_array($p, ["them-banner"])) echo 'class="active"';?>><a href="banner/add">Thêm mới</a></li>
		    </ul>
	  	</li>

	  	<!-- Catalog -->
	  	<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="fal fa-album-collection"></i>
		    	<span>Catalog</span>
		    </a>
		    <ul <?php if( in_array($p, ["catalog", "them-catalog", "sua-catalog"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		      	<li <?php if(in_array($p, ["catalog", "sua-catalog"])) echo 'class="active"';?>><a href="catalog">Danh sách</a></li>
		      	<li <?php if(in_array($p, ["them-catalog"])) echo 'class="active"';?>><a href="catalog/add">Thêm mới</a></li>
		    </ul>
	  	</li>

	  	<!-- Dự án -->
	  	<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="far fa-tasks-alt"></i>
		    	<span>Dự án</span>
		    </a>
		    <ul <?php if( in_array($p, ["du-an", "them-du-an", "sua-du-an"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		      	<li <?php if(in_array($p, ["du-an", "sua-du-an"])) echo 'class="active"';?>><a href="du-an">Danh sách</a></li>
		      	<li <?php if(in_array($p, ["them-du-an"])) echo 'class="active"';?>><a href="du-an/add">Thêm mới</a></li>
		    </ul>
	  	</li>

		<!-- Đối tác -->
	  	<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="fad fa-handshake"></i>
		    	<span>Đối tác</span>
		    </a>
		    <ul <?php if( in_array($p, ["doi-tac", "them-doi-tac", "sua-doi-tac"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		      	<li <?php if(in_array($p, ["doi-tac", "sua-doi-tac"])) echo 'class="active"';?>><a href="doi-tac">Danh sách</a></li>
		      	<li <?php if(in_array($p, ["them-doi-tac"])) echo 'class="active"';?>><a href="doi-tac/add">Thêm mới</a></li>
		    </ul>
	  	</li>

	  	<!-- Đại lý -->
	  	<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="far fa-mountains"></i>
		    	<span>Đại lý</span>
		    </a>
		    <ul <?php if( in_array($p, ["vung-mien", "them-vung-mien", "sua-vung-mien", "tinh-thanh", "them-tinh-thanh", "sua-tinh-thanh", "dai-ly", "them-dai-ly", "sua-dai-ly"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		    	<li <?php if(in_array($p, ["vung-mien", "them-vung-mien", "sua-vung-mien"])) echo 'class="active"';?>><a href="vung-mien">Vùng miền</a></li>
		    	<li <?php if(in_array($p, ["tinh-thanh", "them-tinh-thanh", "sua-tinh-thanh"])) echo 'class="active"';?>><a href="tinh-thanh">Tỉnh thành</a></li>
		    	<li <?php if(in_array($p, ["dai-ly", "them-dai-ly", "sua-dai-ly"])) echo 'class="active"';?>><a href="dai-ly">Đại lý</a></li>
		    </ul>
	  	</li>
	  	
	  	<!-- Sản phẩm -->
	  	<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="fab fa-product-hunt"></i>
		    	<span>Sản phẩm</span>
		    </a>
		    <ul <?php if( in_array($p, ["danh-muc", "them-danh-muc", "cap-nhat-danh-muc", "loai", "them-loai", "cap-nhat-loai", "da", "them-da", "cap-nhat-da", "thong-so", "them-thong-so", "sua-thong-so", "banner-danh-muc"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		      	<li <?php if($p == "danh-muc") echo 'class="active"';?>><a href="danh-muc">Danh mục</a></li>
		      	<li <?php if($p == "loai") echo 'class="active"';?>><a href="loai">Phân loại</a></li>
		      	<li <?php if($p == "thong-so") echo 'class="active"';?>><a href="thong-so">Thông số</a></li>
		      	<li <?php if($p == "da") echo 'class="active"';?>><a href="da">Đá tự nhiên</a></li>
		      	<li <?php if($p == "banner-danh-muc") echo 'class="active"';?>><a href="banner-danh-muc">Banner</a></li>
		    </ul>
	  	</li>

	  	<!-- Tin tức -->
	  	<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="fal fa-newspaper"></i>
		    	<span>Tin tức</span>
		    </a>
		    <ul <?php if( in_array($p, ["tin", "them-tin", "sua-tin", "loai-tin", "them-loai-tin", "sua-loai-tin"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		      	<li <?php if(in_array($p, ["loai-tin", "them-loai-tin", "sua-loai-tin"])) echo 'class="active"';?>><a href="loai-tin">Loại tin</a></li>
		      	<li <?php if(in_array($p, ["tin", "them-tin", "sua-tin"])) echo 'class="active"';?>><a href="tin-tuc">Danh sách</a></li>
		    </ul>
	  	</li>

	  	<!-- Tuyển dụng -->
	  	<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="far fa-user-md"></i>
		    	<span>Tuyển dụng</span>
		    </a>
		    <ul <?php if( in_array($p, ["tuyen-dung", "them-tuyen-dung", "sua-tuyen-dung"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		      	<li <?php if(in_array($p, ["tuyen-dung", "sua-tuyen-dung"])) echo 'class="active"';?>><a href="tuyen-dung">Danh sách</a></li>
		      	<li <?php if(in_array($p, ["them-tuyen-dung"])) echo 'class="active"';?>><a href="tuyen-dung/add">Thêm mới</a></li>
		    </ul>
	  	</li>

	  	<!-- Chính sách -->
	  	<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="fas fa-books-medical"></i>
		    	<span>Chính sách</span>
		    </a>
		    <ul <?php if( in_array($p, ["chinh-sach", "them-chinh-sach", "sua-chinh-sach"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		      	<li <?php if(in_array($p, ["chinh-sach", "sua-chinh-sach"])) echo 'class="active"';?>><a href="chinh-sach">Danh sách</a></li>
		      	<li <?php if(in_array($p, ["them-chinh-sach"])) echo 'class="active"';?>><a href="chinh-sach/add">Thêm mới</a></li>
		    </ul>
	  	</li>

	  	<!-- Đơn hàng + lý do hủy -->
	  	<li class="child-one">
			<a class="toggle" href="#">
		    	<i class="fal fa-cart-plus"></i>
		    	<span>Đơn hàng</span>
		    </a>
			<ul <?php if( in_array($p, ["don-moi", "don-dang-goi", "don-chuan-bi-giao", "don-hoan-thanh", "don-huy", "ly-do-huy", "chot-don", "them-ly-do", "sua-ly-do"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
				<li <?php if($p=="don-moi") echo 'class="active"'?>><a href="don-moi">Đơn mới</a></li>
				<li <?php if($p=="don-dang-goi") echo 'class="active"'?>><a href="don-dang-goi">Đơn đang gọi</a></li>
				<li <?php if($p=="don-chuan-bi-giao") echo 'class="active"'?>><a href="don-chuan-bi-giao">Đơn đang đóng gói</a></li>
				<li <?php if($p=="don-hoan-thanh") echo 'class="active"'?>><a href="don-hoan-thanh">Đơn đã giao</a></li>
				<li <?php if($p=="don-huy") echo 'class="active"'?>><a href="don-huy">Đơn hủy</a></li>
				<li <?php if($p=="ly-do-huy") echo 'class="active"'?>><a href="ly-do-huy">Lý do hủy đơn</a></li>
			</ul>
		</li>
		
        <!-- Tài khoản -->
        <li class="child-one">
            <a class="toggle" href="#">
                <i class="fas fa-users"></i>
                <span>Thành viên</span>
            </a>
            <ul <?php if( in_array($p, ["tai-khoan-thanh-vien", "them-tai-khoan", "cap-nhat-tai-khoan", "reset-mat-khau"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
                <li <?php if($p == "tai-khoan-thanh-vien") echo 'class="active"';?>><a href="thanh-vien">Tài khoản</a></li>
            </ul>
        </li>
		
		<!-- Tên miền -->
	  	<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="fas fa-globe-americas"></i>
		    	<span>Tên miền</span>
		    </a>
		    <ul <?php if( in_array($p, ["ten-mien", "them-ten-mien", "sua-ten-mien"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		      	<li <?php if(in_array($p, ["ten-mien", "sua-ten-mien"])) echo 'class="active"';?>><a href="ten-mien">Danh sách</a></li>
		      	<li <?php if(in_array($p, ["them-ten-mien"])) echo 'class="active"';?>><a href="ten-mien/add">Thêm mới</a></li>
		    </ul>
	  	</li>
	  	<!-- Permission -->
	  	<li class="child-one">
		    <a class="toggle" href="#">
		    	<i class="fas fa-globe-americas"></i>
		    	<span>Các trang quản trị</span>
		    </a>
		    <ul <?php if( in_array($p, ["trang", "them-trang", "sua-trang"]) && in_array($p, ["nhom", "them-nhom", "sua-nhom"]) &&in_array($p, ["nhom-trang-quyen", "them-nhom-trang-quyen", "sua-nhom-trang-quyen"]) ) echo 'class="inner show" style="display:block"'; else echo 'class="inner"';?>>
		      	<li <?php if(in_array($p, ["trang", "sua-trang"])) echo 'class="active"';?>><a href="trang">Danh sách trang</a></li>
		      	<li <?php if(in_array($p, ["nhom-trang-quyen", "sua-nhom-trang-quyen"])) echo 'class="active"';?>><a href="nhom-trang-quyen">Danh sách quyền</a></li>
		      	<li <?php if(in_array($p, ["nhom", "sua-nhom"])) echo 'class="active"';?>><a href="nhom">Danh sách nhóm</a></li>
		    </ul>
	  	</li>

	  	<!-- Sitemap -->
	  	<li class="child-one">
		    <a class="link" href="sitemap">
		    	&nbsp;&nbsp;&nbsp;<i class="fal fa-globe-europe"></i>
		    	<span>Sitemap</span>
		    </a>
	  	</li>
	</ul>
	<div class="clear"></div>
</nav>