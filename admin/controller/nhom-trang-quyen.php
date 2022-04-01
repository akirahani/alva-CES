<?php
    $thanhvien = $query->DanhSach('thanhvien',['id','username','fullname','nhom'],[],[],[]);
    $trang = $query->DanhSach('trang',['id'],[],[],[]);
    $data_nhom = $query->DanhSach('nhom');
?>