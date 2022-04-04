<?php 
	class Tin
	{
		public function MangTag($data_detail){
			if($data_detail->tag != NULL)
			{
				$arr_tag = explode(",", $data_detail->tag);
			}
			else
			{
				$arr_tag = [];
			}
			return $arr_tag;
		}
		public function Vuong($data_detail){
			if($data_detail->vuong != NULL)
			{
				$vuong_old = $data_detail->vuong;
			}
			else
			{
				$vuong_old = NULL;
			}
			return $vuong_old;
		}
		public function Dai($data_detail){
			if($data_detail->dai != NULL)
			{
				$dai_old = $data_detail->dai;
			}
			else
			{
				$dai_old = NULL;
			}
			return $dai_old;
		}



		public function ThemMoi($query,$lib,$data_detail)
		{
			if($data_detail->tag != NULL)
			{
				$arr_tag = explode(",", $data_detail->tag);
			}
			else
			{
				$arr_tag = [];
			}
			if($data_detail->dai != NULL)
			{
				$dai_old = $data_detail->dai;
			}
			else
			{
				$dai_old = NULL;
			}
			if($data_detail->vuong != NULL)
			{
				$vuong_old = $data_detail->vuong;
			}
			else
			{
				$vuong_old = NULL;
			}
			if(!empty($_FILES['vuong']['tmp_name']))
	        {
	            $vuong=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['vuong']['name']); 
	            move_uploaded_file($_FILES['vuong']['tmp_name'], "../uploads/tin-tuc/".$vuong);
	        }
	        else
	        {
	            $vuong = NULL;
	        }
	        // Hình dài
	        if(!empty($_FILES['dai']['tmp_name']))
	        {
	            $dai=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['dai']['name']); 
	            move_uploaded_file($_FILES['dai']['tmp_name'], "../uploads/tin-tuc/".$dai);
	        }
	        else
	        {
	            $dai = NULL;
	        }
	        // Tag
	        if(!empty($_POST['tag']))
	        {
	        	$tag_string = implode(",", $_POST['tag']);
	        }
	        else
	        {
	        	$tag_string = NULL;
	        }
	        //  if($_POST->hasFile('upload')) {
	        //     //get filename with extension
	        //     $filenamewithextension = $request->file('upload')->getClientOriginalName();

	        //     //get filename without extension
	        //     $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

	        //     //get file extension
	        //     $extension = $request->file('upload')->getClientOriginalExtension();

	        //     //filename to store
	        //     $filenametostore = $filename.'_'.time().'.'.$extension;

	        //     //Upload File
	        //     $request->file('upload')->storeAs('public/uploads', $filenametostore);

	        //     $CKEditorFuncNum = $request->input('CKEditorFuncNum');
	        //     $url = asset('storage/uploads/'.$filenametostore);
	        //     $msg = 'Image successfully uploaded';
	        //     $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

	        //     // Render HTML output
	        //     @header('Content-type: text/html; charset=utf-8');
	        //     echo $re;
	        // }
	        $fields = [	"ten", "vuong", "dai", "mota", "noidung", "ngay", "tag", "noibat", "slug", "loai" ];
	        $post_form=[
	        	"ten" => $_POST['ten'],
	        	"vuong" => $vuong,
	        	"dai" => $dai,
	        	"mota" => $_POST['mota'],
	        	"noidung" => $_POST['noidung'],
	        	"ngay" => date("Y-m-d"),
	        	"tag" => $tag_string,
	        	"noibat" => $_POST['noibat'],
	        	"slug" => $_POST['slug'],
	        	"loai" => $_POST['loai']
	        ];
	        $query->ThemMoi("tintuc", $fields, $post_form);

	        // Xử lý save
	        $this->XuLiTin($query);
	        header("location:list");
		}
		
		
		public function CapNhat($query,$id,$lib,$data_detail){
			if($data_detail->tag != NULL)
			{
				$arr_tag = explode(",", $data_detail->tag);
			}
			else
			{
				$arr_tag = [];
			}
			if($data_detail->dai != NULL)
			{
				$dai_old = $data_detail->dai;
			}
			else
			{
				$dai_old = NULL;
			}
			if($data_detail->vuong != NULL)
			{
				$vuong_old = $data_detail->vuong;
			}
			else
			{
				$vuong_old = NULL;
			}
			if(!empty($_FILES['vuong']['name']))
	        {  
	            $vuong=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['vuong']['name']);      
	            move_uploaded_file($_FILES['vuong']['tmp_name'], "../uploads/tin-tuc/".$vuong);
	            unlink('../uploads/tin-tuc/'.$vuong_old);
	            $vuong_save = $vuong;
	        }
	        else
	        {
	            $vuong_save = $vuong_old;
	        }
	        // Hình dài
	        if(!empty($_FILES['dai']['name']))
	        {  
	            $dai=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['dai']['name']);      
	            move_uploaded_file($_FILES['dai']['tmp_name'], "../uploads/tin-tuc/".$dai);
	            unlink('../uploads/tin-tuc/'.$dai_old);
	            $dai_save = $dai;
	        }
	        else
	        {
	            $dai_save = $dai_old;
	        }
	        // Tag
	        if(!empty($_POST['tag']))
	        {
	        	$tag_string = implode(",", $_POST['tag']);
	        }
	        else
	        {
	        	$tag_string = NULL;
	        }
	        $fields = [	"ten", "vuong", "dai", "mota", "noidung", "tag", "noibat", "slug", "loai" ];
	        $condition = ["id"];
	        $post_form = [
	        	"id" => $id,
	        	"ten" => $_POST['ten'],
	        	"vuong" => $vuong_save,
	        	"dai" => $dai_save,
	        	"mota" => $_POST['mota'],
	        	"noidung" => $_POST['noidung'],
	        	"tag" => $tag_string,
	        	"noibat" => $_POST['noibat'],
	        	"slug" => $_POST['slug'],
	        	"loai" => $_POST['loai']
	        ];
	        $query->CapNhat("tintuc", $fields, $condition, $post_form);
	        $this->XuLiTin($query);
	        header("location:list");

		}
			
		public function Xoa($query,$id){
			$fields = [];
			$operator = ["id" => "="];
			$condition = ["id" => $id];
			$data_detail = $query->ChiTiet("tintuc", $fields, $operator, $condition);
			#Delete
			unlink('../uploads/tin-tuc/'.$data_detail->vuong);
			unlink('../uploads/tin-tuc/'.$data_detail->dai);
			$query->Xoa("tintuc", $operator, $condition);
			$this->XuLiTin($query);
			header("location:list");
		}
		public function XuLiTin($query){
			$data_list = $query->DanhSach("tintuc", ["ten", "vuong", "mota", "ngay", "slug"], [], ["id" => "DESC"], [3], []);
			$fields = ["tintuc"];
	        $condition = ["id"];
	        $post_form = [
				"tintuc" => json_encode($data_list),
	            "id" => 1
	        ];
	        $query->CapNhat("company", $fields, $condition, $post_form);
		}
		// function PhanTrang($data_list){
		// 	$total_row = count($data_list);
		//     $num_of_page = 25;
		//     $total_page = ceil($total_row / $num_of_page);
		//     if(isset($_GET ['page']))
		//     {
		//         $page_get = intval($_GET ['page']);
		//     }
		//     else
		//     {
		//         $page_get = 1;
		//     }
		//     if ($page_get <= 0)
		//     {
		//         $page = 1;
		//     }
		//     else
		//     {
		//         if($page_get <= $total_page)
		//         {
		//             $page = $page_get;
		//         }
		//         else
		//         {
		//             $page = 1;
		//         }
		//     }
		//     #Phân trang
		//     $start_page = ($page - 1) * $num_of_page;
		// 	$end_page = $page * $num_of_page;
			
		// }
	}

 ?>