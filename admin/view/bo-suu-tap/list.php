<?php
    #Nhóm - Trang - Phân quyền
    // require_once "model/PhanQuyen.php";
    // $phanquyen = new PhanQuyen();
    // $data_phanquyen = $phanquyen->NhomTrangQuyen($__NHOM__, 3);
    // if( empty($data_phanquyen) || $data_phanquyen->xem == 0 ) header("location:./");

	#Get list
    $fields = ["id", "ten"];
    $sorts = ["id" => "DESC"];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data_list = $query->DanhSach("bosuutap", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<div class="blog small">

	<div class="bread">
		<h1>Bộ sưu tập <span>| danh sách</span></h1>
		<div class="button"><button><a href="them-bo-suu-tap">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<table class="table" style="width:100%">
        <thead>
            <tr>
                <th>TT</th>
                <th>Tên</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $thutu = 1;
            foreach ($data_list as $key => $value) 
            { 
                ?>
                <tr>
                    <td class="can-giua"><?=$thutu?></td>
                    <td><?=$value->ten?></td>
                    <td class="can-giua">
                        <a href="sua-bo-suu-tap?id=<?=$value->id?>"><i class="fal fa-edit"></i></a>
                        <a onClick="return confirm('Bạn muốn xóa?')" href="xoa-bo-suu-tap?id=<?=$value->id?>"><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
                $thutu ++;
            }
            ?>
        </tbody>
    </table>
</div>