<?php
   required_one('model/Query.php');
   // if($con){
   //      echo 'ok';
   // }
   // else{ 
   //  echo 'faild';}

?>

<div class="blog small">
    <div class="bread">
        <h1><?= __NAME__?> <span>| cập nhật</span></h1>
        <div class="clear"></div>
    </div>

    <form method="post" class="form">
        <p class="tit-label">Tên công ty</p>
        <input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
        
        <p class="tit-label">Điện thoại</p>
        <input type="text" name="dienthoai" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->dienthoai?>" />
        
        <p class="tit-label">Email</p>
        <input type="email" name="email" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->email?>" />

        <p class="tit-label">Địa chỉ</p>
        <input type="text" name="diachi" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->diachi?>" />

        <p class="tit-label">Tổng kho</p>
        <input type="text" name="tongkho" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->tongkho?>" />

        <p class="tit-label">Mỏ khai thác</p>
        <input type="text" name="mo" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->mo?>" />

        <p class="tit-label">Fanpage</p>
        <input type="text" name="facebook" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->facebook?>" />

        <p class="tit-label">Youtube</p>
        <input type="text" name="youtube" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->youtube?>" />

        <p class="tit-label">Description</p>
        <textarea rows="5" spellcheck="false" name="des"><?=$data_detail->des?></textarea>

        <p class="tit-label">Keyword</p>
        <textarea rows="5" spellcheck="false" name="keyword"><?=$data_detail->keyword?></textarea>

        <p class="tit-label"></p>
        <input type="submit" name="update" value="Cập nhật">
    </form>
</div>