<?php 
	$data = $query->DanhSach('banner', ['id','ten','mobile'], [], ["id"=>"DESC"], []);
?>
<div class="blog small">
	<div class="bread">
		<h1>Loại <span>| danh sách</span></h1>
		<div class="button"><button><a href="./banner/add">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>
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
					<tr>
			            <td class="can-giua"><?=$key+1?></td>
			            <td><?=$val->ten?></a></td>
			            <td class="can-giua"><img src="../uploads/banner/<?=$val->mobile?>" height=30 /></td>
			            <td class="can-giua">
			            	<a href="banner/edit?id=<?=$val->id?>"><i class="fas fa-pencil"></i></a>
	                    	<a onclick="confirm('Bạn có chắc muốn xóa?')" href="banner/del?id=<?=$val->id?>"><i class="fal fa-trash-alt"></i></a>
	                    </td>
			        </tr>

				<?php

			}
			?> 
        </tbody>
    </table>
</div>