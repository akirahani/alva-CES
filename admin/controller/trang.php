<?php  
	class Trang
	{
		public function CapNhat ($query,$id){
			$id = $_POST['id_update'];
			$post_trang = [
				"id" => $id,
				"ten" => $_POST['ten'],
				"trang" => $_POST['trang'],
			];
			$query->CapNhat('trang',['ten','trang'],['id'],$post_trang);
			header("location:list");
		}
	
	}
?>