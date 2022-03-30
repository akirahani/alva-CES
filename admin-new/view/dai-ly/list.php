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
		<div class="button"><button><a href="dai-ly/add">Thêm mới</a></button></div>
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
                <tr id="remove<?=$val->id?>">
                    <td class="can-giua"><?=$thutu?></td>
                    <td class="can-giua"><?=$val->ten?></td>
                    <td class="can-giua"><?=$arr_tinhthanh[$val->tinhthanh]?></td>
                    <td class="can-giua">
                        <a href="dai-ly/edit?id=<?=$val->id?>"><i class="fal fa-edit"></i></a>
                        <a data-id ="<?=$val->id?>" style="cursor: pointer;" class="remove_daily"><i class="fal fa-trash-alt"></i></a>
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
<script>
    $('.remove_daily').click(function(){
        const cfrm = confirm('Bạn có chắc chắn muốn xóa ?');
        var id = $(this).data('id');
        if(cfrm ==true){
            $.ajax({
                url : "dai-ly/del",
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