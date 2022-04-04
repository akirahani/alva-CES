<?php  
	class Landing 
	{
		function ThemMoi($query){
			if($_POST['ten'] != '' && $_POST['link'] != '' && (strtotime($_POST['ngaydau']) < strtotime($_POST['ngayhet'])))
				{
					$fields = [	"ten", "link", "ngaydau", "ngayhet" ];
					$post_form = [
						"ten" => $_POST['ten'],
						"link" => $_POST['link'],
						"ngaydau" => $_POST['ngaydau'],
						"ngayhet" => $_POST['ngayhet']
					];
					$query->ThemMoi("landing", $fields, $post_form);
					$landing = $query->DanhSach("landing", [], [], [], [], [], []);
					$this->XuLiLuu($query,$landing);
					header("location:list");
				}
				else
				{	
					echo "<script>
				     	 	window.location.href = 'landing/add';
				      		alert('Cần xem lại thông tin về thời gian');
						</script>";
				}
		}
		function CapNhat($query,$id)
		{
			if($_POST['ten'] != '' && $_POST['link'] != ''  && (strtotime($_POST['ngaydau']) < strtotime($_POST['ngayhet'])))
			{
				$fields = ["ten", "link", "ngaydau", "ngayhet"];
		        $condition = ["id"];
		        $post_form = [
					"ten" => $_POST['ten'],
					"link" => $_POST['link'],
					"ngaydau" => $_POST['ngaydau'],
					"ngayhet" => $_POST['ngayhet'],
		            "id" => $id
		        ];
		        $query->CapNhat("landing", $fields, $condition, $post_form);
		        $landing = $query->DanhSach("landing", [], [], [], [], [], []);
		        $this->XuLiLuu($query,$landing);
				header("location:list");
			}
			else
			{
				echo "<script>
			     	 window.location.href = 'landing/edit?id=$id';
			      	alert('Cần xem lại thông tin về thời gian');
				</script>";
			}
		}
		function Xoa($query,$id){
			$operator = ["id" => "="];
			$condition = ["id" => $id];
			$query->Xoa("landing", $operator, $condition);
		    $landing = $query->DanhSach("landing", [], [], [], [], [], []);
		    $this->XuLiLuu($query,$landing);
		    header('location:list');
		}
		function XuLiLuu($query,$landing){
			$arr_landing = [];
	        foreach ($landing as $key => $value) {
	        	$arr_landing[$value->link] = [$value->id, $value->ten];
	        }
	        $fields = ["landing"];
	        $condition = ["id"];
	        $post_form = [
				"landing" => json_encode($arr_landing),
	            "id" => 1
	        ];
	        $query->CapNhat("company", $fields, $condition, $post_form);
	        header("location:list");
		}

	}


?>