<?php
	$data_lydohuy = $query->DanhSach("lydohuy", [], [], [], [], [], []);
	$fields = [];
    $sorts = ["id" => "DESC"];
    $limits = [];
    $condition = ["trangthai" => "="];
    $forms = [
    	"trangthai" => 4
    ];
    $search = [];
	$data_donhang = $query->DanhSach("donhang", [], $condition, $sorts, $limits, $forms, $search);#4 - đơn hàng hủy
?>

<div class="blog">
	<div class="bread">
		<h1>Đơn hàng <span>| đơn hàng hủy</span></h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select class="change-ly-do" style="height:30px;">
			<option value="0">Lý do hủy đơn hàng</option>
			<?php
			foreach ($data_lydohuy as $key => $value) {
				echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
			}
			?>
		</select>
		<div class="clear"></div>
	</div>

	<div class="load-don-hang">
		<table id="example" class="display nowrap" style="width:100%">
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
	</div>
    
	<script>
		$(document).ready( function () {
			// Danh sách đơn hàng hủy
		    $('#example').DataTable({
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
                ordering:false
			});
			// Change lý do hủy đơn hàng
			$(".change-ly-do").change(function(){
				let lydo = $(this).val();
				$.ajax({
					method: "POST",
					data : {lydo:lydo},
					url: "view/don-hang/ajax_don_hang_huy.php",
					success:function(dulieu)
					{
						$(".load-don-hang").html(dulieu);
					}
				});
			});
		});
	</script>
</div>