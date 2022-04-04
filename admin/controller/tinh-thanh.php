<?php 
	class TinhThanh
	{

		public function ThemMoi($query)
		{
			if(isset($_POST['insert']))
			{
		        $fields = ["ten", "vungmien"];
				$post_form = [
					"ten" => $_POST['ten'],
					"vungmien" => $_POST['vungmien']
				];
				$query->ThemMoi("tinhthanh", $fields, $post_form);
		        header("location:list");
			}
		}

		
		public function CapNhat($query,$id){
				if(isset($_POST['update']))
				{
			        $query->CapNhat("tinhthanh",["ten", "vungmien"], ["id"],["ten" => $_POST['ten'],"vungmien" => $_POST['vungmien'],"id" => $id]);
			        header("location:list");
				}
		}
			
		public function Xoa($query,$id){
			$query->Xoa("tinhthanh", ["id" => "="], ["id" => $id]);
			header("location:list");
		}

	}

 ?>