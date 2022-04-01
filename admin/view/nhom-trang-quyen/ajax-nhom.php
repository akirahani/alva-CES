
<?php
	require_once("../../model/Query.php");
	$query = new Query();
	if(isset($_POST['nhom'])){
	    if($_POST['nhom'] != 0)
	    {
	    	$idnhom = $_POST['nhom'];
	    	$data_trang = $query->DanhSach('trang',['id','name'],[],[],[]);
	    	$data_phanquyen = $query->DanhSach('phan_quyen',[],['nhom'=>'='],[],[],['nhom'=>$idnhom]);
	    	$arr_trang = [];
	    	foreach ($data_phanquyen as $keypq => $valuepq) 
	    	{
	    		$arr_trang[$valuepq->trang] = [$valuepq->xem, $valuepq->sua, $valuepq->xoa];
	    	}

		    $thutu = 1;
			echo'
			<thead>
			    <tr>
			        <th>TT</th>
			        <th>Tên</th>
			        <th>ID Page</th>
			        <th>Xem</th>
			        <th>Sửa</th>
			        <th>Xóa</th>
			    </tr>
			</thead>
			<tbody>';

		    foreach ($data_trang as $key => $value) 
		    { 
		        ?>

		        <tr>
		            <td class="can-giua"><?=$thutu?></td>
		            <td><?=$value->name?></td>
		            <td class="can-giua"><?=$value->id?></td>
		            <td class="can-giua">
		            <?php 
		            	if(isset($arr_trang[$value->id][0]) && $arr_trang[$value->id][0] == 1 ) 
		            		echo '<i class="fas fa-circle" trang="'.$value->id.'" nhom="'.$idnhom.'" trangthai="1" quyen="xem"></i>'; 
		            	else 
		            		echo '<i class="far fa-circle" trang="'.$value->id.'" nhom="'.$idnhom.'" trangthai="0" quyen="xem"></i>';
		            ?>
		           	</td>
		            <td class="can-giua">
		            <?php 
		            	if( isset($arr_trang[$value->id][1]) && $arr_trang[$value->id][1] == 1 ) 
		            		echo '<i class="fas fa-circle" trang="'.$value->id.'" nhom="'.$idnhom.'" trangthai="1" quyen="sua"></i>'; 
		            	else 
		            		echo '<i class="far fa-circle" trang="'.$value->id.'" nhom="'.$idnhom.'" trangthai="0" quyen="sua"></i>';
		            ?>
		            </td>
		            <td class="can-giua">
		            <?php 
			            if( isset($arr_trang[$value->id][2]) && $arr_trang[$value->id][2] == 1 ) 
			            	echo '<i class="fas fa-circle" trang="'.$value->id.'" nhom="'.$idnhom.'" trangthai="1" quyen="xoa"></i>'; 
			            else 
			            	echo '<i class="far fa-circle" trang="'.$value->id.'" nhom="'.$idnhom.'" trangthai="0" quyen="xoa"></i>';
		        	?>
		        	</td>
		        </tr>
		        <?php
		        $thutu ++;
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
		console.log(nhom,trang,trangthai,quyen);
		$(".loading").show();
		if(trangthai == 1)
		{
			$(this).attr("class", "far fa-circle");
			$(this).attr("trangthai", 0);
		}
		else
		{
			$(this).attr("class", "fas fa-circle");
			$(this).attr("trangthai", 1);
		}
		$.ajax({
			method: "POST",
			data: {nhom:nhom, trang:trang, trangthai:trangthai, quyen:quyen},
			url: "view/nhom-trang-quyen/ajax-save.php",
			success:function()
			{
				$(".loading").hide();
			}
		});
	});
</script>