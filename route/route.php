<?php
	ob_start();
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	if( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ){
		$actual_link = "https"."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$ROOT = "https"."://$_SERVER[HTTP_HOST]/";
	}
	else{
		$actual_link = "http"."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$ROOT = "http"."://$_SERVER[HTTP_HOST]/";
	}
	$arr_link = explode("/", $actual_link);
	if($arr_link[2] == 'localhost' || $arr_link[2] == '192.168.1.180'){
		$__URL__ = $ROOT.$arr_link[3]."/";
		isset($arr_link[4]) ? $p = $arr_link[4] : $p = '';
		isset($arr_link[5]) ? $one = $arr_link[5] : $one = '';
	}
	else{
		$__URL__ = $ROOT.$arr_link[3];
		isset($arr_link[3]) ? $p = $arr_link[3] : $p = '';
		isset($arr_link[4]) ? $one = $arr_link[4] : $one = '';
	}
	require_once "admin-new/model/Query.php";
	require_once "admin-new/model/Lib.php";
	$query = new Query();
	$lib = new Lib();
	$data_company = $query->ChiTiet("company",[],["id" => "="], ["id" => 1]);
	$arr_danhmuc = json_decode($data_company->danhmuc);
	$process_danhmuc=[];
	foreach ($arr_danhmuc as $key => $value) {
		$process_danhmuc[$value[0]] = $key;
	}
	if($p == ''){
		$folder = 'home';
		require_once "controller/".$folder."/list.php";
		$path = 'view/'.$folder.'/list.php';
	}
	else{
		$string_page = explode("?", $p);
		if(count($string_page) == 1){
			$folder = 'view/'.$p;
			if (file_exists($folder)){
				if($one == ''){
					require_once "controller/".$p."/list.php";
					$ps = $p;
					$path = 'view/'.$p.'/list.php';
				}
				else{
					require_once "controller/".$p."/detail.php";
					$path = 'view/'.$p.'/detail.php';
				}
			}
			else
			{
				#if(array_key_exists($p, $arr_danhmuc)){
				if(isset($arr_danhmuc->$p)){
					$folder = 'product';
					if($one == ''){
						$ps = $p;
						$data_danhmuc = $arr_danhmuc->$p;
						$id_danhmuc = $data_danhmuc[0];
						require_once 'controller/'.$folder.'/list.php';
						$path = 'view/'.$folder.'/list.php';
					}
					else{
						require_once 'controller/'.$folder.'/detail.php';
						$path = 'view/'.$folder.'/detail.php';
					}
				}
				else{
					$folder = 'tin-tuc';
					require_once 'controller/'.$folder.'/detail.php';
					$path = 'view/'.$folder.'/detail.php';
				}
			}
		}
		else
		{
			$folder = $string_page[0];
			if (file_exists("view/".$folder)){
				if($one == ''){
					require_once "controller/".$folder."/list.php";
					$ps = $folder;
					$path = 'view/'.$folder.'/list.php';
				}
				else{
					require_once "controller/".$folder."/detail.php";
					$path = 'view/'.$folder.'/detail.php';
				}
			}
			else
			{
				if(isset($arr_danhmuc->$folder)){
					$folder = 'product';
					if($one == ''){
						$ps = $p = $string_page[0];
						$data_danhmuc = $arr_danhmuc->$p;
						$id_danhmuc = $data_danhmuc[0];
						require_once 'controller/'.$folder.'/list.php';
						$path = 'view/'.$folder.'/list.php';
					}
					else{
						require_once 'controller/'.$folder.'/detail.php';
						$path = 'view/'.$folder.'/detail.php';
					}
				}
				else{
					$folder = 'tin-tuc';
					require_once 'controller/'.$folder.'/detail.php';
					$path = 'view/'.$folder.'/detail.php';
				}
			}
		}
	}
?>