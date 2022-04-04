<?php 
	$data_list = $query->DanhSach("tintuc",  ["id", "ten", "vuong"], [],["id" => "DESC"],[],[], []);

	#Phân trang
    $total_row = count($data_list);
    $num_of_page = 25;
    $total_page = ceil($total_row / $num_of_page);
    if(isset($_GET ['page']))
    {
        $page_get = intval($_GET ['page']);
    }
    else
    {
        $page_get = 1;
    }
    if ($page_get <= 0)
    {
        $page = 1;
    }
    else
    {
        if($page_get <= $total_page)
        {
            $page = $page_get;
        }
        else
        {
            $page = 1;
        }
    }
    #Phân trang
    $start_page = ($page - 1) * $num_of_page;
	$end_page = $page * $num_of_page;
?>
<div class="blog small">
	<div class="bread">
		<h1>Tin tức <span>| danh sách</span></h1>
		<div class="button"><button><a href="tin-tuc/add">Thêm mới</a></button></div>
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
				if( $key >= $start_page && $key < $end_page)
				{
				?>
					<tr id="remove<?=$value->id?>">
			            <td class="can-giua"><?=$thutu?></td>
			            <td class="can-giua"><?=$value->ten?></a></td>
			            <td class="can-giua"><img src="../uploads/tin-tuc/<?=$value->vuong?>" height=30 /></td>
			            <td class="can-giua">
			            	<a href="tin-tuc/edit?id=<?=$value->id?>"><i class="fas fa-pencil"></i></a>
	                    	<a  onclick="confirm('Bạn có chắc muốn xóa?')" href="tin-tuc/del?id=<?=$value->id?> " ><i class="fal fa-trash-alt"></i></a>
	                    </td>
			        </tr>
				<?php
				$thutu++;
				}
			}
			?>
        </tbody>
    </table>

    <?php 
	if($total_row > $num_of_page)
	{
		echo '<div class="page">';
            echo '<ul>';
				echo $lib->PhanTrang($p.'?', $total_page, $page);
			echo '</ul>';
		echo '</div>';
	}
	?>
</div>
