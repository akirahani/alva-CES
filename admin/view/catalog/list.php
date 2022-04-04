<?php
    $data = $query->DanhSach("catalog");
?>
<div class="blog medium">

	<div class="bread">
		<h1>Catalog <span>| danh sách</span></h1>
		<div class="button"><button><a href="catalog/add">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<table class="table" style="width:100%">
        <thead>
            <tr>
                <th>TT</th>
                <th>Tên</th>
                <th>Hình</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $thutu = 1;
            foreach ($data as $key => $val) 
            { 
                ?>
                <tr id="remove<?=$val->id ?>">
                    <td class="can-giua"><?=$thutu?></td>
                    <td><?=$val->ten?></td>
                    <td class="can-giua"><img src="../uploads/catalog/<?=$val->hinh?>" height="40"/></td>
                    <td class="can-giua">
                       <a href="catalog/edit?id=<?=$val->id?>"><i class="fas fa-pencil"></i></a>
                        <a onclick="confirm('Bạn có chắc muốn xóa?')" href="catalog/del?id=<?=$val->id?>" ><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
                $thutu ++;
            }
            ?>
        </tbody>
    </table>
</div>
