<?php
    #Nhóm - Trang - Phân quyền
    // require_once "model/PhanQuyen.php";
    // $phanquyen = new PhanQuyen();
    // $data_phanquyen = $phanquyen->NhomTrangQuyen($__NHOM__, 4);
    // if( empty($data_phanquyen) || $data_phanquyen->sua == 0 ) header("location:./");
    
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $__ID__];
    $data_detail = $query->ChiTiet("thanhvien", $fields, $operator, $condition);

    if(isset($_POST['reset']))
    {
        if($_POST['password'] != "")
        {
            $fields = [ "matkhau" ];
            $condition = ["id"];
            $post_form = [
                'matkhau' => md5($_POST['password']),
                'id' => $__ID__
            ];
            $query->CapNhat("thanhvien", $fields, $condition, $post_form);
            header("location:reset-mat-khau");
        }
    }
?>
<div class="blog small">
    <div class="bread">
        <h1>Reset mật khẩu <span>| update</span></h1>
        <div class="clear"></div>
    </div>

    <form method="post" class="form">
        <div class="nhom">
            <p class="tit-label">User</p>
            <input disabled="" autocomplete="off" spellcheck="false" name="username" type="text" class="input-text" value="<?=$data_detail->ten;?>" />
        </div>

        <div class="nhom">
            <p class="tit-label">Fullname</p>
            <input disabled="" autocomplete="off" spellcheck="false" name="ten" type="text" class="input-text" value="<?=$data_detail->fullname;?>" />
        </div>

        <div class="nhom">
            <p class="tit-label">Password</p>
            <input required="" autocomplete="off" spellcheck="false" name="password" type="text" class="input-text" />
        </div>
        <div class="clear"></div>

        <div class="nhom">
            <p class="tit-label"></p>
            <input name="reset" type="submit" value="Reset">
        </div>
    </form>
</div>