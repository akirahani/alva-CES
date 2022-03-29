<?php 
	require 'lib/vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer(true);
?>
<link rel="stylesheet" type="text/css" href="public/css/home.css?v=<?=time()?>"/>
<section class="top-landing">
	<div class="menu-logo">
		<img class="menu" src="view/landing/cau-thang/image/menu.png" alt="Menu" />
		<img class="logo" src="view/landing/cau-thang/image/logo.svg" alt="Menu" />
	</div>
	<img class="bg" src="view/landing/cau-thang/image/bg0.png" alt="Cầu thang" />
	<h1>CẦU THANG trở nên độc đáo<br>và tinh tế với ĐÁ TỰ NHIÊN</h1>
</section>

<section class="nang-tam">
	<div class="line"></div>
	<p class="intro">Công trình nào sử dụng đá tự nhiên để thi công đều trở nên sang trọng, giá trị và thể hiện sự đẳng cấp.</p>
	<p class="intro">Với cầu thang, chúng ta có thể lựa chọn vật liệu đá tự nhiên để thi công. Chúng sẽ giúp cho không chỉ cầu thang mà toàn bộ ngôi nhà của bạn được nâng tầm giá trị.</p>
	<h2>nâng tầm cầu nối<br>trong không gian nhà bạn</h2>  

    <div class="slide-top">                      
        <ul class="owl-carousel owl-theme">
            <li><img src="view/landing/cau-thang/one/0.png" alt="Đá xuyên sáng"></li>
            <li><img src="view/landing/cau-thang/one/1.png" alt="Đá xuyên sáng"></li>
            <li><img src="view/landing/cau-thang/one/2.png" alt="Đá xuyên sáng"></li>
            <li><img src="view/landing/cau-thang/one/3.png" alt="Đá xuyên sáng"></li>
            <li><img src="view/landing/cau-thang/one/4.png" alt="Đá xuyên sáng"></li>
        </div>
    </div>

	<p class="one-pic">Đóng vai trò điểm nhấn, là xương sống của ngôi nhà, đá tự nhiên sẽ giúp cho hạng mục cầu thang trở nên độc đáo và tinh tế hơn bao giờ hết, chúng sẽ không còn đơn điệu hay cứng nhắc như sử dụng những loại nguyên vật liệu thông thường.</p>
	<img class="pic" src="view/landing/cau-thang/image/bg2.png" alt="Cầu thang" />
	<p class="one-pic">Không chỉ mang lại vẻ đẹp cho khu vực lên xuống, công trình những chiếc cầu thang đá tự nhiên còn đảm bảo sự an toàn cho người sử dụng. Loại đá này có độ bền, độ cứng tốt nên chịu được va đập, lực tác động.</p>
	
	<div class="slide-bot">                      
        <ul class="owl-carousel owl-theme">
            <li><img src="view/landing/cau-thang/two/0.png" alt="Đá xuyên sáng"></li>
            <li><img src="view/landing/cau-thang/two/1.png" alt="Đá xuyên sáng"></li>
            <li><img src="view/landing/cau-thang/two/2.png" alt="Đá xuyên sáng"></li>
            <li><img src="view/landing/cau-thang/two/3.png" alt="Đá xuyên sáng"></li>
            <li><img src="view/landing/cau-thang/two/4.png" alt="Đá xuyên sáng"></li>
        </div>
    </div>

	<p class="text-two">Thay cho những mẫu mã cầu thang truyền thống đơn điệu, đá tự nhiên mang đến nguồn cảm hứng để gia chủ có thể sáng tạo ra những mẫu cầu thang độc đáo, phá cách thể hiện cá tính gu thẩm mỹ của cá nhân tạo nên một phong cách kiến trúc ấn tượng,</p>
</section>

