<?php
class ModelTemplatetripTTBlog extends Model {
	public function createBlogs() {
		$create_tt_blog = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tt_blog` (`tt_blog_id` int(11) NOT NULL auto_increment, `module_id` int(11) NOT NULL, `status` int(1) NOT NULL default '0', `image` varchar(255) default NULL, `date_added` datetime NOT NULL default '0000-00-00 00:00:00', `date_modified` datetime NOT NULL default '0000-00-00 00:00:00', PRIMARY KEY (`tt_blog_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
		$this->db->query($create_tt_blog);

		$create_tt_blog_description = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tt_blog_description` (`tt_blog_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` varchar(64) NOT NULL default '', `description` text NOT NULL, PRIMARY KEY (`tt_blog_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
		$this->db->query($create_tt_blog_description);

		$create_tt_blog_comment = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tt_blog_comment` (`tt_blog_comment_id` int(11) NOT NULL auto_increment, `tt_blog_id` int(11) NOT NULL, `approved` int(1) NOT NULL default '0', `author` varchar(64) NOT NULL default '', `email` varchar(96) NOT NULL, `date_added` datetime NOT NULL default '0000-00-00 00:00:00', PRIMARY KEY (`tt_blog_comment_id`, `tt_blog_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
		$this->db->query($create_tt_blog_comment);

		$create_tt_blog_comment_description = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tt_blog_comment_description` (`tt_blog_comment_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `comment` text NOT NULL, PRIMARY KEY (`tt_blog_comment_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
		$this->db->query($create_tt_blog_comment_description);
	}

	public function dropBlogs() {
		$drop_tt_blog = "DROP TABLE IF EXISTS `" . DB_PREFIX . "tt_blog`;";
		$this->db->query($drop_tt_blog);

		$drop_tt_blog_description = "DROP TABLE IF EXISTS `" . DB_PREFIX . "tt_blog_description`;";
		$this->db->query($drop_tt_blog_description);

		$drop_tt_blog_comment = "DROP TABLE IF EXISTS `" . DB_PREFIX . "tt_blog_comment`;";
		$this->db->query($drop_tt_blog_comment);

		$drop_tt_blog_comment_description = "DROP TABLE IF EXISTS `" . DB_PREFIX . "tt_blog_comment_description`;";
		$this->db->query($drop_tt_blog_comment_description);
	}

	public function addModule($code, $data) {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "module` SET `name` = '" . $this->db->escape($data['name']) . "', `code` = '" . $this->db->escape($code) . "', `setting` = '" . $this->db->escape(json_encode($data)) . "'");

		$module_id = $this->db->getLastId();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "module WHERE module_id = '" . (int)$module_id . "'");

		$settings = json_decode($query->row['setting'], true);

		$settings['module_id'] = $module_id;

		$this->db->query("UPDATE " . DB_PREFIX . "module SET setting = '" . $this->db->escape(json_encode($settings)) . "' WHERE module_id = '" . (int)$module_id . "'");

		return $module_id;
	}

	public function addBlog($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "tt_blog SET module_id = '" . (int)$data['module_id'] . "', status = '" . (int)$data['status'] . "', date_added = now(), date_modified = now()");

