<?php
	isset($_GET['id']) ? $id=$_GET['id'] : $id=0;
    $data_detail = $query->ChiTiet("thanhvien",  [], ["id" => "="], ["id" => $id]);
	
    // Cập nhật tài khoản
    if(isset($_POST['edit']))
    {
        $thanhvien = new ThanhVien();
        $thanhvien->Edit($query,$id);
    }
?>
<div class="blog small">
    <div class="bread">
        <h1>Tài khoản <span>| cập nhật</span></h1>
        <div class="clear"></div>
    </div>

    <form method="post" class="form">
        <div class="nhom">
            <p class="tit-label">Tài khoản</p>
            <input disabled="" autocomplete="off" spellcheck="false" name="username" type="text" class="input-text" value="<?=$data_detail->username;?>" />
        </div>

        <div class="nhom">
            <p class="tit-label">Họ tên</p>
            <input required="" autocomplete="off" spellcheck="false" name="fullname" type="text" class="input-text" value="<?=$data_detail->fullname;?>" />
        </div>
        <div class="clear"></div>

        <div class="nhom">
            <p class="tit-label"></p>
            <input name="edit" type="submit" value="Cập nhật">
        </div>
    </form>
</div>