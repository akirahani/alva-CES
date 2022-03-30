<?php
	#Get list
    $fields = [];
    $sorts = [];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data = $query->DanhSach("vungmien", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<div class="blog small">

	<div class="bread">
		<h1>Vùng miền <span>| danh sách</span></h1>
		<div class="button"><button><a href="vung-mien/add">Thêm mới</a></button></div>
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
                        <a data-id ="<?=$val->id?>" class="remove_vm" style="cursor: pointer;"><i class="fal fa-trash-alt"></i></a>
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
    $('.remove_vm').click(function(){
        const cfrm = confirm('Bạn có chắc chắn muốn xóa ?');
        var id = $(this).data('id');
        if(cfrm ==true){
            $.ajax({
                url : "vung-mien/del",
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