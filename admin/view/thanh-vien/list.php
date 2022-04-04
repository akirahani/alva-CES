<?php

    $data_list = $query->DanhSach("thanhvien",  [], [],["id" => "DESC"], [], [],[]);
?>
<div class="blog small">
    <div class="bread">
        <h1>Tài khoản <span>| danh sách</span></h1>
        <div class="button">
            <button><a href="thanh-vien/add">Thêm mới</a></button>
        </div>
        <div class="clear"></div>
    </div>

    <table class="table" style="width:100%">
        <thead>
            <tr>
                <th>TT</th>
                <th>Họ tên</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
        <?php
        $stt = 1;
        foreach ($data_list as $key => $value) 
        {
            ?>
            <tr>
                <td class="can-giua"><?=$stt;?></td>
                <td><?=$value->fullname;?></td>
                <td class="can-giua">
                    <a href="thanh-vien/edit?id=<?=$value->id?>" title="Cập nhật"><i class="fa fa-pencil"></i></a> 
                    <a href="thanh-vien/reset?id=<?=$value->id?>" title="Reset password"><i class="fal fa-retweet"></i></a>
                </td>
            </tr>
            <?php
            $stt++;
        }
        ?>
        </tbody>
    </table>
</div>