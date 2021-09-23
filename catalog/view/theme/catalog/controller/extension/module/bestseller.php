<?php
class ControllerExtensionModuleBestSeller extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/bestseller');

		$data['heading_title2'] = $this->language->get('heading_title2');

		$data['text_tax'] = $this->language->get('text_tax');
		$data['text_days'] = $this->language->get('text_days');
		$data['text_hours'] = $this->language->get('text_hours');
		$data['text_minutes'] = $this->language->get('text_minutes');
		$data['text_seconds'] = $this->language->get('text_seconds');
		$data['button_cart'] = $this->language->get('button_cart');
		$data['button_wishlist'] = $this->language->get('button_wishlist');
		$data['button_compare'] = $this->language->get('button_compare');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		$data['products'] = array();

		$filter_data = array(
			'sort'  => 'ps.date_end',
			'order' => 'DESC',
			'start' => 0,
			'limit' => $setting['limit']
		);

		$results = $this->model_catalog_product->getBestSellerProducts($setting['limit']);

		if ($results) {
			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}

		$images = $this->model_catalog_product->getProductImages($result['product_id']);
			   
			  if(isset($images[0]['image']) && !empty($images[0]['image'])){
				  $images = $images[0]['image'];
				  $thumb_swap = $this->model_tool_image->resize($images, $setting['width'], $setting['height']);
			   } else {
					$thumb_swap="";
			   }
	
				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}
				
				if ((float)$result['special']) {
					$data['percent'] = round(100 - ($result['special']*100/$result['price']));
				} else {
					$data['percent'] = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = $result['rating'];
				} else {
					$rating = false;
				}

				$to_date = $this->model_catalog_product->getProductSpecialData($result['product_id']);
				$to_date = $to_date['date_end'];

				$data['products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'thumb_swap'  => $thumb_swap,
					'name'        => $result['name'],
					'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get($this->config->get('config_theme') . '_product_description_length')) . '..',
					'price'       => $price,
					'to_date'     => $to_date,
					'percent'     => $data['percent'],
					'special'     => $special,
					'tax'         => $tax,
					'rating'      => $rating,
					'product_quantity'  => $result['quantity'],
					'product_stock'  => $result['stock_status'],
					'text_stock'  => $this->language->get('text_stock'),
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
				);
			}
			return $this->load->view('extension/module/bestseller', $data);
		}
	}
}
