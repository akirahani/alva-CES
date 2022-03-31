<?php
	$fields = [];
    $sorts = ["id" => "DESC"];
    $limits = [];
    $condition = ["trangthai" => "="];
    $forms = [
    	"trangthai" => 3
    ];
    $search = [];
	$data_donhang = $query->DanhSach("donhang", [], $condition, $sorts, $limits, $forms, $search);#3 - chuẩn bị giao đơn hàng
?>

<div class="blog">
	<div class="bread">
		<h1>Đơn hàng <span>| đơn hàng chuẩn bị</span></h1>
		<div class="clear"></div>
	</div>

	<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Điện thoại</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	foreach ($data_donhang as $key => $value) {
        		echo '<tr>';
	                echo '<td><a href="don-finish&id='.$value->id.'"><i class="fad fa-user-check"></i></a> '.$value->tenkhach.'</td>';
	                echo '<td>'.$value->dienthoaikhach.'</td>';
	            echo '</tr>';
        	}
            ?>
        </tbody>
    </table>
    
	<script>
		$(document).ready( function () {
		    $('#example').DataTable({
			    responsive: true,
                lengthMenu: [
                    [10, 20, 30, 40, 50, -1],
                    [10, 20, 30, 40, 50, "All"]
                ],
                displayLength: 20,
			    language:{
				    "decimal":        "",
				    "emptyTable":     "Không có dữ liệu đơn chuẩn bị",
				    "info":           "_START_ đến _END_ tổng _TOTAL_ đơn chuẩn bị",
				    "infoEmpty":      "Dữ liệu trống đơn chuẩn bị",
				    "infoFiltered":   "(filtered from _MAX_ tổng đơn chuẩn bị)",
				    "infoPostFix":    "",
				    "thousands":      ",",
				    "lengthMenu":     "Hiển thị _MENU_ đơn chuẩn bị",
				    "loadingRecords": "Loading...",
				    "processing":     "Processing...",
				    "search":         "Tìm kiếm:",
				    "zeroRecords":    "Không tìm thấy đơn chuẩn bị nào",
				    "paginate": {
				        "first":      "<<",
				        "last":       ">>",
				        "next":       ">",
				        "previous":   "<"
				    },
				    "aria": {
				        "sortAscending":  ": activate to sort column ascending",
				        "sortDescending": ": activate to sort column descending"
				    }
				},
                order: []
			});
		});
	</script>
</div>