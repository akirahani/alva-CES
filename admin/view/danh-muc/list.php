<?php
    $data = $query->DanhSach("danhmuc");
?>
<div class="blog small">

	<div class="bread">
		<h1>Danh mục <span>| danh sách</span></h1>
		<div class="button"><button><a href="danh-muc/adD">Thêm mới</a></button></div>
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
            foreach ($data as $key => $val) 
            { 
                ?>
                <tr id="remove<?=$val->id?>">
                    <td class="can-giua"><?=$thutu?></td>
                    <td><?=$val->ten?></td>
                    <td class="can-giua">
                        <a href="danh-muc/edit?id=<?=$val->id?>"><i class="fal fa-edit"></i></a>
                        <a onclick="confirm('Bạn có chắc muốn xóa?')" href="danh-muc/del?id=<?=$val->id?>" ><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
                $thutu ++;
            }
            ?>
        </tbody>
    </table>
</div>