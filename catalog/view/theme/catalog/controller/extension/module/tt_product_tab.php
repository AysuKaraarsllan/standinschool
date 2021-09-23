<?php
class ControllerExtensionModuleTTProductTab extends Controller {	
	public function index($setting) {

		if(!isset($this->request->get['route']) || $this->request->get['route'] != 'product/product'){
		}

		static $module = 0;

		$this->language->load('extension/module/tt_product_tab');
		
      	$data['heading_title'] = $this->language->get('heading_title');


      	$data['tab_latest'] = $this->language->get('tab_latest');
      	$data['tab_featured'] = $this->language->get('tab_featured');
      	$data['tab_bestseller'] = $this->language->get('tab_bestseller');
      	$data['tab_special'] = $this->language->get('tab_special');

		$data['button_wishlist'] = $this->language->get('button_wishlist');
		$data['button_compare'] = $this->language->get('button_compare');
		$data['button_cart'] = $this->language->get('button_cart');
		$data['text_tax'] = $this->language->get('text_tax');
				
		$this->load->model('catalog/product');
		
		$this->load->model('tool/image');


		//Featured Products
		$data['featured_products'] = array();

		if($setting['featured_products'] && $setting['product']){

		
			if (empty($setting['limit'])) {
				$setting['limit'] = 5;
			}
			
			$products = array_slice($setting['product'], 0, (int)$setting['limit']);

			
			foreach ($products as $product_id) {
				$product_info = $this->model_catalog_product->getProduct($product_id);

				if ($product_info) {
					if ($product_info['image']) {
						$image = $this->model_tool_image->resize($product_info['image'], $setting['width'], $setting['height']);
					} else {
						$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
					}

				$images = $this->model_catalog_product->getProductImages($product_id);
				   
				  if(isset($images[0]['image']) && !empty($images[0]['image'])){
					  $images = $images[0]['image'];
					  $thumb_swap = $this->model_tool_image->resize($images, $setting['width'], $setting['height']);
				   } else {
						$thumb_swap="";
				   }
			   
					if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
						$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$price = false;
					}

					if ((float)$product_info['special']) {
						$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$special = false;
					}
					
					if ((float)$product_info['special']) {
						$data['percent'] = round(100 - ($product_info['special']*100/$product_info['price']));
					} else {
						$data['percent'] = false;
					}

					if ($this->config->get('config_tax')) {
						$tax = $this->currency->format((float)$product_info['special'] ? $product_info['special'] : $product_info['price'], $this->session->data['currency']);
					} else {
						$tax = false;
					}

					if ($this->config->get('config_review_status')) {
						$rating = $product_info['rating'];
					} else {
						$rating = false;
					}

					$data['featured_products'][] = array(
						'product_id'  => $product_info['product_id'],
						'thumb'       => $image,
						'thumb_swap'  => $thumb_swap,
						'name'        => $product_info['name'],
						'description' => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_product_description_length')) . '..',
						'price'       => $price,
						'special'     => $special,
						'percent'     => $data['percent'],
						'tax'         => $tax,
						'rating'      => $rating,
						'product_quantity'  => $product_info['quantity'],
						'product_stock'  => $product_info['stock_status'],
						'text_stock'  => $this->language->get('text_stock'),
						'href'        => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
					);
				}
			}
		}


		//Latest Products
		$data['latest_products'] = array();

		if($setting['latest_products']){
		
			$filter_data = array(
				'sort'  => 'p.date_added',
				'order' => 'DESC',
				'start' => 0,
				'limit' => $setting['limit']
			);
			$latest_results = $this->model_catalog_product->getProducts($filter_data);
			if ($latest_results) {
				foreach ($latest_results as $result) {
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
				   
					if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
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

					$data['latest_products'][] = array(
						'product_id'  => $result['product_id'],
						'thumb'       => $image,
						'thumb_swap'  => $thumb_swap,
						'name'        => $result['name'],
						'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_product_description_length')) . '..',
						'price'       => $price,
						'percent'     => $data['percent'],
						'special'     => $special,
						'tax'         => $tax,
						'rating'      => $rating,
						'product_quantity'  => $result['quantity'],
						'product_stock'  => $result['stock_status'],
						'text_stock'  => $this->language->get('text_stock'),
						'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
					);
				}
			}
		}


		//BestSeller Products
		$data['bestseller_products'] = array();

		if($setting['bestseller_products']){

			$bestseller_results = $this->model_catalog_product->getBestSellerProducts($setting['limit']);
			
			if ($bestseller_results) {
				foreach ($bestseller_results as $result) {
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
				   
					if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
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

					$data['bestseller_products'][] = array(
						'product_id'  => $result['product_id'],
						'thumb'       => $image,
						'thumb_swap'  => $thumb_swap,
						'name'        => $result['name'],
						'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_product_description_length')) . '..',
						'price'       => $price,
						'percent'     => $data['percent'],
						'special'     => $special,
						'tax'         => $tax,
						'rating'      => $rating,
						'product_quantity'  => $result['quantity'],
						'product_stock'  => $result['stock_status'],
						'text_stock'  => $this->language->get('text_stock'),
						'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
					);
				}
			}
		}


		//Special Products
		$data['special_products'] = array();

		if($setting['special_products']){

			$special_data = array(
				'sort'  => 'pd.name',
				'order' => 'ASC',
				'start' => 0,
				'limit' => $setting['limit']
			);

			$special_results = $this->model_catalog_product->getProductSpecials($special_data);

			if ($special_results) {
				foreach ($special_results as $result) {
					if ($result['image']) {
						$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
					} else {
						$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
					}


				$images = $this->model_catalog_product->getProductImages($result['product_id']);
	
            	$images = $this->model_catalog_product->getProductImages($product_id);
				   
				  if(isset($images[0]['image']) && !empty($images[0]['image'])){
					  $images = $images[0]['image'];
					  $thumb_swap = $this->model_tool_image->resize($images, $setting['width'], $setting['height']);
				   } else {
						$thumb_swap="";
				   }
				   
					if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
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

					$data['special_products'][] = array(
						'product_id'  => $result['product_id'],
						'thumb'       => $image,
						'thumb_swap'  => $thumb_swap,
						'name'        => $result['name'],
						'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_product_description_length')) . '..',
						'price'       => $price,
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
			}
		}

		$data['module'] = $module++;

			return $this->load->view('extension/module/tt_product_tab', $data);
	}
}
