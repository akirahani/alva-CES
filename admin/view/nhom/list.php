<?php
	#Get list
    $fields = ["id", "ten"];
    $sorts = ["id" => "DESC"];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data_list = $query->DanhSach("nhom", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<div class="blog small">

	<div class="bread">
		<h1>Nhóm <span>| danh sách</span></h1>
		<div class="button"><button><a href="nhom/add">Thêm mới</a></button></div>
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
            foreach ($data_list as $key => $value) 
            { 
                ?>
                <tr>
                    <td class="can-giua"><?=$key+1?></td>
                    <td><?=$value->ten?></td>
                    <td class="can-giua">
                        <a href="nhom/edit?id=<?=$value->id?>"><i class="fal fa-edit"></i></a>
                        <a onClick="return confirm('Bạn muốn xóa?')" href="nhom/del?id=<?=$value->id?>"><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>