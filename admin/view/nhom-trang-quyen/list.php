<?php
    // require_once "model/Nhom.php";
    // $nhom = new Nhom();
    
    $data_nhom = $query->DanhSach('nhom');
    // $table_name = "";
?>
<div class="row medium">

    <div class="bread">
        <h1>Phân quyền <span>| chọn nhóm người dùng</span></h1>
        <div class="clear"></div>
    </div>

    <select class="change-nhom">
        <option value="0">Chọn nhóm</option>
        <?php 
            foreach ($data_nhom as $key => $value) 
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