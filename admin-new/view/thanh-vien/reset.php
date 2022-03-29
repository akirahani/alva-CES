<?php
	isset($_GET['id']) ? $id=$_GET['id'] : $id=0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("thanhvien", $fields, $operator, $condition);

    if(isset($_POST['reset']))
    {
        if($_POST['matkhau'] != "")
        {
            $fields = ["matkhau"];
            $condition = ["id"];
            $post_form = [
                "matkhau" => md5($_POST['matkhau']),
                "id" => $id
            ];
            $query->CapNhat("thanhvien", $fields, $condition, $post_form);
            header("location:tai-khoan-thanh-vien");
        }
    }
?>
<div class="blog small">
    <div class="bread">
        <h1>Tài khoản <span>| reset password</span></h1>
        <div class="clear"></div>
    </div>

    <form method="post" class="form">
        <div class="nhom">
            <p class="tit-label">Tài khoản</p>
            <input disabled="" autocomplete="off" spellcheck="false" name="username" type="text" class="input-text" value="<?=$data_detail->ten;?>" />
        </div>

        <div class="nhom">
            <p class="tit-label">Thành viên</p>
            <input disabled="" autocomplete="off" spellcheck="false" name="ten" type="text" class="input-text" value="<?=$data_detail->fullname;?>" />
        </div>

        <div class="nhom">
            <p class="tit-label">Mật khẩu</p>
            <input required="" autocomplete="off" spellcheck="false" name="matkhau" type="text" class="input-text" />
        </div>
        <div class="clear"></div>

        <div class="nhom">
            <p class="tit-label"></p>
            <input name="reset" type="submit" value="Reset password"/>
        </div>
    </form>
</div>