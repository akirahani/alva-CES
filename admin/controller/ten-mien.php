<?php 
	class Mien
	{

		public function ThemMoi($query)
		{
			if(strtotime($_POST['ngaymua']) < strtotime($_POST['ngayhet'])){
		    	$fields = ["ten", "dns", "ngay", "ngayhet"];
				$post_tenmien = [
					"ten" => $_POST['ten'],
					"dns" => $_POST['dns'],
					"ngay" => $_POST['ngaymua'],
					"ngayhet" => $_POST['ngayhet']
				];
				$query->ThemMoi("tenmien", $fields, $post_tenmien);
		        header("location:list");
	    	}
	    	else{
	    		echo "<script>
			     	 window.location.href = 'ten-mien/add';
			      	alert('Cần xem lại thông tin về thời gian');
				</script>";
	    	}
		}
		// 
		
		public function CapNhat($query,$id){
			if(strtotime($_POST['ngaymua']) < strtotime($_POST['ngayhet'])){
	            $fields = ["ten", "dns", "ngay", "ngayhet"];
	            $condition = ["id"];
	            $post_tenmien = [
	                "ten" => $_POST['ten'],
	                "dns" => $_POST['dns'],
	                "ngay" => $_POST['ngaymua'],
	                "ngayhet" => $_POST['ngayhet'],
	                "id" => $id
	            ];
	            $query->CapNhat("tenmien", $fields, $condition, $post_tenmien);
	            header("location:list?page=".$page_get);
	        }
	        else{
	            echo "<script>
	                 window.location.href = 'ten-mien/edit?id=$id';
	                alert('Cần xem lại thông tin về thời gian');
	            </script>";
	        }

		}
			
		public function Xoa($query,$id){
			$operator = ["id" => "="];
			$condition = ["id" => $id];
			$query->Xoa("tenmien", $operator, $condition);
			header("location:list?page=".$page_get);
		}
		// public function XuLiBanner($query){
		// 	$data_list = $query->DanhSach("banner", [], [], ["thutu" => "ASC"], [], []);
		// 	$fields = ["banner"];
		//     $condition = ["id"];
		//     $post_form = [
		// 		"banner" => json_encode($data_list),
		//         "id" => 1
		//     ];
		//     $query->CapNhat("company", $fields, $condition, $post_form);
		// }
	}

 ?>