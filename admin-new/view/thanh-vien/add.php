<div class="blog small">
    <div class="bread">
        <h1>Tài khoản <span>| Thêm mới</span></h1>
        <div class="clear"></div>
    </div>

    <?php
    if(isset($_POST['add']))
    {
        if($_POST['username'] != "")
        {
            $fields = [];
            $operator = ["ten" => "="];
            $condition = ["ten" => $_POST['username']];
            $check_thanhvien = $query->ChiTiet("thanhvien", $fields, $operator, $condition);
            if(empty($check_thanhvien))
            {
                $fields = ["ten", "fullname", "matkhau", "nhom", "actived", "hinhanh"];
                $post_form = [
                    'ten' => $_POST['username'],
                    'fullname' => $_POST['fullname'],
                    'matkhau' => $_POST['password'],
                    'nhom' => 1,
                    'actived' => 1,
                    'hinhanh' => 'alva.png'
                ];
                $query->ThemMoi("thanhvien", $fields, $post_form);
                header("location:tai-khoan-thanh-vien");
            }
            else
            {
                echo '<h1 style="color:red">User thành viên đã tồn tại!</h1>';
            }
        }
        else
        {
            header("location:them-tai-khoan");
        }
    }
    ?>
    <form method="post" class="form">
        <div class="nhom">
            <p class="tit-label">Tài khoản</p>
            <input required="" autocomplete="off" spellcheck="false" name="username" type="text" class="input-text" />
        </div>

        <div class="nhom">
            <p class="tit-label">Mật khẩu</p>
            <input required="" autocomplete="off" spellcheck="false" name="password" type="password" class="input-text" />
        </div>

        <div class="nhom">
            <p class="tit-label">Họ tên</p>
            <input required="" autocomplete="off" spellcheck="false" name="fullname" type="text" class="input-text" />
        </div>
        <div class="clear"></div>

        <div class="nhom">
            <p class="tit-label"></p>
            <input name="add" type="submit" value="THÊM MỚI">
        </div>
    </form>
</div>