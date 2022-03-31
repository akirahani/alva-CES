<?php
	#Get list
    $fields = [];
    $sorts = [];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data = $query->DanhSach("doitac", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<div class="blog medium">

	<div class="bread">
		<h1>Đối tác <span>| danh sách</span></h1>
		<div class="button"><button><a href="doi-tac/add">Thêm mới</a></button></div>
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
                    <td><p style="text-align: center"><?=$val->ten?></p></td>
                    <td class="can-giua">
                        <a href="doi-tac/edit?id=<?=$val->id?>"><i class="fal fa-edit"></i></a>
                        <a class="remove-doitac" data-id ="<?=$val->id?>" style="cursor: pointer;"><i class="fal fa-trash-alt"></i></a>
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
    $('.remove-doitac').click(function(){
        const cfrm = confirm('Bạn có chắc chắn muốn xóa ?');
        var id = $(this).data('id');
        if(cfrm ==true){
            $.ajax({
                url : "doi-tac/del",
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