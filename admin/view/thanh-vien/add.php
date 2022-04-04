<div class="blog small">
    <div class="bread">
        <h1>Tài khoản <span>| Thêm mới</span></h1>
        <div class="clear"></div>
    </div>

    <?php
    if(isset($_POST['add']))
    {
        $thanhvien = new ThanhVien();
        $thanhvien->ThemMoi($query);
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