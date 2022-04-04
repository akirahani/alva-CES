<?php
    $data_list = $query->DanhSach("chinhsach", [], [], ["id" => "DESC"], [],[], []);
?>
<div class="blog medium">

	<div class="bread">
		<h1>Chính sách <span>| danh sách</span></h1>
		<div class="button"><button><a href="chinh-sach/add">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<table class="table" style="width:100%">
        <thead>
            <tr>
                <th>TT</th>
                <th>Tên</th>
                <th>Hình</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $thutu = 1;
            foreach ($data_list as $key => $value) 
            { 
                ?>
                <tr id="remove<?=$value->id?>">
                    <td class="can-giua"><?=$thutu?></td>
                    <td><?=$value->ten?></td>
                    <td><img src="../uploads/chinh-sach/<?=$value->hinh?>" height="40" /></td>
                    <td class="can-giua">
                        <a href="chinh-sach/edit?id=<?=$value->id?>"><i class="fal fa-edit"></i></a>
                        <a onclick="confirm('Bạn có chắc muốn xóa?')"  href="chinh-sach/del?id=<?=$value->id?>" ><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
                $thutu ++;
            }
            ?>
        </tbody>
    </table>
</div>
