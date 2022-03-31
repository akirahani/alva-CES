<?php 
	#Get list
	$fields = ["id", "ten", "hinh"];
	$sorts = ["id" => "DESC"];
	$limits = [];
	$condition = [];
	$forms = [];
    $search = [];
	$data_list = $query->DanhSach("thuonghieu", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<div class="blog small">
	<div class="bread">
		<h1>Thương hiệu <span>| danh sách</span></h1>
		<div class="button"><button><a href="them-thuong-hieu">Thêm mới</a></button></div>
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
					<tr>
			            <td class="can-giua"><?=$thutu?></td>
			            <td><?=$value->ten?></a></td>
			            <td class="can-giua"><img src="../uploads/hang/<?=$value->hinh?>" height=30 /></td>
			            <td class="can-giua">
			            	<a href="sua-thuong-hieu?id=<?=$value->id?>"><i class="fas fa-pencil"></i></a>
	                    	<a onClick="return confirm('Are you sure?')" href="xoa-thuong-hieu?id=<?=$value->id?>"><i class="fal fa-trash-alt"></i></a>
	                    </td>
			        </tr>
				<?php
				$thutu++;
			}
			?>
        </tbody>
    </table>
</div>