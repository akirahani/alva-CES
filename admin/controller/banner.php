<?php 
	class Banner 
	{

		public function ThemMoi($query)
		{
			if(!empty($_FILES['mobile']['name']))
			{
				$mobile = date('Y-m-d-H-i-s-').$_FILES['mobile']['name'];
				move_uploaded_file($_FILES['mobile']['tmp_name'], '../uploads/banner/'.$mobile);
			}
			else
			{
				$mobile = NULL;
			}
			if(!empty($_FILES['file']['name']))
			{
				$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
				move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/banner/'.$pic);
			}
			else
			{
				$pic = NULL;
			}
			
        	$query->ThemMoi("banner", ["ten","link","thutu","mobile","desktop"],["ten"=>$_POST['ten'],"link"=>$_POST['link'],"thutu"=>$_POST['thutu'],"mobile"=>$mobile,"desktop"=>$pic]);
			$this->XuLiBanner($query);
			header("location:list");
		}
		// 
		
		public function CapNhat($query,$id,$data_detail){
			if(!empty($_FILES['mobile']['name']))
			{
				$mobile = date('Y-m-d-H-i-s-').$_FILES['mobile']['name'];
				move_uploaded_file($_FILES['mobile']['tmp_name'], '../uploads/banner/'.$mobile);
				unlink('../uploads/banner/'.$data_detail->mobile);
			}
			else
			{
				$mobile = $data_detail->mobile;;
			}

			if(!empty($_FILES['file']['name']))
			{
				$pic = date('Y-m-d-H-i-s-').$_FILES['file']['name'];
				move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/banner/'.$pic);
				unlink('../uploads/banner/'.$data_detail->desktop);
			}
			else
			{
				$pic = $data_detail->desktop;
			}

			$fields = ["ten", "link", "thutu", "mobile", "desktop"];
	        $condition = ["id"];
	        $post_form = [
				"ten" => $_POST['ten'],
				"link" => $_POST['link'],
				"thutu" => $_POST['thutu'],
				"mobile" => $mobile,
				"desktop" => $pic,
	            "id" => $id
	        ];
	        $query->CapNhat("banner",$fields, $condition, $post_form);
			$this->XuLiBanner($query);
			header("location:list");

		}
			
		public function Xoa($query,$id){
			$data_detail = $query->ChiTiet("banner",[],["id"=>"="], ["id"=>$id]);
			#Delete
			unlink('../uploads/banner/'.$data_detail->mobile);
			unlink('../uploads/banner/'.$data_detail->desktop);
			$query->Xoa("banner",["id"=>"="], ["id"=>$id]);
			header('location:list');
			
			$this->XuLiBanner($query);
		}
		public function XuLiBanner($query){
			$data_list = $query->DanhSach("banner", [], [], ["thutu" => "ASC"], [], []);
			$fields = ["banner"];
		    $condition = ["id"];
		    $post_form = [
				"banner" => json_encode($data_list),
		        "id" => 1
		    ];
		    $query->CapNhat("company", $fields, $condition, $post_form);
		}
	}

 ?>