<?php

    $thanhvien = $query->DanhSach('thanhvien',['id','username','fullname','nhom'],[],[],[]);
    $trang = $query->DanhSach('trang',[],[],[],[]);
    $nhom = $query->DanhSach('nhom',[],[],[],[]);
    $phanquyen = $query->DanhSach('phan_quyen',[],[],[],[]);
    $arr = [];

    foreach ($phanquyen as $key => $value) {
        $arr[$value->trang] = [$value->xem,$value->sua,$value->xoa];
    }?>
<div class="blog ">

	<div class="bread">
		<h1>Phân quyền <span>| chọn nhóm người dùng</span></h1>
		<div class="clear"></div>
	</div>

	<select  class="change-nhom">
		<option value="0">Chọn nhóm</option>
        <?php 
            foreach ($nhom as $key => $value) 
            {
                echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
            }
        ?>
	</select>
    <br><br>

	<table class="display nowrap list-table" style="width:100%">    
    </table>

	<div class="clear"></div>
</div>

<script>
    $(".change-nhom").change(function(){
        let nhom = $(this).val();
        console.log(nhom);
        $(".loading").show();
        $.ajax({
            method: "POST",
            data: {nhom:nhom},
            url: "view/nhom-trang-quyen/ajax-nhom.php",
            success:function(dulieu)
            {
                $(".list-table").html(dulieu);
                $(".loading").hide();
            }
        });
    });
    $('.list-table').DataTable({
        lengthMenu: [
            [10, 20, 30, 40, 50, -1],
            [10, 20, 30, 40, 50, "All"]
        ],
        displayLength: -1,
        responsive: true,
        order: [],
        ordering: false,
        searching: false, 
        paging: false, 
        info: false
    });
</script>