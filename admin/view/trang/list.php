<?php
    #Nhóm - Trang - Phân quyền
    // require_once "model/PhanQuyen.php";
    // $phanquyen = new PhanQuyen();
 //    $data_phanquyen = $phanquyen->NhomTrangQuyen($__NHOM__, 1);
 //    if( empty($data_phanquyen) || $data_phanquyen->xem == 0 ) header("location:./");

	// require_once "model/Trang.php";
	// $trang = new Trang();
	// $data_trang = $trang->DanhSach();
	// $table_name = "trang";
    $data = $query->DanhSach('trang',[],[],[],[]);
?>
<div class="blog">

	<div class="bread">
		<h1>Trang <span>| danh sách</span></h1>
		<div class="button"><button><a href="trang/add">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<table class="display nowrap list-table table" style="width:100%">
        <thead>
            <tr>
                <th>TT</th>
                <th>Tên</th>
                <th>Đường link</th>
                <th>Chọn</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key => $value) 
            { 
                ?>
                <tr>
                    <td style="text-align: center"><?=$key+1?></td>
                    <td><p style="text-align: center"><?=$value->name?></p></td>
                    <td><p style="text-align: center"><?=$value->permission?></p></td>
<!--                     <td><?=$value->permisstions?></td> -->
                    <td class="can-giua" style="text-align: center">
                        <a href="trang/edit?id=<?=$value->id?>"><i class="fal fa-edit"></i></a>
                        <a onClick="return confirm('Bạn muốn xóa?')" href="trang/del?id=<?=$value->id?>"><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

	<div class="clear"></div>

</div>

<script>
    $('.list-table').DataTable({
        lengthMenu: [
            [10, 20, 30, 40, 50, -1],
            [10, 20, 30, 40, 50, "All"]
        ],
        displayLength: 10,
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
        searching: true, 
        paging: true, 
        info: true
    });
</script>