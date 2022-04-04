<?php  
	class Catalog
	{
		
		function ThemMoi($query)
		{
			if(!empty($_FILES['file']['name']))
				{
					$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
					move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/catalog/'.$pic);
				}
				else
				{
					$pic = NULL;
				}
				$query->ThemMoi("catalog", ["ten", "hinh"], [
					"ten" => $_POST['ten'],
					"hinh" => $pic
				]);
				header("location:list");
		}

		function CapNhat($query,$id,$data_detail)
		{
			 if(!empty($_FILES['file']['name']))
		        {  
		            $pic=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['file']['name']);      
		            move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/catalog/".$pic);
		            unlink('../uploads/catalog/'.$data_detail->hinh);
		        }
		        else
		        {
		            $pic = $data_detail->hinh;
		        }
		        $fields = ["ten", "hinh"];
		        $condition = ["id"];
		        $post_form = [
					"ten" => $_POST['ten'],
					"hinh" => $pic,
		            "id" => $id
		        ];
		        $query->CapNhat("catalog", $fields, $condition, $post_form);
		        header("location:list");
		}
		function Xoa($query,$id)
		{
			$data_detail = $query->ChiTiet("catalog", [],["id" => "="],["id" => $id]);
			unlink('../uploads/catalog/'.$data_detail->hinh);
			$query->Xoa("catalog", ["id" => "="], ["id" => $id]);
			header('location:list');
		}
	}

?>