<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	isset($_GET ['page']) ? $page_get = intval($_GET ['page']) : $page_get = 1;
	#Detail
	$fields = [];
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$data_detail = $query->ChiTiet("da", $fields, $operator, $condition);
	
	// Hình vuông
	if($data_detail->vuong != NULL)
	{
		$vuong_old = json_decode($data_detail->vuong);
	}
	else
	{
		$vuong_old = NULL;
	}
	
	// Album
	if($data_detail->album != NULL)
	{
		$arr_album_old = explode(",", $data_detail->album);
	}
	else
	{
		$arr_album_old = [];
	}

	// Xóa hình đại diện
	if($vuong_old != NULL)
    {
    	foreach ($vuong_old as $key_v => $value_v) 
    	{
    		unlink('../uploads/van-da/'.$value_v);
    	}
    }

	// Xóa Album
    if($data_detail->album != NULL)
    {
    	foreach ($arr_album_old as $key_del => $value_del) {
    		unlink('../uploads/van-da/'.$value_del);
    	}
    }
    $query->Xoa("da", $operator, $condition);
    $query->Xoa("dathongso", ["da" => "="], ["da" => $id]);
    $query->Xoa("dadanhmuc", ["da" => "="], ["da" => $id]);
    #Xử lý sản phẩm
    $data_list = $query->DanhSach("da", ["ten", "vuong", "mota", "slug", "danhmuc"], ["noibat" => "="], [], [], ["noibat" => 1]);
    $fields = ["sanpham"];
    $condition = ["id"];
    $post_form = [
        "sanpham" => json_encode($data_list),
        "id" => 1
    ];
    $query->CapNhat("company", $fields, $condition, $post_form);
    header("location:list?page=".$page_get);
?>