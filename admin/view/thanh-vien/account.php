<?php

    $data_detail = $query->ChiTiet("thanhvien",[],  ["id" => "="], ["id" => $__ID__]);

    if(isset($_POST['edit']))
    {
        $fields = [ "fullname" ];
        $condition = ["id"];
        $post_form = [
            'fullname' => $_POST['fullname'],
            'id' => $__ID__
        ];
        $_SESSION['titanstonefullname'] = $_POST['fullname'];
        $query->CapNhat("thanhvien", $fields, $condition, $post_form);
        header("location:quan-ly-tai-khoan");
    }
?>
<div class="blog small">
    <div class="bread">
        <h1>Tài khoản <span>| update</span></h1>
        <div class="clear"></div>
    </div>

    <form method="post" class="form">
        <p class="tit-label">User</p>
        <input disabled="" autocomplete="off" spellcheck="false" name="username" type="text" class="input-text" value="<?=$data_detail->ten;?>" />

        <p class="tit-label">Fullname</p>
        <input required="" autocomplete="off" spellcheck="false" name="fullname" type="text" class="input-text" value="<?=$data_detail->fullname;?>" />

        <p class="tit-label"></p>
        <input name="edit" type="submit" value="Update">
    </form>
</div>