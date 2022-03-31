<?php 
	require_once "../../model/Query.php";
	// require_once "../../model/DanhMuc.php";
	// require_once "../../model/Loai.php";

	$query = new Query();
	// $danhmuc = new DanhMuc();
	// $loai = new Loai();

	// Xử lý danh mục
    $data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
    $arr_danhmuc = [];
    foreach ($data_danhmuc as $key => $value) 
    {
        $arr_danhmuc[$value->id] = $value->ten;
    }
    $arr_danhmuc[0] = "Cập nhật";

    // Xử lý loại
    $data_loai = $query->DanhSach("loai", [], [], [], [], [], []);
    $arr_loai = [];
    foreach ($data_loai as $key => $value) 
    {
        $arr_loai[$value->id] = $value->ten;
    }
    $arr_loai[0] = "Cập nhật";

	if($_POST['danhmuc'] != 0 && $_POST['loai'] != 0)
	{
		//$data_thongso = $thongso->DanhSachDanhMucLoai(["danhmuc" => $_POST['danhmuc'], "loai" => $_POST['loai']]);
        $data_thongso = $query->DanhSach("thongso", [], ["danhmuc" => "=", "loai" => "="], [], [], ["danhmuc" => $_POST['danhmuc'], "loai" => $_POST['loai']], []);
		$thutu = 1;
        foreach ($data_thongso as $key => $value) 
        { 
            ?>
            <tr>
                <td class="can-giua"><?=$thutu?></td>
                <td><?=$value->ten?></td>
                <td class="can-giua"><?=$arr_danhmuc[$value->danhmuc]?></td>
                <td class="can-giua"><?=$arr_loai[$value->loai]?></td>
                <td class="can-giua"><a href="cap-nhat-thong-so?id=<?=$value->id?>"><i class="fal fa-edit"></i></a></td>
            </tr>
            <?php
            $thutu ++;
        }
	}
	else
	{
		?>
        <tr>
            <td class="can-giua">1</td>
            <td>Chọn đủ thông tin danh mục và loại</td>
            <td class="can-giua"></td>
            <td class="can-giua"></td>
            <td class="can-giua"></td>
        </tr>
        <?php
	}
?>