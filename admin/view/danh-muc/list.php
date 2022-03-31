<?php
    #Get list
    $fields = [];
    $sorts = [];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data = $query->DanhSach("danhmuc", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<div class="blog small">

	<div class="bread">
		<h1>Danh mục <span>| danh sách</span></h1>
		<div class="button"><button><a href="danh-muc/add">Thêm mới</a></button></div>
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
                        <a data-id ="<?=$val->id?>" style="cursor: pointer;" class="remove_danh_muc"  ><i class="fal fa-trash-alt"></i></a>
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
    $('.remove_danh_muc').click(function(){
        const cfrm = confirm('Bạn có chắc chắn muốn xóa ?');
        var id = $(this).data('id');
        if(cfrm ==true){
            $.ajax({
                url : "danh-muc/del",
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