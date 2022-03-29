
<link rel="stylesheet" type="text/css" href="public/css/lien-he.css?v151021" />

<section class="contact">
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14927.788787790269!2d106.787832!3d20.7123687!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcada4b51ae57fdd3!2zxJHDoSB04buxIG5oacOqbiBUaXRhbiBTdG9uZQ!5e0!3m2!1svi!2s!4v1637813601237!5m2!1svi!2s" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>

	<div class="info">
		<h2><?=$data_company->ten?></h2>
		<p class="address">
			<img src="public/image/footer/location.svg" alt="Địa chỉ Đá xuyên sáng Alva" />
			<a href=""><b>Địa chỉ</b>: <?=$data_company->diachi?></a>
		</p>
		<p class="address">
			<img src="public/image/footer/phone.svg" alt="Hotline Đá xuyên sáng Alva" />
			<a href=""><b>Hot line</b>: <?=$data_company->dienthoai?></a>
		</p>
		<p class="address">
			<img src="public/image/footer/google.svg" alt="TitanStone" />
			<a href=""><b>Email</b>: <?=$data_company->email?></a>
		</p>
		<p class="address">
			<img src="public/image/footer/facebook.svg" alt="Fanpage Đá xuyên sáng Alva" />
			<a href="<?=$data_company->facebook?>"><b>Fanpage</b>: Titan Stone</a>
		</p><br>

		<form method="post" class="form">
			<input type="text" name="ten" placeholder="Họ tên" spellcheck="false" autocomplete="off" class="input left" required />
			<input type="text" name="dienthoai" placeholder="Điện thoại" spellcheck="false" autocomplete="off" class="input right" required />
			<textarea rows="5" placeholder="Nội dung" spellcheck="false" name="noidung" required><?php if(isset($_SESSION['tenda'])) echo $_SESSION['tenda'];?></textarea>
			<input type="submit" name="contactpage" value="Gửi liên hệ" class="submit" />
		</form>
	</div>
</section>
<?php
	// Sent contact
    $url = $__URL__."api/don-hang/create.php";

    if(isset($_POST['contactpage']))
    {
        $data = array(
            'ten' => $_POST['ten'],
		    'dienthoai' => $_POST['dienthoai'],
		    'email' => $_POST['email'],
		    'gio' => time(),
		    'ghichu' => $note." | ".$_POST['noidung']." | ".$_POST['donvi'],
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
			# Sent mail
		    try {
		        $mail->isSMTP();
		        $mail->Host       = 'mail.titanstone.vn';
		        $mail->SMTPAuth   = true;
		        $mail->Username   = 'order@titanstone.vn';
		        $mail->Password   = 'IC-*5cHMcak!';
		        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
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
		        $mail->Body    = 'Khách hàng: '.$_POST['ten'].'<br>Điện thoại: '.$_POST['dienthoai'].'<br>Công ty: '.$_POST["donvi"].'<br>Nội dung: '.$_POST["noidung"].'<br>Thời gian đặt: '.date("d-m-Y H:i:s"); 
		        $mail->CharSet = "UTF-8";
		        $mail->isHTML(true);
		        $mail->send();
		    } 
		    catch (Exception $e) 
		    {
		        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		    }
		    # Sent mail
			header("location:nhan-tu-van");
		}
		else if($convert->message == "fail" || $convert->message == "bad-request")
		{
			header("location:error.php");
		}
    }
?>