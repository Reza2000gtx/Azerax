<?php

$xmlString = '<?xml version="1.0" encoding="UTF-8"?>
    <urlset
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
	xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
	xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
    <loc>'.base_url().'</loc>
</url>';
foreach ($items as $pd) {
    $xmlString .=   '<url>';
	$xmlString .=  '<loc>'.base_url().$pd->page_url.'</loc>';
    $xmlString .=  '</url>';
}

$xmlString .= '</urlset>';

$dom = new DOMDocument;
$dom->preserveWhiteSpace = FALSE;
$dom->loadXML($xmlString);
if($dom->save($_SERVER["DOCUMENT_ROOT"].'/WEB01/Buyer-Seller/sitemap.xml')){
   // echo "<h2>Site Map Created SuccessFully</h2>";
}else{
   // echo "<h2>Site Map Created Failed</h2>";
}
?>