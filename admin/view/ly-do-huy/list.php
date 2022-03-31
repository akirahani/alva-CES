<?php
	#Get list
    $fields = [];
    $sorts = [];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data_lydo = $query->DanhSach("lydohuy", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<div class="blog small">
	<div class="bread">
		<h1>Lý do hủy đơn <span>| danh sách</span></h1>
		<div class="button">
			<button><a href="ly-do-huy/add">Thêm mới</a></button>
		</div>
		<div class="clear"></div>
	</div>

	<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>TT</th>
                <th>Tên</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	$thutu = 1;
        	foreach ($data_lydo as $key => $value) 
        	{
        		echo '<tr>';
        			echo '<td class="can-giua">'.$thutu.'</td>';
	                echo '<td>'.$value->ten.'</td>';
	                echo '<td class="can-giua"><a href="ly-do-huy/edit?id='.$value->id.'"><i class="fas fa-pencil"></i></a></td>';
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
				    "emptyTable":     "Không có dữ liệu lý do hủy",
				    "info":           "_START_ đến _END_ tổng _TOTAL_ lý do hủy",
				    "infoEmpty":      "Dữ liệu trống lý do hủy",
				    "infoFiltered":   "(filtered from _MAX_ tổng lý do hủy)",
				    "infoPostFix":    "",
				    "thousands":      ",",
				    "lengthMenu":     "Hiển thị _MENU_ lý do hủy",
				    "loadingRecords": "Loading...",
				    "processing":     "Processing...",
				    "search":         "Tìm kiếm:",
				    "zeroRecords":    "Không tìm thấy lý do hủy nào",
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
                ordering: false,
                searching: false, 
		        paging: false, 
		        info: false
			});
		});
	</script>
</div>