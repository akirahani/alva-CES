<?php
	isset($_GET['id']) ? $id=$_GET['id'] : $id=0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("thanhvien", $fields, $operator, $condition);
	
    // Cập nhật tài khoản
    if(isset($_POST['edit']))
    {
        if($_POST['fullname'] != "")
        {
            $fields = ["fullname"];
            $condition = ["id"];
            $post_form = [
                "fullname" => $_POST['fullname'],
                "id" => $id
            ];
            $query->CapNhat("thanhvien", $fields, $condition, $post_form);
            header("location:list");
        }
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