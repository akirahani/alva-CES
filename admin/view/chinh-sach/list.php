<?php
	$fields = [];
    $sorts = ["id" => "DESC"];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data_list = $query->DanhSach("chinhsach", $fields, $condition, $sorts, $limits, $forms, $search);
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
                        <a style="cursor: pointer" data-id="<?=$value->id ?>" class="remove_chinhsach"><i class="fal fa-trash-alt"></i></a>
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
    $('.remove_chinhsach').click(function(){
         const cfrm = confirm('Bạn có chắc chắn muốn xóa ?');
        var id = $(this).data('id');
        if(cfrm ==true){
            $.ajax({
                url : "chinh-sach/del",
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