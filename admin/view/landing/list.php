<?php
	$data = $query->DanhSach("landing", [], [], ["id"=>"DESC"], [], []);

?>
<script src="lib/clipboard/clipboard.min.js"></script>

<div class="blog medium">
	<div class="bread">
		<h1>Landing <span>| danh sach</span></h1>
		<div class="button">
			<button><a href="landing/add">Thêm mới</a></button>
		</div>
		<div class="clear"></div>
	</div>

	<table class="table" style="width:100%">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Link</th>
                <th>Ngày bắt đầu</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	foreach ($data as $key => $val) 
        	{

        	?>		
		        <tr id="remove<?=$val->id?>">
		        	<td><p><?=$val->ten ?></p></td>
		        	<td><a href="<?php echo $val->link ?>"><?php echo $val->link ?></a></td>
		        	<td class="can-giua"><?=$val->ngaydau ?></td>
 					<td class="can-giua">
		            	<a href="landing/edit?id=<?=$val->id?>"><i class="fas fa-pencil"></i></a>
                    	<a onclick="confirm('Bạn có chắc chắn muốn xóa ?')" href="landing/del?id=<?=$val->id?>"  class="remove_landing"><i class="fal fa-trash-alt"></i></a>
                    </td>
		        </tr>
			<?php
        	}
            ?>
        </tbody>
    </table>
</div>