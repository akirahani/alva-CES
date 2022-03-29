<?php
	require_once "lib/BrowserDetect.php";
	$obj_ua = new BrowserDetection();
	$obj_info = $obj_ua->detect()->getInfo();
?>

<script>
  	gtag('event', 'conversion', {
      	'send_to': 'AW-344515554/ZBEXCJT0icwCEOLHo6QB',
      	'value': 1.0,
      	'currency': 'VND'
  	});
</script>

<link rel="stylesheet" type="text/css" href="public/css/nhan-tu-van.css" />
<section class="thank">
	<div class="wrap">
		<h1>Cảm ơn quý khách hàng đã đăng ký tư vấn sản phẩm đá cẩm thạch thạch anh xuyên sáng của Alva</h1>
		<p>Alva sẽ liên hệ với bạn sớm nhất!</p>
	</div>
</section>

<?php
	// Check file and create is not
	if(isset($_SESSION['thoigian']))
	{
		$file_check = 'report/order/'.date("d-m-Y").'.txt';
		if (file_exists($file_check)) {}
		else 
		{
		    $myfile = fopen("report/order/".date("d-m-Y").".txt", "w");
		}
		//Save info User Agent
		$fp = fopen('report/order/'.date("d-m-Y").'.txt', 'a');
		fwrite( $fp, date("d/m/Y H:i:s")." | ".$obj_info['ip_address']." | ".$obj_info['platform']." | ".$obj_info['browser_name']." | ".$obj_info['browser_version']." | ".$obj_info['browser_ua_string']." | ".$_SESSION['thoigian']." || \n" );
		fclose($fp);
	}
	unset($_SESSION['thoigian']);
?>