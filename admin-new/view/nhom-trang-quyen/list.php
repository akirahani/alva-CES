<?php
	require_once "model/Nhom.php";
	$nhom = new Nhom();
	
	$data_nhom = $nhom->DanhSach();
	$table_name = "";
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
        language:{
            "decimal":        "",
            "emptyTable":     "No <?=$table_name?>",
            "info":           "_START_ to _END_ của _TOTAL_ <?=$table_name?>",
            "infoEmpty":      "Empty <?=$table_name?>",
            "infoFiltered":   "(filtered from _MAX_ <?=$table_name?>)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Show _MENU_ <?=$table_name?>",
            "loadingRecords": "Loading...",
            "processing":     "Processing...",
            "search":         "Search:",
            "zeroRecords":    "Not found <?=$table_name?>",
            "paginate": {
                "first":      "<<",
                "last":       ">>",
                "next":       "<i class='fa fa-chevron-right' aria-hidden='true'></i>",
                "previous":   "<i class='fa fa-chevron-left' aria-hidden='true'></i>"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        },
        order: [],
        ordering: false,
        searching: false, 
        paging: false, 
        info: false
    });
</script>