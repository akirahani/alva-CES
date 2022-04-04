<?php 
	class LoaiTin
	{

		public function ThemMoi($query)
		{
			$fields = [	"ten", "slug" ];
			$post_form = [
				"ten" => $_POST['ten'],
	        	"slug" => $_POST['slug']
			];
			$query->ThemMoi("loaitin", $fields, $post_form);

	        // Xử lý save
	        $this->XuLiLoaiTin($query);
	        header("location:list");
		}
		
		
		public function CapNhat($query,$id){
			$fields = [	"ten", "slug" ];
	        $condition = ["id"];
	        $post_form = [
	        	"id" => $id,
	        	"ten" => $_POST['ten'],
	        	"slug" => $_POST['slug']
	        ];
	        $query->CapNhat("loaitin", $fields, $condition, $post_form);
	        // Xử lý save
	        $this->XuLiLoaiTin($query);
	        header("location:list");
		}
			
		public function Xoa($query,$id){
			$query->Xoa("loaitin",  ["id" => "="], ["id" => $id]);
			$this->XuLiLoaiTin($query);
			header("location:list");
		}
		public function XuLiLoaiTin($query){
			$data_loaitin = $query->DanhSach("loaitin", [], [], [], [], [], []);
    		$arr_loaitin = [];
		    foreach ($data_loaitin as $key => $value) 
		    {
		    	$arr_loaitin[$value->slug] = [$value->id, $value->ten];
		    }
		    $fields = [	"loaitin" ];
		    $condition = ["id"];
			$post_form = [
				"id" => 1,
				"loaitin" => json_encode($arr_loaitin)
			];
		    $query->CapNhat("company", $fields, $condition, $post_form);
		}
	}

 ?>