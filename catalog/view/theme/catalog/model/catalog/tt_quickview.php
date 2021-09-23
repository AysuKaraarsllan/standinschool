<?php
/*
*	Description : this class is added to fix error for quickview button in SEO Url mode
*	Author: Trong Hai
*/
class ModelCatalogTTQuickview extends Model{
	
	// This method return product_id from $seo_urls
	
	public function getProductBySeoUrl($seo_url){
		
		$arrUrl = explode("/",$seo_url); // explode string to array
		//var_dump($arrUrl);
		
		$tmp = end($arrUrl); // just care the value of last item in array because that is the SEO url
		//var_dump($tmp);
		
		$result = $this->db->query("SELECT query FROM " . DB_PREFIX . "seo_url WHERE keyword LIKE '" . $tmp . "' ORDER BY keyword ASC");
		
		// just get string result product_id=xxx
		//var_dump($result->row['query']);
		$tmp = explode("=",$result->row['query']);
		
		return (int)$tmp[1];
	}
}
?>