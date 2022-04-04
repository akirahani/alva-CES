<?php 
	class Loai
	{

		public function ThemMoi($query)
		{
			if(!empty($_POST['danhmuc']))
			{
				$str = implode(",", $_POST['danhmuc']);
			}
			else
			{
				$str = NULL;
			}
	        $fields = ["ten", "slug", "danhmuc"];
			$post_form = [
				"ten" => $_POST['ten'],
	        	"slug" => $_POST['slug'],
	        	"danhmuc" => $str
			];
			$query->ThemMoi("loai", $fields, $post_form);
	        header("location:list");
		}

		public function CapNhat($query,$id){
			if(!empty($_POST['danhmuc']))
			{
				$str_danhmuc = implode(",", $_POST['danhmuc']);
			}
			else
			{
				$str_danhmuc = NULL;
			}
	        $fields = ["ten", "slug", "danhmuc"];
	        $condition = ["id"];
	        $post_form = [
				"ten" => $_POST['ten'],
	        	"slug" => $_POST['slug'],
	        	"danhmuc" => $str_danhmuc,
	            "id" => $id
	        ];
	        $query->CapNhat("loai", $fields, $condition, $post_form);
	        header("location:list");
		}
			
		public function Xoa($query,$id){
			$query->Xoa("loai", ["id" => "="],["id" => $id]);
			header("location:list");
		}
	}

 ?>