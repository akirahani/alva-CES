<?php
	require_once "../../model/Query.php";
	$query = new Query();
	if(isset($_POST['nhom'])){
		  if($_POST['nhom'] != 0)
	    {
	    	$idnhom = $_POST['nhom'];
	 		$data_trang = $query->DanhSach('trang');
	 		$arr_trang = [];
	 		$phan_quyen = $query->DanhSach('phanquyen',[],["nhom"=>"="],[],[],["nhom"=>$idnhom]);
	 		foreach ($phan_quyen as $key => $value) {
	 			$arr_trang[$value->trang] = [$value->xem, $value->them, $value->sua, $value->xoa];
	 		}
			echo'
			<thead>
			    <tr>
			        <th>TT</th>
			        <th>Tên</th>
			        <th>Trang</th>
			        <th>Xem</th>
			        <th>Thêm</th>
			        <th>Sửa</th>
			        <th>Xóa</th>
			    </tr>
			</thead>
			<tbody>';

		    foreach ($data_trang as $key => $value) 
		    { 
		        ?>
		        <tr>
		            <td class="can-giua"><?=$key+1?></td>
		            <td class="can-giua"><?=$value->ten?></td>
		            <td class="can-giua"><?=$value->trang?></td>
		            <td class="can-giua">
		            <?php 
		            	if(isset($arr_trang[$value->trang][0]) && ($arr_trang[$value->trang][0]) ==1){
		            		echo'<i class="fas fa-circle" nhom="'.$idnhom.'" trang="'.$value->trang.'"  trangthai="1" quyen="xem"></i>';
		            	}
		            	else{
		            		echo'<i class="far fa-circle" nhom="'.$idnhom.'" trang="'.$value->trang.'"  trangthai="0" quyen="xem"></i>';
		            	}
		            ?>
		           	</td>
		           	 <td class="can-giua">
		            <?php 
		            	if(isset($arr_trang[$value->trang][1]) && ($arr_trang[$value->trang][1]) ==1){
		            		echo'<i class="fas fa-circle" nhom="'.$idnhom.'" trang="'.$value->trang.'"  trangthai="1" quyen="them"></i>';
		            	}
		            	else{
		            		echo'<i class="far fa-circle" nhom="'.$idnhom.'" trang="'.$value->trang.'"  trangthai="0" quyen="them"></i>';
		            	}
		            ?>
		           	</td>
		            <td class="can-giua">
		            <?php 
		            	if( isset($arr_trang[$value->trang][2]) && $arr_trang[$value->trang][2] == 1 ) 
		            		echo '<i class="fas fa-circle" trang="'.$value->trang.'" nhom="'.$idnhom.'" trangthai="1" quyen="sua"></i>'; 
		            	else 
		            		echo '<i class="far fa-circle" trang="'.$value->trang.'" nhom="'.$idnhom.'" trangthai="0" quyen="sua"></i>';
		            ?>
		            </td>
		            <td class="can-giua">
		            <?php 
			            if( isset($arr_trang[$value->trang][3]) && $arr_trang[$value->trang][3] == 1 ) 
			            	echo '<i class="fas fa-circle" trang="'.$value->trang.'" nhom="'.$idnhom.'" trangthai="1" quyen="xoa"></i>'; 
			            else 
			            	echo '<i class="far fa-circle" trang="'.$value->trang.'" nhom="'.$idnhom.'" trangthai="0" quyen="xoa"></i>';
		        	?>
		        	</td>
		        </tr>
		        <?php
		    }
			echo '</tbody>';
		}
	}
  
?>
<script>
	$(".fa-circle").click(function(){
		let nhom = $(this).attr("nhom");
		let trang = $(this).attr("trang");
		let trangthai = $(this).attr("trangthai");
		let quyen = $(this).attr("quyen");
		if(trangthai == 0)
		{
			$(this).attr("class", "fas fa-circle");
			$(this).attr("trangthai", 1);
		}
		else
		{
			$(this).attr("class", "far fa-circle");
			$(this).attr("trangthai", 0);
		}
		$.ajax({
			method: "POST",
			data: {nhom:nhom, trang:trang, trangthai:trangthai, quyen:quyen},
			url: "view/nhom-trang-quyen/ajax-save.php",
		});
	});
</script>