<?php 
	class DoiTac 
	{

		public function ThemMoi($query)
		{
			if(!empty($_FILES['file']['name']))
			{
				$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
				move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/doi-tac/'.$pic);
			}
			else
			{
				$pic = NULL;
			}
			$fields = [	"ten", "hinh", "mota", "diachi", "dienthoai", "website" ];
			$post_form = [
				"ten" => $_POST['ten'],
	        	"hinh" => $pic,
	        	"mota" => $_POST['mota'],
	        	"diachi" => $_POST['diachi'],
	        	"dienthoai" => $_POST['dienthoai'],
	        	"website" => $_POST['website']
			];
			$query->ThemMoi("doitac", $fields, $post_form);
			header("location:list");
		}
		// 
		
		public function CapNhat($query,$id,$data_detail,$lib){
			if($data_detail->hinh != NULL)
			{
				$hinh_old = $data_detail->hinh;
			}
			else
			{
				$hinh_old = NULL;
			}
			if(!empty($_FILES['file']['name']))
	        {  
	            $hinh=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['file']['name']);      
	            move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/doi-tac/".$hinh);
	            unlink('../uploads/doi-tac/'.$hinh_old);
	            $hinh_save = $hinh;
	        }
	        else
	        {
	            $hinh_save = $hinh_old;
	        }
	        $fields = [	"ten", "hinh", "mota", "diachi", "dienthoai", "website" ];
	        $condition = ["id"];
	        $post_form = [
	        	"id" => $id,
	        	"ten" => $_POST['ten'],
	        	"hinh" => $hinh_save,
	        	"mota" => $_POST['mota'],
	        	"diachi" => $_POST['diachi'],
	        	"dienthoai" => $_POST['dienthoai'],
	        	"website" => $_POST['website']
	        ];
	        $query->CapNhat("doitac", $fields, $condition, $post_form);
	        header("location:list");	
		}
			
		public function Xoa($query,$id){
			$data_detail = $query->ChiTiet("doitac", [], ["id" => "="], ["id" => $id]);
			unlink('../uploads/doi-tac/'.$data_detail->hinh);
			$query->Xoa("doitac", ["id" => "="], ["id" => $id]);
			header("location:list");	
		}

	}

 ?>