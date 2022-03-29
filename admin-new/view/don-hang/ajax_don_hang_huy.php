<?php
	require_once "../../model/Query.php";
	$query = new Query();
	$lydo = $_POST['lydo'];
	$fields = [];
    $sorts = [];
    $limits = [];
    $condition = ["lydohuy" => "="];
    $forms = ["lydohuy" => $lydo];
    $search = [];
    $data_donhang = $query->DanhSach("donhang", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<table class="display nowrap example" style="width:100%">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Điện thoại</th>
            <th>Thời gian</th>
            <th>Ghi chú</th>
            <th>Lý do hủy</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	foreach ($data_donhang as $key => $value) 
    	{
    		$data_huydon = $query->ChiTiet("lydohuy", [], ["id" => "="], ["id" => $value->lydohuy]);
    		echo '<tr>';
                echo '<td>'.$value->tenkhach.'</td>';
                echo '<td>'.$value->dienthoaikhach.'</td>';
                echo '<td>'.$value->ngay.'</td>';
                echo '<td>'.$value->ghichu.'</td>';
                echo '<td>'.@$data_huydon->ten.'</td>';
            echo '</tr>';
    	}
        ?>
    </tbody>
</table>
<script>
	$('.example').DataTable({
	    responsive: true,
        lengthMenu: [
            [10, 20, 30, 40, 50, -1],
            [10, 20, 30, 40, 50, "All"]
        ],
        displayLength: 20,
	    language:{
		    "decimal":        "",
		    "emptyTable":     "Không có dữ liệu đơn hàng hủy",
		    "info":           "_START_ đến _END_ tổng _TOTAL_ đơn hàng hủy",
		    "infoEmpty":      "Dữ liệu trống đơn hàng hủy",
		    "infoFiltered":   "(filtered from _MAX_ tổng đơn hàng hủy)",
		    "infoPostFix":    "",
		    "thousands":      ",",
		    "lengthMenu":     "Hiển thị _MENU_ đơn hàng hủy",
		    "loadingRecords": "Loading...",
		    "processing":     "Processing...",
		    "search":         "Tìm kiếm:",
		    "zeroRecords":    "Không tìm thấy đơn hàng hủy nào",
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
        order: [],
        ordering: false
	});
</script>