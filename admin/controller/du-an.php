<?php  
	class DuAn
	{
		
		function ThemMoi($query,$lib)
		{
			// Hình vuông
			if(!empty($_FILES['vuong']['tmp_name']))
	        {
	            $hinh_vuong=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['vuong']['name']); 
	            move_uploaded_file($_FILES['vuong']['tmp_name'], "../uploads/du-an/".$hinh_vuong);
	        }
	        else
	        {
	            $hinh_vuong = NULL;
	        }
	        // Hình dài
	        if(!empty($_FILES['dai']['tmp_name']))
	        {
	            $hinh_dai=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['dai']['name']); 
	            move_uploaded_file($_FILES['dai']['tmp_name'], "../uploads/du-an/".$hinh_dai);
	        }
	        else
	        {
	            $hinh_dai = NULL;
	        }
	        // Album
	        if(!empty($_FILES['album']['tmp_name'][0]))
	        {
	            $arr_album=[];
	            foreach($_FILES['album']['tmp_name'] as $key => $tmp_name)
	            {
	                $album_ten=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['album']['name'][$key]); 
	                array_push($arr_album, $album_ten);      
	                move_uploaded_file($_FILES['album']['tmp_name'][$key], "../uploads/du-an/".$album_ten);
	            }
	            $save_album = implode(",", $arr_album);
	        }
	        else
	        {
	            $save_album = NULL;
	        }
	        $fields = [	"ten", "vuong", "dai", "album", "gioithieu", "noidung", "loai" ];
	        $post_form=[
	        	"ten" => $_POST['ten'],
	        	"vuong" => $hinh_vuong,
	        	"dai" => $hinh_dai,
	        	"album" => $save_album,
	        	"gioithieu" => $_POST['gioithieu'],
	        	"noidung" => $_POST['noidung'],
	        	"loai" => $_POST['loai']
	        ];
	        $query->ThemMoi("duan", $fields, $post_form);
	        header("location:list");
		}
		function ChiTietAlbum($data_detail){
		    // Album
		    if($data_detail->album != NULL)
		    {
		        $arr_album_old = explode(",", $data_detail->album);
		  
		    }
		    else
		    {
		        $arr_album_old = [];
		    }
		 	return  $arr_album_old;
		
		  
		}
		function CapNhat($query,$id,$data_detail,$lib)
		{
		    if($data_detail->vuong != NULL)
		    {
		        $vuong_old = $data_detail->vuong;
		    }
		    else
		    {
		        $vuong_old = NULL;
		    }
		    // Hình dài
		    if($data_detail->dai != NULL)
		    {
		        $dai_old = $data_detail->dai;
		    }
		    else
		    {
		        $dai_old = NULL;
		    }
		    // Album
		    if($data_detail->album != NULL)
		    {
		        $arr_album_old = explode(",", $data_detail->album);
		    }
		    else
		    {
		        $arr_album_old = [];
		    }
			if(!empty($_FILES['vuong']['name']))
	        {  
	            $vuong=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['vuong']['name']);      
	            move_uploaded_file($_FILES['vuong']['tmp_name'], "../uploads/du-an/".$vuong);
	            if($vuong_old != NULL)
	            {
	            	unlink('../uploads/du-an/'.$vuong_old);
	            }
	            $vuong_save = $vuong;
	        }
	        else
	        {
	            $vuong_save = $vuong_old;
	        }
	        // Hinhg dài
	        if(!empty($_FILES['dai']['name']))
	        {  
	            $dai=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['dai']['name']);      
	            move_uploaded_file($_FILES['dai']['tmp_name'], "../uploads/du-an/".$dai);
	            if($dai_old != NULL)
	            {
	            	unlink('../uploads/du-an/'.$dai_old);
	            }
	            $dai_save = $dai;
	        }
	        else
	        {
	            $dai_save = $dai_old;
	        }
	        // Album
	        if(!empty($_FILES['album']['tmp_name'][0]))
	        {
	        	// Lưu file album
	            $arr_album=[];
	            foreach($_FILES['album']['tmp_name'] as $key => $tmp_name)
	            {
	                $album_ten=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['album']['name'][$key]); 
	                array_push($arr_album, $album_ten);      
	                move_uploaded_file($_FILES['album']['tmp_name'][$key], "../uploads/du-an/".$album_ten);
	            }
	            $save_album = implode(",", $arr_album);
	            // Xóa file
	            if($data_detail->album != NULL)
	            {
	            	foreach ($arr_album_old as $key_del => $value_del) {
	            		unlink('../uploads/du-an/'.$value_del);
	            	}
	            }
	        }
	        else
	        {
	            $save_album = implode(",", $arr_album_old);
	        }
	        $fields = [ "ten", "vuong", "dai", "album", "gioithieu", "noidung", "loai" ];
	        $condition = ["id"];
	        $post_form = [
	        	"id" => $id,
	        	"ten" => $_POST['ten'],
	        	"vuong" => $vuong_save,
	        	"dai" => $dai_save,
	        	"album" => $save_album,
	        	"gioithieu" => $_POST['gioithieu'],
	        	"noidung" => $_POST['noidung'],
	        	"loai" => $_POST['loai']
	        ];
	        $query->CapNhat("duan", $fields, $condition, $post_form);
	        header("location:list");
		}
		function Xoa($query,$id)
		{
			$data_detail = $query->ChiTiet("duan", [],["id" => "="], ["id" => $id]);
			unlink('../uploads/du-an/'.$data_detail->vuong);
			unlink('../uploads/du-an/'.$data_detail->dai);
			$arr_album = explode(",", $data_detail->album);
			foreach ($arr_album as $key => $value) {
				unlink('../uploads/du-an/'.$value);
			}
			$query->Xoa("duan", ['id'=> '='], ['id'=>$id]);
			header("location:list");
		}
	}

?>