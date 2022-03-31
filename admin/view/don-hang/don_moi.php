<?php
	// Kiểm tra người dùng còn đơn hàng đang gọi không
	$fields = [];
    $sorts = [];
    $limits = [];
    $condition = ["nguoigoi" => "=", "trangthai" => "="];
    $forms = [
    	"nguoigoi" => $__ID__,
    	"trangthai" => 2
    ];
    $search = [];
    $data_donhang_danggoi = $query->DanhSach("donhang", $fields, $condition, $sorts, $limits, $forms, $search);
	$num_donhang_danggoi = count($data_donhang_danggoi);
	if($num_donhang_danggoi!=0)
	{
		header("location: don-dang-goi");
	}
	$fields = [];
    $sorts = ["id" => "DESC"];
    $limits = [];
    $condition = ["trangthai" => "="];
    $forms = [
    	"trangthai" => 1
    ];
    $search = [];
	$data_donhang = $query->DanhSach("donhang", [], $condition, $sorts, $limits, $forms, $search);#1 - đơn hàng mới
?>

<div class="blog">
	<div class="bread">
		<h1>Đơn hàng <span>| đơn hàng mới</span></h1>
		<div class="clear"></div>
	</div>

	<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>TT</th>
                <th>Tên</th>
                <th>Điện thoại</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	$thutu = 1;
        	foreach ($data_donhang as $key => $value) 
        	{
        		echo '<tr>';
        			echo '<td class="can-giua" width="40">'.$thutu.'</td>';
	                echo '<td><a href="goi-don-hang&id='.$value->id.'"><i class="fad fa-phone-volume"></i></a> '.$value->tenkhach.'</td>';
	                echo '<td>'.$value->dienthoaikhach.'</td>';
	                echo '<td class="can-giua">'.date ("Y-m-d h:i:s", $value->gio).'</td>';
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
				    "emptyTable":     "Không có dữ liệu đơn hàng mới",
				    "info":           "_START_ đến _END_ tổng _TOTAL_ đơn hàng mới",
				    "infoEmpty":      "Dữ liệu trống đơn hàng mới",
				    "infoFiltered":   "(filtered from _MAX_ tổng đơn hàng mới)",
				    "infoPostFix":    "",
				    "thousands":      ",",
				    "lengthMenu":     "Hiển thị _MENU_ đơn hàng mới",
				    "loadingRecords": "Loading...",
				    "processing":     "Processing...",
				    "search":         "Tìm kiếm:",
				    "zeroRecords":    "Không tìm thấy đơn hàng mới nào",
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
                ordering:false
			});
		});
	</script>
</div>