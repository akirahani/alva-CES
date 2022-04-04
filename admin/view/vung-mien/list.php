<?php
    $data = $query->DanhSach("vungmien");
?>
<div class="blog small">

	<div class="bread">
		<h1>Vùng miền <span>| danh sách</span></h1>
		<div class="button"><button><a href="vung-mien/adD">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<table class="table" style="width:100%">
        <thead>
            <tr>
                <th>TT</th>
                <th>Tên</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $thutu = 1;
            foreach ($data as $key => $val) 
            { 
                ?>
                <tr id="remove<?=$val->id?>">
                    <td class="can-giua"><?=$thutu?></td>
                    <td><p style="text-align: center"><?=$val->ten?></p></td>
                    <td class="can-giua">
                        <a href="vung-mien/edit?id=<?=$val->id?>"><i class="fal fa-edit"></i></a>
                        <a onclick="confirm('Bạn có chắc muốn xóa?')" href="vung-mien/del?id=<?=$val->id?>"><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
                $thutu ++;
            }
            ?>
        </tbody>
    </table>
</div>
