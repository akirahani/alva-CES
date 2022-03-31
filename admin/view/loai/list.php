<?php
	#Get list
    $fields = [];
    $sorts = ["id" => "ASC"];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data_loai = $query->DanhSach("loai", $fields, $condition, $sorts, $limits, $forms, $search);
    // Xử lý danh mục
    $data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
    $arr_danhmuc = [];
    foreach ($data_danhmuc as $key => $value) 
    {
        $arr_danhmuc[$value->id] = $value->ten;
    }
    $arr_danhmuc[0] = "Cập nhật";
?>
<div class="blog medium">

	<div class="bread">
		<h1>Loại <span>| danh sách</span></h1>
		<div class="button"><button><a href="loai/add">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<table class="table" style="width:100%">
        <thead>
            <tr>
                <th>TT</th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $thutu = 1;
            foreach ($data_loai as $key => $value) 
            {   
                ?>
                <tr id="remove<?=$value->id?>">
                    <td class="can-giua"><?=$thutu?></td>
                    <td><?=$value->ten?></td>
                    <td>
                    <?php
                        // $arr_danhmuc_save =[];
                        $txt_danhmuc = '';
                        if($value->danhmuc != NULL || $value->danhmuc != '')
                        {
                            $arr_danhmuc_save = explode(",", $value->danhmuc);

                            foreach ($arr_danhmuc_save as $keydm => $valuedm) {
                                $txt_danhmuc .= $arr_danhmuc[$valuedm]." | ";
                            }
                        }
                        echo substr($txt_danhmuc, 0, -2);
                        ?>
                    </td>
                    <td class="can-giua">
                        <a href="loai/edit?id=<?=$value->id?>"><i class="fal fa-edit"></i></a>
                        <a data-id ="<?=$value->id?>" style="cursor: pointer;" class="remove_loai" ><i class="fal fa-trash-alt"></i></a>
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
    $('.remove_loai').click(function(){
        const cfrm = confirm('Bạn có chắc chắn muốn xóa ?');
        var id = $(this).data('id');
        if(cfrm ==true){
            $.ajax({
                url : "loai/del",
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