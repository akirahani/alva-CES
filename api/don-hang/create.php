<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Content-Type: multipart/form-data; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require_once '../../admin/model/DonHang.php';
    $donhang = new DonHang();

    if( $_POST['ten']!='' && $_POST['dienthoai']!='' )
    {
        $data=[
            'tenkhach' => $_POST['ten'],
            'dienthoaikhach' => $_POST['dienthoai'],
            'email' => $_POST['email'],
            'trangthai' => 1,
            'lydohuy' => 0,
            'nguoigoi' => 0,
            'ngay' => date("Y-m-d"),
            'gio' => time(),
            'ghichu' => $_POST['ghichu'],
            'trang' => $_POST['trang']
        ];
        if($donhang->ThemMoi($data))
        {
            // 201 created
            http_response_code(201);
            echo json_encode(["message" => "success", "ten" => $_POST['ten']]);
        }
        else
        {
            // 503 service unavailable
            http_response_code(503);
            echo json_encode(["message" => "fail", "ten" => NULL]);
        }
    }
    else
    {
        // 400 bad request
        http_response_code(400);
        echo json_encode(["message" => "bad-request", "ten" => NULL]);
    }
?>