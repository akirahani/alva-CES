<?php 
	class ChinhSach
	{
		public function ThemMoi($query,$lib)
		{
			if(!empty($_FILES['file']['tmp_name']))
	        {
	            $hinh=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['file']['name']); 
	            move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/chinh-sach/".$hinh);
	        }
	        else
	        {
	            $hinh = NULL;
	        }

	        $fields = ["ten", "hinh", "mota", "noidung", "ngay", "slug"];
			$post_form = [
				"ten" => $_POST['ten'],
	        	"hinh" => $hinh,
	        	"mota" => $_POST['mota'],
	        	"noidung" => $_POST['noidung'],
	        	"ngay" => date("Y-m-d"),
	        	"slug" => $_POST['slug']
			];
			$query->ThemMoi("chinhsach", $fields, $post_form);
	        header("location:list");
			
		}
		public function Album($data_detail){
			
		}
		
		public function CapNhat($query,$id,$lib){	
				// Xử lý file hồ sơ
	        if(!empty($_FILES['file']['name']))
	        {  
	            $hinh=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['file']['name']);      
	            move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/chinh-sach/".$hinh);
	            unlink('../uploads/chinh-sach/'.$hinh_old);
	            $hinh_save = $hinh;
	        }
	        else
	        {
	            $hinh_save = $hinh_old;
	        }
	        $fields = ["ten", "hinh", "mota", "noidung", "slug"];
	        $condition = ["id"];
	        $post_form = [
				"ten" => $_POST['ten'],
	        	"hinh" => $hinh_save,
	        	"mota" => $_POST['mota'],
	        	"noidung" => $_POST['noidung'],
	        	"slug" => $_POST['slug'],
	            "id" => $id
	        ];
	        $query->CapNhat("chinhsach", $fields, $condition, $post_form);
	        header("location:list");
		
		}
			
		public function Xoa($query,$id){
			$data_detail = $query->ChiTiet("chinhsach", [], ["id" => "="], ["id" => $id]);
			unlink('../uploads/chinh-sach/'.$data_detail->hinh);
			$query->Xoa("chinhsach", ["id" => "="], ["id" => $id]);
			header("location:list");
		}

	}


 ?>