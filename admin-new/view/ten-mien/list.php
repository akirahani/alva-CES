<?php
	#Get list
	$fields = [];
	$sorts = ["id" => "DESC"];
	$limits = [];
	$condition = [];
	$forms = [];
    $search = [];
	$data_tenmien = $query->DanhSach("tenmien", $fields, $condition, $sorts, $limits, $forms, $search);

	#Phân trang
    $total_row = count($data_tenmien);
    $num_of_page = 10;
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
<div class="blog">
    <div class="bread">
        <h1>Tên miền<span> | danh sách</span></span></h1>
        <div class="button">
            <button><a href="them-ten-mien">Add</a></button>
        </div>
        <div class="clear"></div>
    </div>

	<table class="table" style="width:100%">
        <thead>
            <tr>
            	<th>TT</th>
                <th>Name</th>
                <th>Link</th>
                <th>Appro</th>
                <th>Expired</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
        	$thutu = 1;
            foreach ($data_tenmien as $key => $value) 
            {
            	if( $key >= $start_page && $key < $end_page)
				{
	            	?>
	                <tr>
	                	<td class="can-giua"><?=$thutu?></td>
	                    <td><?=$value->ten?></td>
	                    <td class="can-giua"><a target="_blank" href="http://<?=$value->dns?>"><?=$value->dns?></a></td>
	                    <td class="can-giua"><?=$value->ngay?></td>
	                    <td class="can-giua"><?=$value->ngayhet?></td>
	                    <td class="can-giua">
	                    	<a href="sua-ten-mien?id=<?=$value->id?>&page=<?=$page_get?>"><i class="fas fa-pencil"></i></a>
	                    	<a onClick="return confirm('Are you sure?')" href="xoa-ten-mien?id=<?=$value->id?>&page=<?=$page_get?>"><i class="fal fa-trash-alt"></i></a>
	                    </td>
	                </tr>
	            	<?php
                	$thutu ++;
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