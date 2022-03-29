<?php 
	require_once "../../model/Query.php";
	$query = new Query();
	
	#Xử lý danh mục
    $data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
    $arr_danhmuc = [];
    foreach ($data_danhmuc as $key => $value) {
        $arr_danhmuc[$value->id] = $value->ten;
    }
    $arr_danhmuc[0] = "Update";

    #Xử lý loại
    $data_loai = $query->DanhSach("loai", [], [], [], [], [], []);
    $arr_loai = [];
    foreach ($data_loai as $key => $value) {
        $arr_loai[$value->id] = [
            "ten" => $value->ten,
            "danhmuc" => $value->danhmuc
        ];
    }
    $arr_loai[0] = "Update";

	$id_danhmuc = $_POST['danhmuc'];
	$id_loai = $_POST['loai'];
	#Get list
    $fields = [];
    $sorts = [];
    $limits = [];
    $condition = ["danhmuc" => "=", "loai" => "="];
    $forms = ["danhmuc" => $id_danhmuc, "loai" => $id_loai];
    $search = [];
    $data_list = $query->DanhSach("thongso", $fields, $condition, $sorts, $limits, $forms, $search);
    echo "<br>";
	foreach ($data_list as $key => $value) 
    {
        $view_danhmuc = '';
        $phanloai = $value->loai;
        $ten_danhmuc = $arr_danhmuc[$value->danhmuc];
        echo '<label><input type="checkbox" name="thongso[]" value="'.$value->id.'"> '.$value->ten.' - '.$arr_loai[$phanloai]["ten"].' - '.$ten_danhmuc.'</label><br><br>';
    }
?>