<section class="gioi-thieu">
	<h2>TITAN STONE</h2>
	<p class="intro">Đưa tới sự khác biệt, khẳng định là đơn vị tư vấn, cung cấp và thi công lắp đặt các sản phẩm về đá tự nhiên cao cấp, ứng dụng công nghệ hiện đại và triết lý vượt qua thử thách để dẫn đầu. Titan Stone quyết tâm trở thành thương hiệu uy tín tại Việt Nam.</p>
	<ul class="uu-dai">
		<li>
			<img src="view/landing/cau-thang/image/tu-van.svg" alt="Tư vấn cầu thang đá" />
			<p>Miễn phí<br>Tư vấn, thiết kế</p>
		</li>
		<li>
			<img src="view/landing/cau-thang/image/lap-dat.svg" alt="Lắp đặt cầu thang đá" />
			<p>Lắp đặt<br>hoàn thiện 2 ngày</p>
		</li>
		<li>
			<img src="view/landing/cau-thang/image/bao-hanh.svg" alt="Bảo hành cầu thang đá" />
			<p>Bảo hành Đá<br>01 năm</p>
		</li>
		<li>
			<img src="view/landing/cau-thang/image/den-led.svg" alt="Bảo hàng đèn LED" />
			<p>Bảo hành đèn led<br>Samsung 05 năm</p>
		</li>
	</ul>
	<ul class="thong-tin">
		<li>
			<div class="left"><img src="view/landing/cau-thang/image/location.svg" alt="Địa chỉ" /></div>
			<div class="right">Showroom: <?=$addresses?></div>
		</li>
		<li>
			<div class="left"><img src="view/landing/cau-thang/image/tell.svg" alt="Điện thoại" /></div>
			<div class="right">Hotline: <a href="tel:0363386748" style="text-decoration: none; color:#FFF">0363 386 748</a></div>
		</li>
		<li>
			<div class="left"><img src="view/landing/cau-thang/image/facebook.svg" alt="Fanpage" /></div>
			<div class="right">Fanpage: Đá Tự Nhiên Titan Stone</div>
		</li>
		<li>
			<div class="left"><img src="view/landing/cau-thang/image/email.svg" alt="Email" /></div>
			<div class="right">Email: Titanstone@gmail.com</div>
		</li>
	</ul>
</section>

<section class="form">
	<h2>Gửi thông tin của bạn cho chúng tôi<br>Để được tư vấn miễn phí tốt nhất</h2>
	<form method="post">
		<div class="input-placeholder">
            <input type="text" name="ten" required spellcheck="false" autocomplete="off" />
            <p class="place-hide">Tên của bạn (<span>*</span>)</p>
        </div>
		<div class="input-placeholder">
            <input type="text" name="email" required spellcheck="false" autocomplete="off" />
            <p class="place-hide">Email (<span>*</span>)</p>
        </div>
		<div class="input-placeholder">
            <input type="text" name="dienthoai" required spellcheck="false" autocomplete="off" />
            <p class="place-hide">Số điện thoại (<span>*</span>)</p>
        </div>
		<textarea rows="6" placeholder="Tin nhắn" name="note"></textarea>
		<input type="submit" name="submit" value="GỬI LIÊN HỆ" />
	</form>
	<?php 
		// Sent contact
		$url = "https://daxuyensang.vn/api/don-hang/create.php";

	    if(isset($_POST['submit']))
	    {
	    	$_SESSION['thoigian'] = time();
	        
	        $data = array(
	            'ten' => $_POST['ten'],
			    'dienthoai' => $_POST['dienthoai'],
			    'email' => $_POST['email'],
			    'gio' => $_SESSION['thoigian'],
			    'ghichu' => $_POST['note'],
			    'trang' => $trang
	        );

			// Khởi tạo curl
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:multipart/form-data'));
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			$result = curl_exec($curl);
			$convert = json_decode($result);
			curl_close($curl);

			if($convert->message == "success")
			{
			    try {
				$mail->isSMTP();
			        $mail->Host       = 'mail.titanstone.vn';
			        $mail->SMTPAuth   = true;
			        $mail->Username   = 'order@titanstone.vn';
			        $mail->Password   = 'IC-*5cHMcak!';
			        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;//SSL - 465 - LINUX
			        $mail->Port       = 465;
			        $mail->SMTPOptions = array(
			            'ssl' => array(
			                'verify_peer' => false,
			                'verify_peer_name' => false,
			                'allow_self_signed' => true
			            )
			        );
			        $mail->setFrom('order@titanstone.vn', 'Alva Stone Marble '.date("H:i:s"));
			        $mail->addAddress('congtyalva@gmail.com', 'Mr.Ngãi');
			        $mail->addAddress('vanphonggiang@gmail.com', 'Mr.Giang CESMEDIA');
			        $mail->addAddress('phuongthaoalva@gmail.com', 'Phương Thảo');
			        $mail->Subject = 'Đơn hàng '.$_POST['dienthoai'];
			        $mail->Body    = 'Khách hàng: '.$_POST['ten'].'<br>Điện thoại: '.$_POST['dienthoai'].'<br>Thời gian đặt: '.date("d-m-Y H:i:s"); 
			        $mail->CharSet = "UTF-8";
			        $mail->isHTML(true);
			        $mail->send();
			    } 
			    catch (Exception $e) 
			    {
			        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			    }
				header("location:nhan-tu-van");
			}
			else if($convert->message == "fail" || $convert->message == "bad-request")
			{
				header("location:dat-hang-khong-thanh-cong");
			}
	    }
	?>
</section>

<script>
	$('.slide-top ul').owlCarousel({
        loop:true,
        nav:false,
        autoplay: false,
        items: 1
    });

	$('.slide-bot ul').owlCarousel({
        loop:true,
        nav:true,
        autoplay: false,
        items: 1,
        navText:["<img src='view/landing/cau-thang/image/phai.svg'>", "<img src='view/landing/cau-thang/image/trai.svg'>"]
    });
</script>