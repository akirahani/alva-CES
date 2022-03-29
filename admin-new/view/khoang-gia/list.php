<?php 
	#Get list
	$fields = ["id", "ten", "thutu"];
	$sorts = ["thutu" => "ASC"];
	$limits = [];
	$condition = [];
	$forms = [];
    $search = [];
	$data_list = $query->DanhSach("khoanggia", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<div class="blog small">
	<div class="bread">
		<h1>Khoảng giá <span>| danh sách</span></h1>
		<div class="button"><button><a href="them-khoang-gia">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>
	<table class="table">
        <thead>
            <tr>
				<th>TT</th>
				<th>Tên</th>
				<th>Thứ tự</th>
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
			            <td class="can-giua"><?=$value->thutu?></a></td>
			            <td class="can-giua">
			            	<a href="sua-khoang-gia?id=<?=$value->id?>"><i class="fas fa-pencil"></i></a>
	                    	<a onClick="return confirm('Are you sure?')" href="xoa-khoang-gia?id=<?=$value->id?>"><i class="fal fa-trash-alt"></i></a>
	                    </td>
			        </tr>
				<?php
				$thutu++;
			}
			?>
        </tbody>
    </table>
</div>