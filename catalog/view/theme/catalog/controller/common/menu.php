<?php
class ControllerCommonMenu extends Controller {
	public function index() {
		$this->load->language('common/menu');

		$data['text_blog'] = $this->language->get('text_blog');
		$data['all_blogs'] = $this->url->link('information/tt_blog/blogs');
		
		$this->load->model('setting/extension');
		$results = $this->model_setting_extension->getExtensions("module");
		foreach($results as $result){
			if($result['code'] === "tt_blog"){ $data['blog_enable'] = 1; }
		}


		// Menu
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
					$childs_data = array();
					$child_2 = $this->model_catalog_category->getCategories($child['category_id']);

					foreach ($child_2 as $childs) {
						$filter_data = array(
							'filter_category_id'  => $childs['category_id'],
							'filter_sub_category' => true
						);

						$childs_data[] = array(
							'name'  => $childs['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
							'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'] . '_' . $childs['category_id'])
						);
					}
					/* 2 Level Sub Categories END */

					$children_data[] = array(
						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
						'childs' => $childs_data,
						'column'   => $child['column'] ? $child['column'] : 1,
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
					);
				}

				// Level 1
				$data['categories'][] = array(
					'name'     => $category['name'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			}
		}

		return $this->load->view('common/menu', $data);
	}
}
