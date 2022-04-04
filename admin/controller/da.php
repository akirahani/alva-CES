<?php  

	class Da
	{
		function XuliDanhMuc($query){
			$data_danhmuc = $query->DanhSach("danhmuc");
		    $arr_danhmuc = [];
		    foreach ($data_danhmuc as $key => $value) {
		        $arr_danhmuc[$value->id] = $value->ten;
		    }
		    return $arr_danhmuc;
		}
		function XuLiLoai($query){
			$data_loai = $query->DanhSach("loai");
		    $arr_loai = [];
		    foreach ($data_loai as $key => $value) {
		        $arr_loai[$value->id] = [
		            "ten" => $value->ten,
		            "danhmuc" => $value->danhmuc
		        ];
		    }
		    return $arr_loai;
		}
		
		function ThemMoi($query,$lib)
		{
			
	        $file_tmp = [];
	        foreach ($arr_danhmuc as $keyv => $valuev)
	        {
	            $str_pic = "dm-".$keyv;
	    		if(!empty($_FILES['vuong'.$keyv]['tmp_name']))
	            {
	                $hinh_vuong=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['vuong'.$keyv]['name']); 
	                move_uploaded_file($_FILES['vuong'.$keyv]['tmp_name'], "../uploads/van-da/".$hinh_vuong);
	                $file_tmp[$str_pic] = $hinh_vuong;
	            }
	        }

	        // Album
	        if(!empty($_FILES['album']['tmp_name'][0]))
	        {
	            $arr_album=[];
	            foreach($_FILES['album']['tmp_name'] as $key => $tmp_name)
	            {
	                $album_ten=date('Y-m-d-H-i-s').$lib->changeTitle($_FILES['album']['name'][$key]); 
	                array_push($arr_album, $album_ten);      
	                move_uploaded_file($_FILES['album']['tmp_name'][$key], "../uploads/van-da/".$album_ten);
	            }
	            $save_album = implode(",", $arr_album);
	        }
	        else
	        {
	            $save_album = NULL;
	        }

	        // Danh mục
	        if(!empty($_POST['danhmuc']))
	        {
	            $str_danhmuc = implode(",", $_POST['danhmuc']);
	        }
	        else
	        {
	            $str_danhmuc = NULL;
	        }

	        $fields = [ "ten", "vuong", "album", "gioithieu", "noidung", "danhmuc", "xuatxu", "slug", "noibat", "mota" ];
	        $post_form = [
	            "ten" => $_POST['ten'],
	            "vuong" => json_encode($file_tmp),
	            "album" => $save_album,
	            "gioithieu" => $_POST['gioithieu'],
	            "noidung" => $_POST['noidung'],
	            "danhmuc" => $str_danhmuc,
	            "xuatxu" => $_POST['xuatxu'],
	            "slug" => $_POST['slug'],
	            "noibat" => $_POST['noibat'],
	            "mota" => $_POST['mota']
	        ];
	        $last = $query->ThemMoi("da", $fields, $post_form);
	        if(!empty($_POST['thongso']))
	        {
	            foreach ($_POST['thongso'] as $key => $value) 
	            {
	                $fields = [ "da", "thongso" ];
	                $post_form = [
	                    "da" => $last,
	                    "thongso" => $value
	                ];
	                $query->ThemMoi("dathongso", $fields, $post_form);
	            }
	        }
	        if(!empty($_POST['danhmuc']))
	        {
	            foreach ($_POST['danhmuc'] as $key_ddm => $value_ddm) 
	            {
	                $query->ThemMoi("dadanhmuc", ["da", "danhmuc"], ["da" => $last, "danhmuc" => $value_ddm]);
	            }
	        }
	        #Xử lý sản phẩm
	        $data_list = $query->DanhSach("da", ["ten", "vuong", "mota", "slug", "danhmuc"], ["noibat" => "="], [], [], ["noibat" => 1]);
	        $fields = ["sanpham"];
	        $condition = ["id"];
	        $post_form = [
	            "sanpham" => json_encode($data_list),
	            "id" => 1
	        ];
	        $query->CapNhat("company", $fields, $condition, $post_form);
	        header("location:list");
		}
	}

?>