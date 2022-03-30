<?php
    // Xử lý vùng miền
    $data_vungmien = $query->DanhSach("vungmien", [], [], [], [], [], []);
    $arr_vungmien = [];
    foreach ($data_vungmien as $key => $val) {
        $arr_vungmien[$val->id] = $val->ten;
    }
    $arr_vungmien[0] = "Cập nhật";

    $data = $query->DanhSach("tinhthanh", [], [], [], [], [], []);
?>
<div class="blog small">

	<div class="bread">
		<h1>Tỉnh thành <span>| danh sách</span></h1>
		<div class="button"><button><a href="tinh-thanh/add">Thêm mới</a></button></div>
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
            foreach ($data as $key => $val) 
            { 
                ?>
                <tr id="remove<?=$val->id?>">
                    <td class="can-giua"><?=$thutu?></td>
                    <td class="can-giua"><?=$val->ten?></td>
                    <td class="can-giua"><?=$arr_vungmien[$val->vungmien]?></td>
                    <td class="can-giua">
                        <a href="tinh-thanh/edit?id=<?=$val->id?>"><i class="fal fa-edit"></i></a>
                        <a data-id ="<?=$val->id?>" style="cursor: pointer;" class="remove-tinhthanh"><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
                $thutu ++;
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    $('.remove-tinhthanh').click(function(){
        const cfrm = confirm('Bạn có chắc chắn muốn xóa ?');
        var id = $(this).data('id');
        if(cfrm ==true){
            $.ajax({
                url : "tinh-thanh/del",
                method :"GET",
                data:{
                    id :id 
                },
                success:function(data){
                    $('#remove'+id).remove();
                }

            })
        }
    });
</script>