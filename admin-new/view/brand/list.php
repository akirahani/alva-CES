<?php 
	#Get list
	$fields = ["id", "ten"];
	$sorts = ["id" => "DESC"];
	$limits = [];
	$condition = [];
	$forms = [];
    $search = [];
	$data_list = $query->DanhSach("brand", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<div class="blog small">
	<div class="bread">
		<h1>Chuyên đề <span>| danh sách</span></h1>
		<div class="button"><button><a href="them-chuyen-de">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>
	<table class="table">
        <thead>
            <tr>
				<th>TT</th>
				<th>Tên</th>
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
			            <td><?=$value->ten?></td>
			            <td class="can-giua">
			            	<a href="sua-chuyen-de?id=<?=$value->id?>"><i class="fas fa-pencil"></i></a>
	                    	<a onClick="return confirm('Are you sure?')" href="xoa-chuyen-de?id=<?=$value->id?>"><i class="fal fa-trash-alt"></i></a>
	                    </td>
			        </tr>
				<?php
				$thutu++;
			}
			?>
        </tbody>
    </table>
</div>