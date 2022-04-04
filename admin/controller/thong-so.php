<?php 
	class ThongSo
	{

		public function ThemMoi($query)
		{
			$fields = ["ten", "danhmuc", "loai", "thutu"];
			$post_form = [
				"ten" => $_POST['ten'],
	        	"danhmuc" => $_POST['danhmuc'],
	        	"loai" => $_POST['loai'],
	        	"thutu" => $_POST['thutu']
			];
			$query->ThemMoi("thongso", $fields, $post_form);
	        header("location:list");
		}

		public function CapNhat($query,$id){
			$fields = ["ten", "danhmuc", "loai", "thutu"];
	        $condition = ["id"];
	        $post_form = [
				"ten" => $_POST['ten'],
	        	"danhmuc" => $_POST['danhmuc'],
	        	"loai" => $_POST['loai'],
	        	"thutu" => $_POST['thutu'],
	            "id" => $id
	        ];
	        $query->CapNhat("thongso", $fields, $condition, $post_form);
	        header("location:list");
		}
			
		public function Xoa($query,$id){
			$query->Xoa("thongso", ["id" => "="], ["id" => $id]);
			header("location:list");	
		}
	}

 ?>