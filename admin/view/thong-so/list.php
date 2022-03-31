<?php
    $data_thongso = $query->DanhSach("thongso", [], [], [], [], [], []);

    // Xử lý danh mục
    $data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
    $arr_danhmuc = [];
    foreach ($data_danhmuc as $key => $value) 
    {
        $arr_danhmuc[$value->id] = $value->ten;
    }
    $arr_danhmuc[0] = "Cập nhật";

    // Xử lý loại
    $data_loai = $query->DanhSach("loai", [], [], [], [], [], []);
    $arr_loai = [];
    foreach ($data_loai as $key => $value) 
    {
        $arr_loai[$value->id] = $value->ten;
    }
    $arr_loai[0] = "Cập nhật";
?>
<div class="blog medium">

	<div class="bread">
		<h1>Thông số <span>| danh sách</span></h1>
		<div class="button"><button><a href="thong-so/add ">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

    <select name="danhmuc" style="height: 30px;">
        <option value="0">Chọn</option>
        <?php 
        foreach ($data_danhmuc as $key => $value) 
        {
            echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
        }
        ?>
    </select>

    <select name="loai" style="height: 30px;">
        <option value="0">Chọn</option>
        <?php 
        foreach ($data_loai as $key => $value) 
        {
            echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
        }
        ?>
    </select>

	<table class="table" style="width:100%">
        <thead>
            <tr>
                <th>TT</th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Phân loại</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $thutu = 1;
            foreach ($data_thongso as $key => $value) 
            { 
                ?>
                <tr id="remove<?=$value->id?>">
                    <td class="can-giua"><?=$thutu?></td>
                    <td><?=$value->ten?></td>
                    <td class="can-giua"><?=$arr_danhmuc[$value->danhmuc]?></td>
                    <td class="can-giua"><?=$arr_loai[$value->loai]?></td>
                    <td class="can-giua">
                        <a href="thong-so/edit?id=<?=$value->id?>"><i class="fal fa-edit"></i></a>
                        <a data-id ="<?=$value->id?>" style="cursor: pointer;" class="remove_thong_so" ><i class="fal fa-trash-alt"></i></a>
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
    $(document).ready(function(){
        $('select[name="danhmuc"]').change(function(){
            let danhmuc = $(this).val();
            let loai = $('select[name="loai"]').val();
            $.ajax({
                method: "POST",
                data: {danhmuc:danhmuc, loai:loai},
                url: "view/thong-so/load.php",
                success:function(dulieu)
                {
                    $("tbody").html(dulieu);
                }
            });
        });

        $('select[name="loai"]').change(function(){
            let loai = $(this).val();
            let danhmuc = $('select[name="danhmuc"]').val();
            $.ajax({
                method: "POST",
                data: {danhmuc:danhmuc, loai:loai},
                url: "view/thong-so/load.php",
                success:function(dulieu)
                {
                    $("tbody").html(dulieu);
                }
            });
        });
    });
</script>
<script>
    $('.remove_thong_so').click(function(){
        const cfrm = confirm('Bạn có chắc chắn muốn xóa ?');
        var id = $(this).data('id');
        if(cfrm ==true){
            $.ajax({
                url : "thong-so/del",
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