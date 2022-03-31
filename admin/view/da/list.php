<?php
    // Xử lý danh mục
    $data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
    $arr_danhmuc = [];
    foreach ($data_danhmuc as $key => $value) {
        $arr_danhmuc[$value->id] = $value->ten;
    }
    $arr_danhmuc[0] = "Cập nhật";
    $data_list = $query->DanhSach("da", [], [], ["id" => "DESC"], [], [], []);
    #Phân trang
    $total_row = count($data_list);
    $num_of_page = 15;
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
		<h1>Đá tự nhiên <span>| danh sách</span></h1>
		<div class="button"><button><a href="da/add">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<table class="table" style="width:100%">
        <thead>
            <tr>
                <th>TT</th>
                <th>Tên</th>
                <th>Hình</th>
                <th>Loại</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $thutu = 1;
            foreach ($data_list as $key => $value) 
            {
                if( $key >= $start_page && $key < $end_page)
                {
                ?>
                <tr>
                    <td class="can-giua"><?=$thutu?></td>
                    <td class="can-giua"><?=$value->ten?></td>
                    <td class="can-giua">
                    <?php 
                    $arr_picture = json_decode($value->vuong);
                    foreach ($arr_picture as $key_p => $value_p) 
                    {
                        if($value_p!='')
                        {
                            echo '<img src="../uploads/van-da/'.$value_p.'" height="40"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                    }
                    ?>
                    </td>
                    <td>
                    <?php
                    $str_danhmuc = explode(",", $value->danhmuc);
                    $count_danhmuc = count($str_danhmuc);
                    foreach ($str_danhmuc as $key_dm => $value_dm) 
                    {
                        echo $arr_danhmuc[$value_dm];
                        if($key_dm < $count_danhmuc-1)
                        {
                            echo ',';
                        }
                    }
                    
                    ?> 
                    </td>
                    <td class="can-giua">
                        <a href="da/edit?id=<?=$value->id?>&page=<?=$page_get?>"><i class="fal fa-edit"></i></a>
                        <a onClick="return confirm('Bạn muốn xóa?')" href="da/del?id=<?=$value->id?>&page=<?=$page_get?>"><i class="fal fa-trash-alt"></i></a>
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