		$tt_blog_id = $this->db->getLastId();

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "tt_blog SET image = '" . $this->db->escape($data['image']) . "' WHERE tt_blog_id = '" . (int)$tt_blog_id . "'");
		}

		foreach ($data['tt_blog_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tt_blog_description SET tt_blog_id = '" . (int)$tt_blog_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	}

	public function editBlog($tt_blog_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "tt_blog SET module_id = '" . (int)$data['module_id'] . "', status = '" . (int)$data['status'] . "', date_modified = now() WHERE tt_blog_id = '" . (int)$tt_blog_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "tt_blog SET image = '" . $this->db->escape($data['image']) . "' WHERE tt_blog_id = '" . (int)$tt_blog_id . "'");
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "tt_blog_description WHERE tt_blog_id = '" . (int)$tt_blog_id . "'");

		foreach ($data['tt_blog_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tt_blog_description SET tt_blog_id = '" . (int)$tt_blog_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	}

	public function deleteBlog($tt_blog_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "tt_blog WHERE tt_blog_id = '" . (int)$tt_blog_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "tt_blog_description WHERE tt_blog_id = '" . (int)$tt_blog_id . "'");
	}	

	public function getBlog($tt_blog_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tt_blog WHERE tt_blog_id = '" . (int)$tt_blog_id . "'");

		return $query->row;
	}

	public function getBlogTitle($tt_blog_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tt_blog_description WHERE language_id = '" . (int)$this->config->get('config_language_id') . "' AND tt_blog_id = '" . (int)$tt_blog_id . "'");

		if ($query->row) {
			return $query->row['title'];
		} else {
			return false;
		}
	}

	public function getBlogDescriptions($tt_blog_id) {
		$tt_blog_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tt_blog_description WHERE tt_blog_id = '" . (int)$tt_blog_id . "'");

		foreach ($query->rows as $result) {
			$tt_blog_description_data[$result['language_id']] = array(
				'title'       => $result['title'],
				'description' => $result['description']
			);
		}

		return $tt_blog_description_data;
	}

	public function deleteBlogComment($tt_blog_comment_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "tt_blog_comment WHERE tt_blog_comment_id = '" . (int)$tt_blog_comment_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "tt_blog_comment_description WHERE tt_blog_comment_id = '" . (int)$tt_blog_comment_id . "'");
	}

	public function approveComment($tt_blog_comment_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "tt_blog_comment SET approved = '1' WHERE tt_blog_comment_id = '" . (int)$tt_blog_comment_id . "'");
	}

	public function disapproveComment($tt_blog_comment_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "tt_blog_comment SET approved = '0' WHERE tt_blog_comment_id = '" . (int)$tt_blog_comment_id . "'");
	}

	public function getTotalBlogComments($tt_blog_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tt_blog_comment WHERE tt_blog_id = '" . (int)$tt_blog_id . "'");

		if ($query->row) {
			return $query->row['total'];
		} else {
			return false;
		}
	}

	public function getBlogComments($tt_blog_id, $data = array()) {
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "tt_blog_comment WHERE tt_blog_id = '" . (int)$tt_blog_id . "'";

			$sort_data = array(
				'author',
				'date_added'
			);

			if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
				$sql .= " ORDER BY " . $data['sort'];
			} else {
				$sql .= " ORDER BY date_added";
			}

			if (isset($data['order']) && ($data['order'] == 'DESC')) {
				$sql .= " DESC";
			} else {
				$sql .= " ASC";
			}

			if (isset($data['start']) || isset($data['limit'])) {
				if ($data['start'] < 0) {
					$data['start'] = 0;
				}

				if ($data['limit'] < 1) {
					$data['limit'] = 20;
				}

				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
			}

			$query = $this->db->query($sql);

			return $query->rows;
		} else {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tt_blog_comment WHERE tt_blog_id = '" . (int)$tt_blog_id . "'");

			return $query->rows;
		}
	}

	public function getBlogComment($tt_blog_comment_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tt_blog_comment WHERE tt_blog_comment_id = '" . (int)$tt_blog_comment_id . "'");

		return $query->row;
	}

	public function getBlogCommentDescriptions($tt_blog_comment_id) {
		$tt_blog_comment_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tt_blog_comment_description WHERE tt_blog_comment_id = '" . (int)$tt_blog_comment_id . "'");

		foreach ($query->rows as $result) {
			$tt_blog_comment_data[$result['language_id']] = array(
				'comment' => $result['comment']
			);
		}

		return $tt_blog_comment_data;
	}

	public function getBlogsByModule($module_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tt_blog b LEFT JOIN " . DB_PREFIX . "tt_blog_description bd ON (b.tt_blog_id = bd.tt_blog_id) WHERE bd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND b.module_id = '" . (int)$module_id . "' ORDER BY b.date_added");

		return $query->rows;
	}

	public function getBlogs($data = array()) {
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "tt_blog b LEFT JOIN " . DB_PREFIX . "tt_blog_description bd ON (b.tt_blog_id = bd.tt_blog_id) WHERE bd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

			$sort_data = array(
				'bd.title',
				'b.module_id',
				'b.date_added'
			);

			if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
				$sql .= " ORDER BY " . $data['sort'];
			} else {
				$sql .= " ORDER BY b.module_id, b.date_added";
			}

			if (isset($data['order']) && ($data['order'] == 'DESC')) {
				$sql .= " DESC";
			} else {
				$sql .= " ASC";
			}

			if (isset($data['start']) || isset($data['limit'])) {
				if ($data['start'] < 0) {
					$data['start'] = 0;
				}

				if ($data['limit'] < 1) {
					$data['limit'] = 20;
				}

				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
			}

			$query = $this->db->query($sql);

			return $query->rows;
		} else {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tt_blog b LEFT JOIN " . DB_PREFIX . "tt_blog_description bd ON (b.tt_blog_id = bd.tt_blog_id) WHERE bd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY b.date_added ASC");

			return $query->rows;
		}
	}

	public function getTotalBlogs() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tt_blog");

		return $query->row['total'];
	}

	public function getModule($module_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "module` WHERE `module_id` = '" . (int)$module_id . "'");

		return $query->row;
	}
}