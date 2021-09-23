<?php
class ControllerExtensionModuleTTBlog extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/tt_blog');
		$this->load->model('templatetrip/ttblog');
		$this->load->model('tool/image');
		
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_read_more'] = $this->language->get('text_read_more');
		$data['text_date_added'] = $this->language->get('text_date_added');
		$data['entry_comment'] = $this->language->get('entry_comment');
		$data['text_day_added'] = $this->language->get('text_day_added');
				

		$data['button_all_blogs'] = $this->language->get('button_all_blogs');

		$data['all_blogs'] = $this->url->link('information/tt_blog/blogs');

		$data['blogs'] = array();
		
		if (!$setting['limit']) {
			$setting['limit'] = 4;
		}
				
		foreach ($this->model_templatetrip_ttblog->getBlogsByModule($setting['module_id'], $setting['limit']) as $result) {			
			
			$total_comments = $this->model_templatetrip_ttblog->getTotalBlogComments($result['tt_blog_id']);
				$string_trunc = strlen(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')));
			
				if($string_trunc>$setting['char_limit']){
				$desc=utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $setting['char_limit']) . '...';
				}else{
				$desc=strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'));
				}
			$data['blogs'][] = array(
				'tt_blog_id'  => $result['tt_blog_id'],
				'image_thumb' => $this->model_tool_image->resize($result['image'], 370, 240),
				'image' 	  => $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']),
				'title'       => html_entity_decode($result['title'], ENT_QUOTES, 'UTF-8'),
				'description' => $desc,
				'date_added'  => strtotime(date($result['date_added'])),
				'total_comments' => number_format($total_comments),
				'href'        => $this->url->link('information/tt_blog', 'tt_blog_id=' . $result['tt_blog_id'])
			);  	
		}
		
				
		return $this->load->view('extension/module/tt_blog', $data); 
	}
}