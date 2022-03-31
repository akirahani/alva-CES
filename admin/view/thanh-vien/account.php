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