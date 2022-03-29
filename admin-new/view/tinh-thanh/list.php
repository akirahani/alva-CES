<?php
    // Xử lý vùng miền
    $data_vungmien = $query->DanhSach("vungmien", [], [], [], [], [], []);
    $arr_vungmien = [];
    foreach ($data_vungmien as $key => $value) {
        $arr_vungmien[$value->id] = $value->ten;
    }
    $arr_vungmien[0] = "Cập nhật";

    $data_list = $query->DanhSach("tinhthanh", [], [], [], [], [], []);
?>
<div class="blog small">

	<div class="bread">
		<h1>Tỉnh thành <span>| danh sách</span></h1>
		<div class="button"><button><a href="them-tinh-thanh">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<table class="table" style="width:100%">
        <thead>
            <tr>
                <th>TT</th>
                <th>Tên</th>
                <th>Vùng</th>
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
                    <td class="can-giua"><?=$value->ten?></td>
                    <td class="can-giua"><?=$arr_vungmien[$value->vungmien]?></td>
                    <td class="can-giua">
                        <a href="sua-tinh-thanh?id=<?=$value->id?>"><i class="fal fa-edit"></i></a>
                        <a onClick="return confirm('Are you sure?')" href="xoa-tinh-thanh?id=<?=$value->id?>"><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
                $thutu ++;
            }
            ?>
        </tbody>
    </table>
</div>