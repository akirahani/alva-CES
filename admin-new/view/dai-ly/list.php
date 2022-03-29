<?php
	$data_daily = $query->DanhSach("daily", [], [], [], [], [], []);
    $data_tinhthanh = $query->DanhSach("tinhthanh", [], [], [], [], [], []);
    $arr_tinhthanh = [];
    foreach ($data_tinhthanh as $key => $value) {
        $arr_tinhthanh[$value->id] = $value->ten;
    }
    $arr_tinhthanh[0] = "Cập nhật";
?>
<div class="blog medium">

	<div class="bread">
		<h1>Đại lý <span>| danh sách</span></h1>
		<div class="button"><button><a href="them-dai-ly">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<table class="table" style="width:100%">
        <thead>
            <tr>
                <th>TT</th>
                <th>Đại lý</th>
                <th>Tỉnh thành</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $thutu = 1;
            foreach ($data_daily as $key => $value) 
            { 
                ?>
                <tr>
                    <td class="can-giua"><?=$thutu?></td>
                    <td class="can-giua"><?=$value->ten?></td>
                    <td class="can-giua"><?=$arr_tinhthanh[$value->tinhthanh]?></td>
                    <td class="can-giua">
                        <a href="sua-dai-ly?id=<?=$value->id?>"><i class="fal fa-edit"></i></a>
                        <a onClick="return confirm('Are you sure?')" href="xoa-dai-ly?id=<?=$value->id?>"><i class="fal fa-trash-alt"></i></a>
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