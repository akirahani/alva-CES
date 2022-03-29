<?php 
	$data_list = $query->DanhSach("tintuc", ["vuong", "ten", "mota", "noibat", "ngay", "slug"], [], ["id" => "DESC"], [], []);
	#Phân trang
    $total_row = count($data_list);
    $num_of_page = 9;
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
    $start_page = ($page - 1) * $num_of_page;
	$end_page = $page * $num_of_page;
	#Xử lý tin
	$arr_noibat = [];
	$arr_hot = [];
	$arr_page = [];
	foreach ($data_list as $key => $value) 
	{
		if($key < 5)
		{
			$arr_hot[$value->slug] = $value;
		}
		if($value->noibat == 1)
		{
			$arr_noibat[$value->slug] = $value;
		}
		if( $key >= $start_page && $key < $end_page)
		{
			$arr_page[$value->slug] = $value;
		}
	}
	$tit = "Tin tức về đá ngọc tự nhiên";
	$des = "Tin tức về đá ngọc tự nhiên";
	$key = "Tin tức về đá ngọc tự nhiên";
	$link = $__URL__;
	$thumbs = $ROOT."uploads/thumbs.png";
?>