<?php
	$data = $query->DanhSach("daily", [], [], [], [], [], []);
    $data_tinhthanh = $query->DanhSach("tinhthanh", [], [], [], [], [], []);
    $arr_tinhthanh = [];
    foreach ($data_tinhthanh as $key => $val) {
        $arr_tinhthanh[$val->id] = $val->ten;
    }
    $arr_tinhthanh[0] = "Cập nhật";
?>
<div class="blog medium">

	<div class="bread">
		<h1>Đại lý <span>| danh sách</span></h1>
		<div class="button"><button><a href="dai-ly/adD">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<table class="table" style="width:100%">
        <thead>
            <tr>
                <th>TT</th>
                <th>Đại lý</th>
                <th>Tỉnh thành</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $thutu = 1;
            foreach ($data as $key => $val) 
            { 
                ?>
                <tr>
                    <td class="can-giua"><?=$thutu?></td>
                    <td class="can-giua"><?=$val->ten?></td>
                    <td class="can-giua"><?=$arr_tinhthanh[$val->tinhthanh]?></td>
                    <td class="can-giua">
                        <a href="dai-ly/edit?id=<?=$val->id?>"><i class="fal fa-edit"></i></a>
                        <a onclick="confirm('Bạn có chắc muốn xóa?')" href="dai-ly/del?id=<?=$val->id?>"><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
                $thutu ++;
            }
            ?>
        </tbody>
    </table>
	<div class="clear"></div>
</div>
