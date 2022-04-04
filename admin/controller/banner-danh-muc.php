
<?php 
	class BannerDM
	{

		public function ThemMoi($query)
		{
			if(!empty($_FILES['file']['name']))
			{
				$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
				move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/banner-danh-muc/'.$pic);
			}
			else
			{
				$pic = NULL;
			}
			
			$fields = ["ten", "link", "hinh", "danhmuc"];
			$post_form = [
				"ten" => $_POST['ten'],
				"link" => $_POST['link'],
				"hinh" => $pic,
				"danhmuc" => $_POST['danhmuc']
			];
			$query->ThemMoi("bannerdanhmuc", $fields, $post_form);
			#Xử lý banner
			// $this->XuLiBanner($query);
			header("location:list");
		}
		// 
		
		public function CapNhat($query,$id,$data_detail){
			if(!empty($_FILES['file']['name']))
			{
				$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
				move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/banner-danh-muc/'.$pic);
				unlink('../uploads/banner-danh-muc/'.$data_detail->hinh);
			}
			else
			{
				$pic = $data_detail->hinh;
			}

			$fields = ["ten", "link", "hinh", "danhmuc"];
	        $condition = ["id"];
	        $post_form = [
				"ten" => $_POST['ten'],
				"link" => $_POST['link'],
				"hinh" => $pic,
				"danhmuc" => $_POST['danhmuc'],
	            "id" => $id
	        ];
	        $query->CapNhat("bannerdanhmuc", $fields, $condition, $post_form);
	        #Xử lý banner
			// $this->XuLiBanner($query);
			header("location:list");

		}
			
		public function Xoa($query,$id){
			$data_detail = $query->ChiTiet("bannerdanhmuc",[], ["id" => "="],["id" => $id]);
			unlink('../uploads/banner-danh-muc/'.$data_detail->hinh);
			$query->Xoa("bannerdanhmuc",  ["id" => "="],["id" => $id]);
			#Xử lý banner
			// $this->XuLiBanner($query);
			header("location:list");
		}
		public function XuLiBanner($query){
			
			$data_list = $query->DanhSach("bannerdanhmuc");
			$fields = ["bannerdanhmuc"];
		    $condition = ["id"];
		    $post_form = [
				"bannerdanhmuc" => json_encode($data_list),
		        "id" => 1
		    ];
		    $query->CapNhat("company", $fields, $condition, $post_form);
		}
	}

 ?>