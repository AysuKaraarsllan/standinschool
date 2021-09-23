<?php
class ControllerExtensionModuleTTCategoryFeature extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/tt_category_feature');

		$data['heading_title1'] = $this->language->get('heading_title1');

		$data['text_tax'] = $this->language->get('text_tax');

		$data['button_cart'] = $this->language->get('button_cart');
		$data['button_wishlist'] = $this->language->get('button_wishlist');
		$data['button_compare'] = $this->language->get('button_compare');

		$this->load->model('catalog/category');
		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		$data['categories'] = array();

		if (!$setting['limit']) {
			$setting['limit'] = 4;
		}

		if (!empty($setting['category'])) {
			$categories = array_slice($setting['category'], 0, (int)$setting['limit']);

			foreach ($categories as $category_id) {
				$category_info = $this->model_catalog_category->getCategory($category_id);
				$children_data = array();

				if ($category_info) {

					$children = $this->model_catalog_category->getCategories($category_info['category_id']);
					foreach($children as $child) {
						$filter_data = array('filter_category_id' => $child['category_id'], 'filter_sub_category' => true);
	
						$children_data[] = array(
							'category_id' => $child['category_id'],
							'name' => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
							'href' => $this->url->link('product/category', 'path=' . $category_info['category_id'] . '_' . $child['category_id'])
						);
					}

					if ($category_info['image']) {
						$image = $this->model_tool_image->resize($category_info['image'], $setting['width'], $setting['height']);
					} else {
						$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
					}

					$data['categories'][] = array(
						'category_id'  => $category_info['category_id'],
						'thumb'       => $image,
						'name'        => $category_info['name'],
						'children'    => $children_data,
						'description' => utf8_substr(strip_tags(html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_product_description_length')) . '..',
						'href'        => $this->url->link('product/category', 'path=' . $category_info['category_id'])
					);
				}
			}
		}		
	return $this->load->view('extension/module/tt_category_feature', $data);
		/*if ($data['categories']) {
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/extension/module/tt_category_feature.tpl')) {
				return $this->load->view($this->config->get('config_template') . '/template/extension/module/tt_category_feature.tpl', $data);
			} else {
				return $this->load->view('default/template/extension/module/tt_category_feature.tpl', $data);
			}
		}*/
	}
}