<?php
	if($arr_phanquyen->xem == 0){header("location:thong-bao");}

	$data = $query->DanhSach('banner', ['id','ten','mobile'], [], ["id"=>"DESC"], []);
?>
<div class="blog small">
	<div class="bread">
		<h1>Loại <span>| danh sách</span></h1>
		<div class="button"><button><a href="./banner/add">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>
	<?php
		echo '<h1>Chao</h1>';
		echo 'nhom:'.$__NHOM__;
		echo '<br>trang:'.$ps;
		echo "<pre>";
		print_r($arr_phanquyen);
		echo "</pre>";
	?>
	<table class="table">
        <thead>
            <tr>
				<th>TT</th>
				<th>Tên</th>
				<th>Hình</th>
				<th>Tác vụ</th>
			</tr>
        </thead>
        <tbody>
            <?php
 			foreach ($data as $key => $val) 
			{
				?>	
					<tr id="remove<?=$val->id?>">
			            <td class="can-giua"><?=$key+1?></td>
			            <td><?=$val->ten?></a></td>
			            <td class="can-giua"><img src="../uploads/banner/<?=$val->mobile?>" height=30 /></td>
			            <td class="can-giua">
			            	<a href="banner/edit?id=<?=$val->id?>"><i class="fas fa-pencil"></i></a>
	                    	<a data-id ="<?=$val->id?>" style="cursor: pointer;" class="remove" ><i class="fal fa-trash-alt"></i></a>
	                    </td>
			        </tr>

				<?php

			}
			?>
			<!-- href="banner/del?id=<?= $val->id?>" -->
        </tbody>
    </table>
</div>
<script>
	$('.remove').click(function(){
		const cfrm = confirm('Bạn có chắc chắn muốn xóa ?');
		var id = $(this).data('id');
		if(cfrm ==true){
			$.ajax({
				url : "banner/del",
				method :"GET",
				data:{
					id :id 
				},
				success:function(data){
					$('#remove'+id).remove();
				}

			})
		}
	});
</script>