<?php
    #Get list
    $fields = [];
    $sorts = ["id" => "DESC"];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data_list = $query->DanhSach("thanhvien", $fields, $condition, $sorts, $limits, $forms, $search);
?>
<div class="blog small">
    <div class="bread">
        <h1>Tài khoản <span>| danh sách</span></h1>
        <div class="button">
            <button><a href="them-tai-khoan">Thêm mới</a></button>
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
                    <a href="cap-nhat-tai-khoan&id=<?=$value->id?>" title="Cập nhật"><i class="fa fa-pencil"></i></a> 
                    <a href="reset-mat-khau&id=<?=$value->id?>" title="Reset password"><i class="fal fa-retweet"></i></a>
                </td>
            </tr>
            <?php
            $stt++;
        }
        ?>
        </tbody>
    </table>
</div>