<?php 
	#Get list
	$fields = ["id", "ten", "hinh"];
	$sorts = ["id" => "DESC"];
	$limits = [];
	$condition = [];
	$forms = [];
	$data_list = $query->DanhSach("bannerdanhmuc");
?>
<div class="blog small">
	<div class="bread">
		<h1>Banner danh mục <span>| danh sách</span></h1>
		<div class="button"><button><a href="banner-danh-muc/add">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>
	<table class="table">
        <thead>
            <tr>
				<th>TT</th>
				<th>Tên</th>
				<th>Hình</th>
				<th>Chọn</th>
			</tr>
        </thead>
        <tbody>
            <?php
 			$thutu=1;
 			foreach ($data_list as $key => $value) 
			{
				
				?>
					<tr  id="remove<?=$value->id?>">
			            <td class="can-giua"><?=$thutu?></td>
			            <td><?=$value->ten?></a></td>
			            <td class="can-giua"><img src="../uploads/banner-danh-muc/<?=$value->hinh?>" height=30 /></td>
			            <td class="can-giua">
			            	<a href="banner-danh-muc/edit?id=<?=$value->id?>"><i class="fas fa-pencil"></i></a>
	                    	<a data-id ="<?=$value->id?>" style="cursor: pointer;" class="remove_banner_danh_muc"><i class="fal fa-trash-alt"></i></a>
	                    </td>
			        </tr>
				<?php
				$thutu++;
			}
			?>
        </tbody>
    </table>
</div>
<script>
	$('.remove_banner_danh_muc').click(function(){
		const cfrm = confirm('Bạn có chắc chắn muốn xóa ?');
        var id = $(this).data('id');
        if(cfrm ==true){
            $.ajax({
                url : "banner-danh-muc/del",
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