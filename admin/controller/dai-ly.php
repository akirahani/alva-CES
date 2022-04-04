<?php 
	class DaiLy
	{
		public function ThemMoi($query,$lib)
		{
			if(isset($_POST['insert']))
			{
		        if(!empty($_FILES['album']['tmp_name'][0]))
		        {
		            $arr_album=[];
		            foreach($_FILES['album']['tmp_name'] as $key => $tmp_name)
		            {
		                $album_ten=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['album']['name'][$key]); 
		                array_push($arr_album, $album_ten);      
		                move_uploaded_file($_FILES['album']['tmp_name'][$key], "../uploads/dai-ly/".$album_ten);
		            }
		            $save_album = implode(",", $arr_album);
		        }
		        else
		        {
		            $save_album = NULL;
		        }
		        $fields = [	"ten", "diachi", "dienthoai", "hethong", "tinhthanh", "slug", "map", "gioithieu", "album" ];
				$post_form = [
					"ten" => $_POST['ten'],
		        	"diachi" => $_POST['diachi'],
		        	"dienthoai" => $_POST['dienthoai'],
		        	"hethong" => $_POST['hethong'],
		        	"tinhthanh" => $_POST['tinhthanh'],
		        	"slug" => $_POST['slug'],
		        	"map" => $_POST['map'],
		        	"gioithieu" => $_POST['gioithieu'],
		        	"album" => $save_album
				];
				$query->ThemMoi("daily", $fields, $post_form);
		        header("location:list");
			}
			
		}
		public function Album($data_detail){
			$arr_album_old = [];
			if($data_detail->album != NULL)
			{
				$arr_album_old = explode(",", $data_detail->album);
			}
			else
			{
				$arr_album_old = [];
			}
			return $arr_album_old;
		}
		
		public function CapNhat($query,$id,$lib,$data_detail){	
				$arr_album_old = [];
				if($data_detail->album != NULL)
				{
					$arr_album_old = explode(",", $data_detail->album);
				}
				else
				{
					$arr_album_old = [];
				}
		        if(!empty($_FILES['album']['tmp_name'][0]))
		        {
		        	// Lưu file album
		            $arr_album=[];
		            foreach($_FILES['album']['tmp_name'] as $key => $tmp_name)
		            {
		                $album_ten=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['album']['name'][$key]); 
		                array_push($arr_album, $album_ten);      
		                move_uploaded_file($_FILES['album']['tmp_name'][$key], "../uploads/dai-ly/".$album_ten);
		            }
		            $save_album = implode(",", $arr_album);
		            // Xóa file
		            if($data_detail->album != NULL)
		            {
		            	foreach ($arr_album_old as $key_del => $value_del) {
		            		unlink('../uploads/dai-ly/'.$value_del);
		            	}
		            }
		        }
		        else
		        {
		            $save_album = implode(",", $arr_album_old);
		        }
		        $fields = [	"ten", "diachi", "dienthoai", "hethong", "tinhthanh", "slug", "map", "gioithieu", "album" ];
		        $condition = ["id"];
				$post_form = [
					"id" => $id,
					"ten" => $_POST['ten'],
		        	"diachi" => $_POST['diachi'],
		        	"dienthoai" => $_POST['dienthoai'],
		        	"hethong" => $_POST['hethong'],
		        	"tinhthanh" => $_POST['tinhthanh'],
		        	"slug" => $_POST['slug'],
		        	"map" => $_POST['map'],
		        	"gioithieu" => $_POST['gioithieu'],
		        	"album" => $save_album
				];
		        $query->CapNhat("daily", $fields, $condition, $post_form);
		        header("location:list");
				
		
		}
			
		public function Xoa($query,$id){
			$data_detail = $query->ChiTiet("daily",[],["id" => "="], ["id" => $id]);
			$arr_album = explode(",", $data_detail->album);
			foreach ($arr_album as $key => $value) {
				unlink('../uploads/dai-ly/'.$value);
			}
			$query->Xoa("daily", ["id" => "="], ["id" => $id]);
			header("location:list");
		}

	}

 ?>