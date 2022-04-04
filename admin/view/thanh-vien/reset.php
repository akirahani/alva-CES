<?php
	isset($_GET['id']) ? $id=$_GET['id'] : $id=0;
    $data_detail = $query->ChiTiet("thanhvien",  [], ["id" => "="], ["id" => $id]);

    if(isset($_POST['reset']))
    {
        $thanhvien = new ThanhVien();
        $thanhvien->Reset($query,$id);
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
            <input disabled="" autocomplete="off" spellcheck="false" name="username" type="text" class="input-text" value="<?=$data_detail->username;?>" />
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