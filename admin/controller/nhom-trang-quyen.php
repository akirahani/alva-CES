<?php
    $thanhvien = $query->DanhSach('thanhvien',['id','username','fullname','nhom'],[],[],[]);
    $trang = $query->DanhSach('trang',['id'],[],[],[]);
    $nhom = $query->DanhSach('nhom',[],[],[],[]);
?>