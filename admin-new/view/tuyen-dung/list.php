<?php
	$fields = [];
    $sorts = ["id" => "DESC"];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data_list = $query->DanhSach("tuyendung", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<div class="blog medium">

	<div class="bread">
		<h1>Tuyển dụng <span>| danh sách</span></h1>
		<div class="button"><button><a href="them-tuyen-dung">Thêm mới</a></button></div>
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
                <tr>
                    <td class="can-giua"><?=$thutu?></td>
                    <td><?=$value->ten?></td>
                    <td><img src="../uploads/tuyen-dung/<?=$value->hinh?>" height="40" /></td>
                    <td class="can-giua">
                        <a href="sua-tuyen-dung?id=<?=$value->id?>"><i class="fal fa-edit"></i></a>
                        <a onClick="return confirm('Are you sure?')" href="xoa-tuyen-dung?id=<?=$value->id?>"><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
                $thutu ++;
            }
            ?>
        </tbody>
    </table>
</div>