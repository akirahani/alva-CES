<?php
	$data_loaitin = $query->DanhSach("loaitin", [], [], [], [], [], []);
?>
<div class="blog small">

	<div class="bread">
		<h1>Loại tin <span>| danh sách</span></h1>
		<div class="button"><button><a href="loai-tin/add">Thêm mới</a></button></div>
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
            foreach ($data_loaitin as $key => $value) 
            { 
                ?>
                <tr id="remove<?=$value->id?>">
                    <td class="can-giua"><?=$thutu?></td>
                    <td class="can-giua"><?=$value->ten?></td>
                    <td class="can-giua">
                        <a href="loai-tin/edit?id=<?=$value->id?>"><i class="fal fa-edit"></i></a>
                        <a  style="cursor: pointer" data-id="<?=$value->id ?>" class="remove_loaitin" ><i class="fal fa-trash-alt"></i></a>
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
    $('.remove_loaitin').click(function(){
         const cfrm = confirm('Bạn có chắc chắn muốn xóa ?');
        var id = $(this).data('id');
        if(cfrm ==true){
            $.ajax({
                url : "loai-tin/del",
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