<?php
class Left extends Controller {
	public function index() {
		$this->db = Load::database();
		parent::$data['left'] = '';
		foreach ( $this->db->get('module',array(
			'pid' => 0
		),'`orderby` DESC,`id` ASC') as $column ) {
			if ( !substr(parent::$data['me']['power'],$column['id'] - 1,1) ) continue;
			$bg = 'style="background-image:url(' . uv('/images/admin/left/' . $column['ico']) . ');"';
			parent::$data['left'] .= '<li>' . ($column['url'] ? '<a href="' . u('/' .ADMIN . $column['url']) . '" target="main" ' . $bg . '>' . $column['name'] . '</a>' : '<span ' . $bg . '>' . $column['name'] . '</span>') . '</li>';
			$children = $this->db->get('module',array(
				'pid' => $column['id']
			),'`orderby` DESC,`id` ASC');
			if ( $children ) {
				parent::$data['left'] .= '<ul>';
				foreach ( $children as $item ) {
					parent::$data['left'] .= '<li>' . ($item['url'] ? '<a href="' . u('/' .ADMIN . $item['url']) . '" target="main">' . $item['name'] . '</a>' : '<span>' . $item['name'] . '</span>') . '</li>';
				}
				parent::$data['left'] .= '</ul>';
			}
		}
		Load::view('/admin/left.php',parent::$data);
	}
}