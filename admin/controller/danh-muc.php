<?php 
	class DanhMuc
	{

		public function ThemMoi($query)
		{
			$fields = ["ten", "slug"];
			$post_form = [
				"ten" => $_POST['ten'],
	        	"slug" => $_POST['slug']
			];
			$query->ThemMoi("danhmuc", $fields, $post_form);
	        // Xử lý danh mục
	        $this->load->XuLiDanhMuc($query);
	        header("location:list");
		}
		// 
		
		public function CapNhat($query,$id){
	        $query->CapNhat("danhmuc", ["ten", "slug"], ["id"],["ten" => $_POST['ten'],"slug" => $_POST['slug'],"id" => $id]);
     		$this->XuLiDanhMuc($query);
	        header("location:list");
		}
			
		public function Xoa($query,$id){
			$query->Xoa("danhmuc", ["id" => "="],["id" => $id]);
			// Xử lý danh mục
			$this->XuLiDanhMuc($query);
		    header("location:list");
		}
		public function XuLiDanhMuc($query){
			
			$data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
		    $arr_danhmuc = [];
		    foreach ($data_danhmuc as $key => $value) 
		    {
		    	$arr_danhmuc[$value->slug] = [$value->id, $value->ten, $value->slug];
		    }
		    $fields = ["danhmuc"];
		    $condition = ["id"];
		    $post_form = [
				"danhmuc" => json_encode($arr_danhmuc),
		        "id" => 1
		    ];
		    $query->CapNhat("company", $fields, $condition, $post_form);
		}
	}

 ?>