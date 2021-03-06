<?php
	ob_start();
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	CONST __URL__ ="http://localhost/alva/admin/";
	// CONST __URLWEB__ = "https://dienphuc.vn/";
	CONST __NAME__ = "Alva";
	if(!isset($_SESSION['id'])) header("location:login.php");
	if( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ){
		$actual_link = "https"."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$ROOT = "https"."://$_SERVER[HTTP_HOST]/";
	}
	else{
		$actual_link = "http"."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$ROOT = "http"."://$_SERVER[HTTP_HOST]/";
	}
	$arr_link = explode("/", $actual_link);
	if($arr_link[2] == 'localhost' || $arr_link[2] == '192.168.1.8'){
		$__URL__ = $ROOT.$arr_link[3]."/admin/";
		isset($arr_link[5]) ? $p = $arr_link[5] : $p = '';
		isset($arr_link[6]) ? $one = $arr_link[6] : $one = '';
	}
	else{
		$__URL__ = $ROOT.$arr_link[3]."/";
		isset($arr_link[4]) ? $p = $arr_link[4] : $p = '';
		isset($arr_link[5]) ? $one = $arr_link[5] : $one = '';
	}
	$__ID__ = isset($_SESSION['id']) ? $_SESSION['id'] : '';
	$__NHOM__ = isset($_SESSION['nhom']) ? $_SESSION['nhom'] : '';
	$__FULLNAME__ = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : '';
	require_once "model/Query.php";
	require_once "model/Lib.php";
	require_once "controller/phanquyen.php";
	$query = new Query();
	$lib = new Lib();
	$phanquyen = new PhanQuyen();
	if($p == ''){
		$folder = "home";
		require_once 'controller/'.$folder.'.php';
		$path = 'view/'.$folder.'/list.php';
	}
	else{
		$folder = 'view/'.$p;
		$string_page = explode("?", $p);
		if(count($string_page) == 1)
		{
			if (file_exists($folder)){
				if($one == ''){
					require_once "controller/".$p.".php";
					$ps = $p;
					$path = 'view/'.$p.'/list.php';
					$phanquyen->	quyen_xem($ps,$__NHOM__,$query);
				}
				else{
					require_once "controller/".$p.".php";
					$url_full = 'view/'.$p.'/'.$one;
					$phanquyen->quyen_them($one,$p,$__NHOM__,$query);
					if (strpos($url_full, '?') !== false){
						$url_cut = strstr($url_full, '?', true);
						$k = strstr($one,'?',true);
						$phanquyen->quyen_sua($k,$p,$__NHOM__,$query);
						$phanquyen->quyen_xoa($k,$p,$__NHOM__,$query);
					}
					else{
						$url_cut = $url_full;
					}
					$path = $url_cut.'.php';
				}
			}
			else{
				$folder = "home";
				require_once 'controller/'.$folder.'.php';
				$path = 'view/'.$folder.'/list.php';
			}
		}
		else{
			$folder = 'view/'.$string_page[0];
			if (file_exists($folder)){
				if($one == ''){
					require_once "controller/".$string_page[0].".php";
					$ps = $string_page[0];
					$path = 'view/'.$string_page[0].'/list.php';
					$phanquyen->quyen_xem($ps,$__NHOM__,$query);
				}
				else{
					require_once "controller/".$string_page[0].".php";
					$url_full = 'view/'.$string_page[0].'/'.$one;
					$phanquyen->quyen_them($one,$string_page[0],$__NHOM__,$query);
					if (strpos($url_full, '?') !== false){
						$url_cut = strstr($url_full, '?', true);
						$k = strstr($one,'?',true);
						$phanquyen->quyen_sua($k,$string_page[0],$__NHOM__,$query);
						$phanquyen->quyen_xoa($k,$string_page[0],$__NHOM__,$query);
							
					}
					else{
						$url_cut = $url_full;
					}
					$path = $url_cut.'.php';

				}
			}
			else{
				$folder = "home";
				require_once 'controller/'.$folder.'.php';
				$path = 'view/'.$folder.'/list.php';
			}
		}
	}
	
?>