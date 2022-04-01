<?php
    if($arr_phanquyen->xem == 0){header("location:thong-bao");}
	#Get list
    $fields = [];
    $sorts = [];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data = $query->DanhSach("duan", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<div class="blog small">

	<div class="bread">
		<h1>Dự án <span>| danh sách</span></h1>
		<div class="button"><button><a href="du-an/add">Thêm mới</a></button></div>
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
                <tr id="remove<?=$val->id?>">
                    <td class="can-giua"><?=$thutu?></td>
                    <td><?=$val->ten?></td>
                    <td class="can-giua"><img src="../uploads/du-an/<?=$val->vuong?>" height="40"/></td>
                    <td class="can-giua">
                        <a href="du-an/edit?id=<?=$val->id?>"><i class="fal fa-edit"></i></a>
                        <a  style="cursor: pointer" data-id="<?=$val->id ?>" class="remove_du_an"><i class="fal fa-trash-alt"></i></a>
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
    $('.remove_du_an').click(function(){
         const cfrm = confirm('Bạn có chắc chắn muốn xóa ?');
        var id = $(this).data('id');
        if(cfrm ==true){
            $.ajax({
                url : "du-an/del",
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