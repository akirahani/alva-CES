<?php
	#Detail
	$fields = [];
    $sorts = ["id" => "DESC"];
    $limits = [];
    $condition = ["trangthai" => "="];
    $forms = [
    	"trangthai" => 2
    ];
    $search = [];
	$data_donhang = $query->DanhSach("donhang", [], $condition, $sorts, $limits, $forms, $search);#2 - đơn hàng đang gọi
?>

<div class="blog">
	<div class="bread">
		<h1>Đơn hàng <span>| đơn đang gọi</span></h1>
		<div class="clear"></div>
	</div>

	<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>TT</th>
                <th>Tên</th>
                <th>Điện thoại</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	$thutu = 1;
        	foreach ($data_donhang as $key => $value) 
        	{
        		echo '<tr>';
        			echo '<td class="can-giua" width="40">'.$thutu.'</td>';
	                echo '<td><a href="chot-don&id='.$value->id.'"><i class="fad fa-user-edit"></i></a> '.$value->tenkhach.'</td>';
	                echo '<td>'.$value->dienthoaikhach.'</td>';
	            echo '</tr>';
	            $thutu ++;
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
				    "emptyTable":     "Không có dữ liệu đơn đang gọi",
				    "info":           "_START_ đến _END_ tổng _TOTAL_ đơn đang gọi",
				    "infoEmpty":      "Dữ liệu trống đơn đang gọi",
				    "infoFiltered":   "(filtered from _MAX_ tổng đơn đang gọi)",
				    "infoPostFix":    "",
				    "thousands":      ",",
				    "lengthMenu":     "Hiển thị _MENU_ đơn đang gọi",
				    "loadingRecords": "Loading...",
				    "processing":     "Processing...",
				    "search":         "Tìm kiếm:",
				    "zeroRecords":    "Không tìm thấy đơn đang gọi nào",
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
		});
	</script>
</div>