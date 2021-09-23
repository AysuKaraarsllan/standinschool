<?php
class ControllerExtensionModuleTTSpecialCountdown extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/tt_special_countdown');

		$data['heading_title'] = $setting['name'];
		
		$data['text_tax'] = $this->language->get('text_tax');
		$data['text_days'] = $this->language->get('text_days');
		$data['text_hours'] = $this->language->get('text_hours');
		$data['text_minutes'] = $this->language->get('text_minutes');
		$data['text_seconds'] = $this->language->get('text_seconds');
		$data['text_expired'] = $this->language->get('text_expired');
		$data['text_hot'] = $this->language->get('text_hot');
		$data['text_save'] = $this->language->get('text_save');
		$data['product_unavailable'] = $this->language->get('product_unavailable');
		$data['product_available'] = $this->language->get('product_available');

		$data['button_cart'] = $this->language->get('button_cart');
		$data['button_wishlist'] = $this->language->get('button_wishlist');
		$data['button_compare'] = $this->language->get('button_compare');
		
		$this->document->addScript('catalog/view/javascript/TemplateTrip/ttcountdown.js');
		//$this->document->addStyle('catalog/view/theme/OPC025_03/stylesheet/TemplateTrip/ttcountdown.css');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		$data['products'] = array();

		$filter_data = array(
			'sort'  => 'ps.date_end',
			'order' => 'DESC',
			'start' => 0,
			'limit' => $setting['limit']
		);

		$results = $this->model_catalog_product->getProductSpecials($filter_data);

		if ($results) {
			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}

			$images_data = $this->model_catalog_product->getProductImages($result['product_id']);

           /* if(isset($images_data[0]['image']) && !empty($images_data[0]['image'])){
                  $images_ = $images_data[0]['image'];
				  $thumb_swap = $this->model_tool_image->resize($images_, $setting['width'], $setting['height']);
               } else {
					$thumb_swap="";
			   }*/
			  
			   $data['image_d'] = array();
			   
			  foreach ($images_data as $image_d) {
				$data['image_d'][] = array(
					'large' => $this->model_tool_image->resize($image_d['image'], $setting['width'], $setting['height']),
					'thumb' => $this->model_tool_image->resize($image_d['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_additional_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_additional_height'))
				);
			}

				if ((float)$result['special']) {
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
					//'thumb_swap'  => $thumb_swap,
					'images'  => $data['image_d'],
					'name'        => $result['name'],
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 100, $this->config->get('config_product_description_length')) . '..',
					'to_date'     => $to_date,
					'percent'     => $data['percent'],
					'rating'      => $rating,
					'product_quantity'  => $result['quantity'],
					'product_stock'  => $result['stock_status'],
					'text_stock'  => $this->language->get('text_stock'),
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
				);
			}

			return $this->load->view('extension/module/tt_special_countdown', $data);
		}
	}
}