<?php
	$fields = ["slug"];
    $sorts = [];
    $limits = [];
    $condition = [];
    $forms = [];
    $search = [];
    $data_loai = $query->DanhSach("loai", $fields, $condition, $sorts, $limits, $forms, $search);
    $data_news = $query->DanhSach("news", $fields, $condition, $sorts, $limits, $forms, $search);
	
	$xml=new DomDocument("1.0", "UTF-8");
	$xml->formatOutput=true;
	
	$urlset = $xml -> createElement("urlset");
	$urlset->setAttribute("xmlns","http://www.sitemaps.org/schemas/sitemap/0.9");
	$urlset->setAttribute("xmlns:xsi","http://www.w3.org/2001/XMLSchema-instance");
	$urlset->setAttribute("xsi:schemaLocation","http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd");
	$xml->appendChild($urlset);
	
	//Trang chủ
	$url=$xml->createElement("url");
	$urlset->appendChild($url);	
	$loc=$xml->createElement("loc", "https://vkooltips.com");
	$url->appendChild($loc);	
	$changefreq=$xml->createElement("changefreq", "weekly");
	$url->appendChild($changefreq);	
	$priority=$xml->createElement("priority", "0.8");
	$url->appendChild($priority);
	
	//Liên hệ
	$url=$xml->createElement("url");
	$urlset->appendChild($url);	
	$loc=$xml->createElement("loc", "https://vkooltips.com/lien-he");
	$url->appendChild($loc);	
	$changefreq=$xml->createElement("changefreq", "weekly");
	$url->appendChild($changefreq);	
	$priority=$xml->createElement("priority", "0.8");
	$url->appendChild($priority);
	
	//Menu
    foreach ($data_loai as $key => $value) 
    {
    	$url=$xml->createElement("url");
		$urlset->appendChild($url);
		$loc=$xml->createElement("loc", "https://vkooltips.com/".$value->slug);
		$url->appendChild($loc);	
		$changefreq=$xml->createElement("changefreq", "weekly");
		$url->appendChild($changefreq);	
		$priority=$xml->createElement("priority", "0.8");
		$url->appendChild($priority);
    }

    //Cờ tướng online
	$url=$xml->createElement("url");
	$urlset->appendChild($url);
	$loc=$xml->createElement("loc", "https://vkooltips.com/co-tuong-online");
	$url->appendChild($loc);	
	$changefreq=$xml->createElement("changefreq", "weekly");
	$url->appendChild($changefreq);	
	$priority=$xml->createElement("priority", "0.8");
	$url->appendChild($priority);

	//Tin bài
	foreach ($data_news as $key => $value) 
	{
		$url=$xml->createElement("url");
		$urlset->appendChild($url);
		$loc=$xml->createElement("loc", "https://vkooltips.com/".$value->slug);
		$url->appendChild($loc);	
		$changefreq=$xml->createElement("changefreq", "weekly");
		$url->appendChild($changefreq);	
		$priority=$xml->createElement("priority", "0.8");
		$url->appendChild($priority);
	}

	echo "<xmp>".$xml->saveXML()."</xmp>";
	$xml->save("../sitemap.xml");
?>