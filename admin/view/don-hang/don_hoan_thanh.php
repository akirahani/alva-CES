<?php
	$fields = [];
    $sorts = ["id" => "DESC"];
    $limits = [];
    $condition = ["trangthai" => "="];
    $forms = [
    	"trangthai" => 5
    ];
    $search = [];
	$data_donhang = $query->DanhSach("donhang", [], $condition, $sorts, $limits, $forms, $search);#5 - đơn hàng đã hoàn thành
?>

<div class="blog">
	<div class="bread">
		<h1>Đơn hàng <span>| đơn hàng hoàn thành</span></h1>
		<div class="clear"></div>
	</div>

	<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Điện thoại</th>
                <th>Ngày đặt</th>
                <th>Ghi chú</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	foreach ($data_donhang as $key => $value) {
        		echo '<tr>';
	                echo '<td>'.$value->tenkhach.'</td>';
	                echo '<td>'.$value->dienthoaikhach.'</td>';
	                echo '<td>'.$value->ngay.'</td>';
	                echo '<td>'.$value->ghichu.'</td>';
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
				    "emptyTable":     "Không có dữ liệu đơn hàng hoàn thành",
				    "info":           "_START_ đến _END_ tổng _TOTAL_ đơn hàng hoàn thành",
				    "infoEmpty":      "Dữ liệu trống đơn hàng hoàn thành",
				    "infoFiltered":   "(filtered from _MAX_ tổng đơn hàng hoàn thành)",
				    "infoPostFix":    "",
				    "thousands":      ",",
				    "lengthMenu":     "Hiển thị _MENU_ đơn hàng hoàn thành",
				    "loadingRecords": "Loading...",
				    "processing":     "Processing...",
				    "search":         "Tìm kiếm:",
				    "zeroRecords":    "Không tìm thấy đơn hàng hoàn thành nào",
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