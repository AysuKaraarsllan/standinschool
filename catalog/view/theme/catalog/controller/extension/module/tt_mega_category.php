<?php
class ControllerExtensionModuleTTMegaCategory extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/tt_mega_category');
		
		$data['text_blog'] = $this->language->get('text_blog');
		$data['all_blogs'] = $this->url->link('information/tt_blog/blogs');
		
		$this->load->model('setting/extension');
		$results = $this->model_setting_extension->getExtensions("module");
		foreach($results as $result){
			if($result['code'] === "tt_blog"){ $data['blog_enable'] = 1; }
		}


		$data['Menu_heading_title'] = $this->language->get('Menu_heading_title');

		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$parts = array();
		}
		if (isset($parts[0])) {
			$data['category_id'] = $parts[0];
		} else {
			$data['category_id'] = 0;
		}

		if (isset($parts[1])) {
			$data['child_id'] = $parts[1];
		} else {
			$data['child_id'] = 0;
		}

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = array();

				$children = $this->model_catalog_category->getCategories($category['category_id']);

				foreach ($children as $child) {
					$filter_data = array(
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
					);

					/* 2 Level Sub Categories START */
					$children_level2 = $this->model_catalog_category->getCategories($child['category_id']);
					$children_data_level2 = array();

					foreach ($children_level2 as $child_level2) {
						$data_level2 = array(
								'filter_category_id'  => $child_level2['category_id'],
								'filter_sub_category' => true
						);
						$product_total_level2 = '';
						if ($this->config->get('config_product_count')) {
								$product_total_level2 = ' (' . $this->model_catalog_product->getTotalProducts($data_level2) . ')';
						}

						$children_data_level2[] = array(
								'name'  =>  $child_level2['name'],
								'href'  => $this->url->link('product/category', 'path=' . $child['category_id'] . '_' . $child_level2['category_id']),
								'id' => $category['category_id']. '_' . $child['category_id']. '_' . $child_level2['category_id']
						);
					}
					$children_data[] = array(
							'name'  => $child['name'],
							'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id']),
							'id' => $category['category_id']. '_' . $child['category_id'],
							'children_level2' => $children_data_level2,
					);
				}
			$filter_data = array(
				'filter_category_id'  => $category['category_id'],
				'filter_sub_category' => true
			);
			// Level 1
			$data['categories'][] = array(
				'category_id' => $category['category_id'],
				'name'        => $category['name'],
				'children'    => $children_data,
				'column'   => $category['column'] ? $category['column'] : 1,
				'href'        => $this->url->link('product/category', 'path=' . $category['category_id'])
			);

			}
		}

		return $this->load->view('extension/module/tt_mega_category', $data);
	}
}