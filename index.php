<?php require_once "route/route.php";?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<base href="<?=$__URL__?>" />
	<title><?=$tit?></title>
	<link rel="shortcut icon" href="public/image/favicon.svg" />
	<link rel="stylesheet" type="text/css" href="public/css/style.css?v=<?=time()?>" /> 
	<link rel="canonical" href="<?=$link?>" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="<?=$des?>" />
	<meta name="keywords" content="<?=$key?>" />
	<meta name='revisit-after' content='1 days' />
	<meta name="robots" content="noodp,index,follow" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?=$tit?>" />
	<meta property="og:image" content="<?=$thumbs?>" />
	<meta property="og:image:secure_url" content="<?=$thumbs?>" />
	<meta property="og:description" content="<?=$des?>" />
	<meta property="og:url" content="<?=$link?>" />
	<meta property="og:site_name" content="<?=$tit?>" />
	<meta name="format-detection" content="telephone=no" />
	<script src="public/js/jquery.js"></script>
</head>
<body>
	<?php
		require_once "view/layout/header.php";
		require_once $path;
		require_once "view/layout/footer.php";
		#require_once "view/layout/facebook.php";
	?>

	<script src="view/layout/script.js"></script>
</body>
</html>