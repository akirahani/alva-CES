<?php 
	$tit = "Liên hệ Alva";
	$des = "Liên hệ Alva";
	$key = "Liên hệ Alva";
	$link = $__URL__.$p;
	$thumbs = $ROOT."uploads/thumbs.png";
	require 'admin/lib/phpmailer/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer(true);
?>