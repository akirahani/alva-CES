<?php 
	class VungMien
	{

		public function ThemMoi($query)
		{
			if(isset($_POST['insert']))
			{
		        $fields = ["ten", "slug"];
				$post_form = [
					"ten" => $_POST['ten'],
					"slug" => $_POST['slug']
				];
				$query->ThemMoi("vungmien", $fields, $post_form);
		        header("location:list");
			}
		}

		
		public function CapNhat($query,$id,$data_detail){
			if(isset($_POST['update']))
			{
		        $fields = ["ten", "slug"];
		        $condition = ["id"];
		        $post_form = [
					"ten" => $_POST['ten'],
					"slug" => $_POST['slug'],
		            "id" => $id
		        ];
		        $query->CapNhat("vungmien", $fields, $condition, $post_form);
		        header("location:list");
			}

		}
			
		public function Xoa($query,$id){
	
			$data_detail = $query->ChiTiet("vungmien",[],["id"=>"="], ["id"=>$id]);
			$query->Xoa("vungmien", ["id" => "="], ["id" => $id]);
			header("location:list");
			
		}

	}

 ?>