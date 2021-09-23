<?php
class ModelTemplatetripTTBlog extends Model {
	public function getBlogsByModule($module_id, $limit = 0) {
		if ($limit) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tt_blog b LEFT JOIN " . DB_PREFIX . "tt_blog_description bd ON (b.tt_blog_id = bd.tt_blog_id) WHERE b.status = '1' AND bd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND b.module_id = '" . (int)$module_id . "' ORDER BY b.date_added DESC LIMIT " . (int)$limit);
		} else {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tt_blog b LEFT JOIN " . DB_PREFIX . "tt_blog_description bd ON (b.tt_blog_id = bd.tt_blog_id) WHERE b.status = '1' AND bd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND b.module_id = '" . (int)$module_id . "' ORDER BY b.date_added DESC");
		}

		return $query->rows;
	}
	public function getBlogsEnable() {
	
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "extension` WHERE `code` = 'tt_blog'");
		if ($query->row) {
			return $query->row['total'];
		} else {
			return false;
		}
	}

	public function getBlog($tt_blog_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tt_blog b LEFT JOIN " . DB_PREFIX . "tt_blog_description bd ON (b.tt_blog_id = bd.tt_blog_id) WHERE bd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND b.tt_blog_id = '" . (int)$tt_blog_id . "'");

		return $query->row;
	}

	public function addComment($tt_blog_id, $data, $language_id) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "tt_blog_comment SET tt_blog_id = '" . (int)$tt_blog_id . "', approved = '" . (int)$data['auto_approve'] . "', author = '" . $this->db->escape($data['author']) . "', email = '" . $this->db->escape($data['email']) . "', date_added = now()");

		$tt_blog_comment_id = $this->db->getLastId();

		$this->db->query("INSERT INTO " . DB_PREFIX . "tt_blog_comment_description SET tt_blog_comment_id = '" . (int)$tt_blog_comment_id . "', language_id = '" . (int)$language_id . "', comment = '" . $this->db->escape($data['comment']) . "'");

		$blog_info = $this->getBlog($tt_blog_id);

		$mail = new Mail();
		$mail->protocol = $this->config->get('config_mail_protocol');
		$mail->parameter = $this->config->get('config_mail_parameter');
		$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
		$mail->smtp_username = $this->config->get('config_mail_smtp_username');
		$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
		$mail->smtp_port = $this->config->get('config_mail_smtp_port');
		$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');

		$mail->setTo($this->config->get('config_email'));
		$mail->setFrom($data['email']);
		$mail->setSender($data['author']);
		$mail->setSubject(sprintf($this->language->get('email_subject'), $blog_info['title']));
		$mail->setText(sprintf($this->language->get('email_content'), $blog_info['title']));
		$mail->send();
	}

	public function getBlogComments($tt_blog_id, $language_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tt_blog_comment bc LEFT JOIN " . DB_PREFIX . "tt_blog_comment_description bcd ON (bc.tt_blog_comment_id = bcd.tt_blog_comment_id) WHERE bcd.language_id = '" . (int)$language_id . "' AND bc.approved = '1' AND bc.tt_blog_id = '" . (int)$tt_blog_id . "' ORDER BY bc.date_added DESC");

		return $query->rows;
	}

	public function getBlogs() {
		$blog_data = array();
		
			$res1 = $this->db->query("SHOW TABLES LIKE '".DB_PREFIX."tt_blog'");
			if($res1->num_rows){
						$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tt_blog WHERE status = '1' GROUP BY module_id");

						if ($query->rows) {
							foreach ($query->rows as $blog) {
							
									$blog_data[] = $blog;
								
							}
						}
			}
		return $blog_data;
	}

	public function getLayoutModule($code) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "layout_route lr LEFT JOIN " . DB_PREFIX . "layout_module lm ON (lr.layout_id = lm.layout_id) WHERE lr.store_id = '" . (int)$this->config->get('config_store_id') . "' AND lm.code = '" . $this->db->escape($code) . "'");

		if ($query->rows) {
			return true;
		} else {
			return false;
		}
	}

	public function getModule($module_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "module` WHERE `module_id` = '" . (int)$module_id . "'");

		return $query->row;
	}

	public function getModulesByCode($code) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "module WHERE code = '" . $this->db->escape($code) . "'");

		return $query->rows;
	}

	public function getLanguageByCode($code) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "language WHERE code = '" . $this->db->escape($code) . "'");

		return $query->row;
	}
	public function getTotalBlogComments($tt_blog_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tt_blog_comment WHERE tt_blog_id = '" . (int)$tt_blog_id . "'");

		if ($query->row) {
			return $query->row['total'];
		} else {
			return false;
		}
	}
}