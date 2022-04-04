<?php 
	Class ThanhVien{
		function ThemMoi($query){
			if($_POST['username'] != "")
			{
	            $check_thanhvien = $query->ChiTiet("thanhvien", [], ["username" => "="],["username" => $_POST['username']]);
	            if(empty($check_thanhvien))
	            {
	                $fields = ["username", "fullname", "matkhau", "nhom", "actived", "hinhanh"];
	                $post_form = [
	                    'username' => $_POST['username'],
	                    'fullname' => $_POST['fullname'],
	                    'matkhau' => md5($_POST['password']),
	                    'nhom' => 1,
	                    'actived' => 1,
	                    'hinhanh' => 'alva.png'
	                ];
	                $query->ThemMoi("thanhvien", $fields, $post_form);
	                header("location:list");
	            }
	            else
	            {
	                echo '<h1 style="color:red">User thành viên đã tồn tại!</h1>';
	            }
	        }
	        else
	        {
	            header("location:add");
	        }
		}
		function Passd($query,$__ID__){
			if($_POST['password'] != "")
	        {
	            $fields = [ "matkhau" ];
	            $condition = ["id"];
	            $post_form = [
	                'matkhau' => md5($_POST['password']),
	                'id' => $__ID__
	            ];
	            $query->CapNhat("thanhvien", $fields, $condition, $post_form);
	            header("location:reset-mat-khau");
	        }
		}
		function Reset($query,$id){
			if($_POST['matkhau'] != "")
	        {
	            $fields = ["matkhau"];
	            $condition = ["id"];
	            $post_form = [
	                "matkhau" => md5($_POST['matkhau']),
	                "id" => $id
	            ];
	            $query->CapNhat("thanhvien", $fields, $condition, $post_form);
	            header("location:list");
	        }
		}
		function Edit($query,$id){
			 if($_POST['fullname'] != "")
	        {
	            $fields = ["fullname"];
	            $condition = ["id"];
	            $post_form = [
	                "fullname" => $_POST['fullname'],
	                "id" => $id
	            ];
	            $query->CapNhat("thanhvien", $fields, $condition, $post_form);
	            header("location:list");
	        }
		}
	}

 ?>