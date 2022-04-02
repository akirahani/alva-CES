<?php 
	require_once "../../model/Query.php";
	$query = new Query();
	if(isset($_POST['trang']) && isset($_POST['nhom']) && isset($_POST['trangthai']) && isset($_POST['quyen'])){
		$trang = $_POST['trang'];
		$nhom  = $_POST['nhom'];
		$trangthai =$_POST['trangthai'];
		$quyen =$_POST['quyen'];
		$check_quyen = $query->ChiTiet('phanquyen',[],["trang"=>"=","nhom"=>"="],["trang"=>$trang,"nhom"=>$nhom]);
		if($trangthai ==1){
			$chuyendoi =0;
		}
		else{
			$chuyendoi =1;
		}
		if(empty($check_quyen)){
			if($quyen=='xem'){
				$query->ThemMoi('phanquyen',['nhom','trang','xem'],['nhom'=>$nhom,'trang'=>$trang,'xem'=>$chuyendoi ]);
			}
			elseif($quyen=='them'){
				$query->ThemMoi('phanquyen',['nhom','trang','them'],['nhom'=>$nhom,'trang'=>$trang,'them'=>$chuyendoi ]);
			}
			else if($quyen =='sua')
			{
				$query->ThemMoi('phanquyen',['nhom','trang','sua'],['nhom'=>$nhom,'trang'=>$trang,'sua'=>$chuyendoi ]);
			}
			else
			{
				$query->ThemMoi('phanquyen',['nhom','trang','xoa'],['nhom'=>$nhom,'trang'=>$trang,'xoa'=>$chuyendoi ]);
			}
		}
		else{
			if($quyen=='xem'){
				$query->CapNhat('phanquyen',['xem'],["nhom","trang"],['nhom'=>$nhom,'trang'=>$trang,'xem'=>$chuyendoi]);
			}
			else if($quyen=='them'){
				$query->CapNhat('phanquyen',['them'],["nhom","trang"],['nhom'=>$nhom,'trang'=>$trang,'them'=>$chuyendoi]);
			}
			else if($quyen =='sua')
			{
				$query->CapNhat('phanquyen',['sua'],["nhom","trang"],['nhom'=>$nhom,'trang'=>$trang,'sua'=>$chuyendoi]);
			}
			else
			{
				$query->CapNhat('phanquyen',['xoa'],["nhom","trang"],['nhom'=>$nhom,'trang'=>$trang,'xoa'=>$chuyendoi]);
			}
		}
	
	}

 ?>