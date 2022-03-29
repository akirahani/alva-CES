
<?php
	ob_start();
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	isset($_GET['path']) ? $p = $_GET['path'] : $p = '';
	isset($_GET['sub']) ? $one = $_GET['sub'] : $one = '';
	#CONST __URL__ = "https://titanstone.vn/";
	CONST __URL__ = "http://localhost/titanstone/";
	$addresses = "Số 9 lô 6 PG An Đồng, An Dương, Hải Phòng";
	require_once "admin/model/Query.php";
	$query = new Query();
	$data_company = $query->ChiTiet("company", [], ["id" => "="], ["id" => 1]);
	# Danh mục
	$arr_danhmuc_save = (array) json_decode($data_company->danhmuc);
	# Loại tin
	$arr_loaitin_save = (array) json_decode($data_company->loaitin);
	# Landing
	$arr_landing = (array) json_decode($data_company->landing);
	# Banner
	$arr_banner = json_decode($data_company->banner);
	# Tin tức
	$arr_tintuc = json_decode($data_company->tintuc);
	# Sản phẩm
	$arr_sanpham = json_decode($data_company->sanpham);
	if($p == '')
	{
		$tit = $data_company->ten;
		$des = $data_company->des;
		$key = $data_company->keyword;
		$link = __URL__.$p;
		$thumbs = __URL__."uploads/info.jpg";
		$note = "Trang chủ";
		$trang = $p;
		$path = "view/home/list.php";
	}
	switch ($p) {
		case 'cau-thang-da-tu-nhien':
			$tit = "Cầu thang đá tự nhiên";
			$des = "Cầu thang đá tự nhiên";
			$key = "Cầu thang, cầu thang đá";
			$link = __URL__.$p;
			$thumbs = __URL__."view/landing/cau-thang/image/thumbs.png";
			$note = "Landing cầu thang đá tự nhiên - Titan Stone";
			$trang = $p;
			$path = "view/landing/cau-thang/list.php";
		break;
		case 'lavabo-da-tu-nhien':
			$tit = "Lavabo đá tự nhiên";
			$des = "Lavabo đá tự nhiên";
			$key = "Lavabo đá, lavabo đá tự nhiên";
			$link = __URL__.$p;
			$thumbs = __URL__."view/landing/lavabo/image/thumbs.png";
			$note = "Landing lavabo đá tự nhiên - Titan Stone";
			$trang = $p;
			$path = "view/landing/lavabo/list.php";
		break;
		case 'tranh-da-tu-nhien':
			$tit = "Tranh đá tự nhiên";
			$des = "Tranh đá tự nhiên";
			$key = "Trang đá, tranh đá tự nhiên";
			$link = __URL__.$p;
			$thumbs = __URL__."view/landing/tranh-da/image/thumbs.png";
			$note = "Landing tranh đá tự nhiên - Titan Stone";
			$trang = $p;
			$path = "view/landing/tranh-da/list.php";
		break;
		case 'da-lat-san-tu-nhien':
			$tit = "Đá lát sàn tự nhiên";
			$des = "Đá lát sàn tự nhiên";
			$key = "Tranh đá, tranh đá tự nhiên";
			$link = __URL__.$p;
			$thumbs = __URL__."view/landing/da-lat-nen/image/thumbs.png";
			$note = "Landing đá lát sàn tự nhiên - Titan Stone";
			$trang = $p;
			$path = "view/landing/da-lat-nen/list.php";
		break;
		case 'phong-tam-voi-da-tu-nhien':
			$tit = "Phòng tắm với đá tự nhiên";
			$des = "Phòng tắm với đá tự nhiên";
			$key = "Phòng tắm đá tự nhiên";
			$link = __URL__.$p;
			$thumbs = __URL__."view/landing/nha-tam/image/thumbs.png";
			$note = "Landing phòng tắm đá tự nhiên - Titan Stone";
			$trang = $p;
			$path = "view/landing/nha-tam/list.php";
		break;
		case 'tru-cot-da-tu-nhien':
			$tit = "Trụ cột đá tự nhiên";
			$des = "Trụ cột đá tự nhiên";
			$key = "Trụ cột đá tự nhiên";
			$link = __URL__.$p;
			$thumbs = __URL__."view/landing/tru-cot-da/image/thumbs.png";
			$note = "Landing trụ cột đá tự nhiên - Titan Stone";
			$trang = $p;
			$path = "view/landing/tru-cot-da/list.php";
		break;
		case 've-chung-toi':
			$tit = "TitanStone đơn vị cung cấp đá Tự nhiên xuyên sáng";
			$des = "TitanStone đơn vị cung cấp đá Tự nhiên xuyên sáng";
			$key = "TitanStone, đá tự nhiên, đá xuyên sáng";
			$link = __URL__.$p;
			$thumbs = __URL__."uploads/thumbs.png";
			$note = "Titan Stone Giới thiệu";
			$trang = $p;
			$path = "view/about/list.php";
		break;
		case 'du-an':
			require_once "admin/model/Query.php";
			$query = new Query();
			$data_list = $query->DanhSach("duan", [], [], [], [], [], []);
			$tit = "Dự án TitanStone về đá tự nhiên";
			$des = "Dự án TitanStone về đá tự nhiên";
			$key = "TitanStone, dự án đá tự nhiên";
			$link = __URL__.$p;
			$thumbs = __URL__."uploads/thumbs.png";
			$note = "Titan Stone Dự án";
			$trang = $p;
			$path = "view/du-an/list.php";
		break;
		case 'quy-dinh':
			if($one != '')
			{
				$data_list = $query->DanhSach("chinhsach", [], [], [], [], [], []);
				$arr_chinhsach = [];
				foreach ($data_list as $key => $value) 
				{
					$arr_chinhsach[$value->slug] = $value;
				}
				if(array_key_exists($one, $arr_chinhsach))
				{
					$tit = $arr_chinhsach[$one]->ten;
					$des = $arr_chinhsach[$one]->mota;
					$des = "Chính sách, quy định sử dụng website";
					$link = __URL__."quy-dinh/".$arr_chinhsach[$one]->slug;
					$thumbs = __URL__."uploads/chinh-sach/".$arr_chinhsach[$one]->hinh;
					$note = "Chính sách quy định";
					$trang = $p;
					$path = "view/chinh-sach/list.php";
				}
				else
				{
					$tit = $data_company->ten;
					$des = $data_company->des;
					$key = $data_company->keyword;
					$link = __URL__.$p;
					$thumbs = __URL__."uploads/info.jpg";
					$note = "Trang chủ";
					$trang = $p;
					$path = "view/home/list.php";
				}
			}
		break;
		case 'nhan-tu-van':
			$tit = "TitanStone Đã nhận tư vấn";
			$des = "TitanStone Đã nhận tư vấn";
			$key = "Nhận tư vấn";
			$link = __URL__.$p;
			$thumbs = __URL__."uploads/info.jpg";
			$note = "Nhận tư vấn";
			$trang = $p;
			$path = "view/tu-van/list.php";
		break;
		case 'da-ngoc-tu-nhien-xuyen-sang':
			$tit = "Sản phẩm đá ngọc tự nhiên xuyên sáng";
			$des = "Sản phẩm đá ngọc tự nhiên xuyên sáng";
			$key = "Đá ngọc tự nhiên, đá tự nhiên, đá xuyên sáng";
			$link = __URL__.$p;
			$thumbs = __URL__."uploads/info.jpg";
			$note = "Trang sản phẩm";
			$trang = $p;
			$path = "view/product/list.php";
		break;
		case 'tin-tuc':
			require_once "admin/model/Lib.php";
			$lib = new Lib();
			$data_list = $query->DanhSach("tintuc", ["vuong", "ten", "mota", "noibat", "ngay", "slug"], [], ["id" => "DESC"], [], []);
			#Phân trang
		    $total_row = count($data_list);
		    $num_of_page = 9;
		    $total_page = ceil($total_row / $num_of_page);
		    if(isset($_GET ['page']))
		    {
		        $page_get = intval($_GET ['page']);
		    }
		    else
		    {
		        $page_get = 1;
		    }
		    if ($page_get <= 0)
		    {
		        $page = 1;
		    }
		    else
		    {
		        if($page_get <= $total_page)
		        {
		            $page = $page_get;
		        }
		        else
		        {
		            $page = 1;
		        }
		    }
		    $start_page = ($page - 1) * $num_of_page;
			$end_page = $page * $num_of_page;
			#Xử lý tin
			$arr_noibat = [];
			$arr_hot = [];
			$arr_page = [];
			foreach ($data_list as $key => $value) 
			{
				if($key < 5)
				{
					$arr_hot[$value->slug] = $value;
				}
				if($value->noibat == 1)
				{
					$arr_noibat[$value->slug] = $value;
				}
				if( $key >= $start_page && $key < $end_page)
				{
					$arr_page[$value->slug] = $value;
				}
			}
			$tit = "Tin tức về đá ngọc tự nhiên";
			$des = "Tin tức về đá ngọc tự nhiên";
			$key = "Tin tức về đá ngọc tự nhiên";
			$link = __URL__.$p;
			$thumbs = __URL__."uploads/info.jpg";
			$note = "Tin tức";
			$trang = $p;
			$path = "view/tin-tuc/list.php";
		break;
		case 'lien-he':
			$tit = "Liên hệ TitanStone";
			$des = "Liên hệ TitanStone";
			$key = "Liên hệ TitanStone";
			$link = __URL__.$p;
			$thumbs = __URL__."uploads/thumbs.png";
			$note = "Liên hệ TitanStone";
			$trang = $p;
			$path = "view/contact/list.php";
		break;
		case 'da-xuyen-sang':
			if($one != '')
			{
				require_once "admin/model/Da.php";
				require_once "admin/model/DanhMuc.php";
				$da = new Da();
				$danhmuc = new DanhMuc();
				$data_da = $da->ChiTietSlug($one);
				if(!empty($data_da))
				{
					$data_danhmuc = @$danhmuc->ChiTiet($data_da->danhmuc);
					$arr_vanda = explode(",", $data_da->album);
					$tit = $data_da->ten;
					$des = "";
					$key = "";
					$link = __URL__.$p."/".$one;
					$thumbs = __URL__."uploads/van-da/".$data_da->vuong;
					$note = $data_da->ten;
					$trang = $p."/".$one;
					$path = "view/product/detail.php";
				}
				else
				{
					$tit = "Sản phẩm đá ngọc tự nhiên xuyên sáng";
					$des = "Sản phẩm đá ngọc tự nhiên xuyên sáng";
					$key = "Đá ngọc tự nhiên, đá tự nhiên, đá xuyên sáng";
					$link = __URL__.$p;
					$thumbs = __URL__."uploads/info.jpg";
					$note = "Trang sản phẩm";
					$trang = $p;
					$path = "view/product/list.php";
				}
			}
			else
			{
				$tit = "Sản phẩm đá ngọc tự nhiên xuyên sáng";
				$des = "Sản phẩm đá ngọc tự nhiên xuyên sáng";
				$key = "Đá ngọc tự nhiên, đá tự nhiên, đá xuyên sáng";
				$link = __URL__.$p;
				$thumbs = __URL__."uploads/info.jpg";
				$note = "Trang sản phẩm";
				$trang = $p;
				$path = "view/product/list.php";
			}
		break;
		default:
			#Detail
			$fields = [];
			$operator = ["slug" => "="];
			$condition = ["slug" => $p];
			$data_detail = $query->ChiTiet("tintuc", $fields, $operator, $condition);
			#Detail
			if(!empty($data_detail))
			{
				$data_list = $query->DanhSach("tintuc", ["vuong", "ten", "ngay", "slug"], [], ["id" => "DESC"], [5], []);
				$tit = $data_detail->ten;
				$des = $data_detail->ten;
				$key = "Đá xuyên sáng, đá tự nhiên, đá xuyên sáng Hải Phòng";
				$link = __URL__.$p;
				$thumbs = __URL__."uploads/tin-tuc/".$data_detail->vuong;
				$note = "Tin tức chi tiết";
				$trang = $p;
				$path = "view/tin-tuc/detail.php";
			}
			else
			{
				$tit = $data_company->ten;
				$des = $data_company->des;
				$key = $data_company->keyword;
				$link = __URL__.$p;
				$thumbs = __URL__."uploads/info.jpg";
				$note = "Trang chủ";
				$trang = $p;
				$path = "view/home/list.php";
			}
		break;
	}
?>