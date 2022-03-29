<?php require_once "route/route.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<base href="<?=$__URL__?>" />
	<meta charset="utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1" />
  	<title><?=__NAME__?></title>
  	<link rel="shortcut icon" href="public/image/alva.svg" />
	<link rel="stylesheet" type="text/css" href="public/css/style.css?v1.0" />
	<link rel="stylesheet" href="lib/fontawesome/css/all.css" />
  	<link rel="stylesheet" type="text/css" href="lib/datatable/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="lib/datatable/responsive.dataTables.min.css" />
	<link rel="stylesheet" href="lib/scrollbar/smooth-scrollbar.css" />
	<link rel="stylesheet" type="text/css" href="lib/datepicker/jquery-ui.min.css"/>
	<script src="public/js/jquery-3.6.0.min.js"></script>
	<script src="public/js/socket.io.js"></script>
	<script src="lib/datatable/jquery.dataTables.min.js"></script>
	<script src="lib/datatable/dataTables.responsive.js"></script>
	<script src="lib/datatable/dataTables.keepConditions.min.js"></script>
	<script src="lib/ckeditor/ckeditor.js"></script>
	<script src="lib/ckfinder/ckfinder.js"></script>
	<script src="lib/scrollbar/smooth-scrollbar.js"></script>
	<script src="lib/datepicker/jquery-ui.min.js"></script>
	<script src="lib/datepicker/jquery.ui.datepicker-vi-VN.js"></script>
</head>
<body>
	<?php 
		require_once "view/layout/header.php";
		echo '<section class="content-wrap">';
			require_once "view/layout/menu.php"; 
			echo '<main>';
				require_once $path;
				require_once "view/layout/footer.php";
			echo '</main>';
		echo '</section>';
	?>
	<script src="public/js/app.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>