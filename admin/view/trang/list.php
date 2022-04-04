<?php
    $data = $query->DanhSach('trang',[],[],[],[]);
?>
<div class="blog">

	<div class="bread">
		<h1>Trang <span>| danh sách</span></h1>
		<div class="button"><button><a href="trang/adD">Thêm mới</a></button></div>
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
                    <td><p style="text-align: center"><?=$value->ten?></p></td>
                    <td><p style="text-align: center"><?=$value->trang?></p></td>
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
        order: [],
        ordering: false,
        searching: true, 
        paging: true, 
        info: true
    });
</script>