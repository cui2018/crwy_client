<?php
class Databaser extends Controller {
	public function __construct() {
		$this->db = Load::database();
	}
	public function index() {
		parent::$data['tables'] = $this->db->sql("SELECT * FROM `INFORMATION_SCHEMA`.`TABLES` WHERE `TABLE_SCHEMA`='{$this->db->config['database']}'");
		foreach ( parent::$data['tables'] as &$item ) {
			$item['TABLE_NAME'] = substr($item['TABLE_NAME'],strlen($this->db->config['prefix']));
		}
		Load::view('/admin/develop/database/table.php',parent::$data);
	}
	public function tbdata() {
		$table = post('table');
		$page = post('page','intval');
		$where = post('where');
		$order = post('order');
		$pagesize = post('pagesize','intval');
		$limit = (($page - 1) * $pagesize) . ',' . $pagesize;
		$data = $this->db->get($table,$where,$order,$limit);
		$column = $this->_getColumn($table);
		$total = $this->db->rows($table,$where);
		api_success(array(
			'column' => $column,
			'data' => $data,
			'setting' => array(
				'total' => $total,
				'pages' => ceil($total / $pagesize)
			)
		));
	}
	public function structure() {
		$table = post('table');
		$info = $this->db->sql("SELECT * FROM `INFORMATION_SCHEMA`.`TABLES` WHERE `TABLE_SCHEMA`='{$this->db->config['database']}' AND `TABLE_NAME`='{$this->db->config['prefix']}{$table}'");
		$info[0]['TABLE_NAME'] = substr($info[0]['TABLE_NAME'],strlen($this->db->config['prefix']));
		$column = $this->_getColumn($table);
		$keys = $this->db->sql("SHOW INDEX FROM `{$this->db->config['prefix']}{$table}`");
		api_success(array(
			'table' => $info[0],
			'column' => $column,
			'keys' => $keys
		));
	}
	public function truncate() {
		$table = post('table');
		$this->db->sql("TRUNCATE `{$this->db->config['prefix']}{$table}`");
		api_success();
	}
	public function drop() {
		$table = post('table');
		$this->db->sql("DROP TABLE IF EXISTS `{$this->db->config['prefix']}{$table}`");
		api_success();
	}
	public function setOne() {
		$table = post('table');
		$prikey = post('prikey');
		$privalue = post('privalue');
		$column = post('column');
		$value = post('value');
		$this->db->update($table,array(
			$column => $value
		),array(
			$prikey => $privalue
		));
		api_success();
	}
	public function deleteAll() {
		$table = post('table');
		$prikey = post('prikey');
		$privalues = post('privalues');
		$this->db->delete($table,array(
			$prikey . ' IN' => $privalues
		));
		api_success();
	}
	public function deleteOne() {
		$table = post('table');
		$prikey = post('prikey');
		$privalue = post('privalue');
		$this->db->delete($table,array(
			$prikey => $privalue
		));
		api_success();
	}
	public function create() {
		$table = post('table');
		$engine = post('engine');
		$comment = post('comment');
		$lines = post('lines');
		if ( !$table ) return api_error('请输入表名~');
		$engine = $engine ? $engine : 'MyISAM';
		$sql = "CREATE TABLE `{$this->db->config['prefix']}{$table}` (";
		$field = array();
		$keys = array();
		foreach ( $lines as $column ) {
			$str = "`{$column['name']}`";
			$str .= " {$column['type']}";
			if (
				$column['type'] == 'int' ||
				$column['type'] == 'bigint' ||
				$column['type'] == 'tinyint' ||
				$column['type'] == 'char' ||
				$column['type'] == 'varchar'
			) $str .= "({$column['long']})";
			elseif ( $column['type'] == 'decimal' ) $str .= "({$column['long']},{$column['decimal']})";
			$str .= $column['unsigned'] ? " unsigned" : "";
			$str .= $column['notnull'] ? " NOT NULL" : "";
			if (
				(
					$column['type'] == 'int' ||
					$column['type'] == 'bigint' ||
					$column['type'] == 'tinyint' ||
					$column['type'] == 'decimal' ||
					$column['type'] == 'char' ||
					$column['type'] == 'varchar'
				) && $column['def']
			) $str .= " DEFAULT '{$column['def']}'";
			elseif (
				(
					$column['type'] == 'char' ||
					$column['type'] == 'varchar'
				) && !$column['def']
			) $str .= " DEFAULT ''";
			$str .= $column['pri'] ? " AUTO_INCREMENT" : "";
			$str .= $column['comment'] ? " COMMENT '{$column['comment']}'" : "";
			array_push($field,$str);
			$str = "";
			if ( $column['pri'] ) $str = "PRIMARY KEY (`{$column['name']}`)";
			if ( $column['key'] == 'Unique' ) $str = "UNIQUE KEY `{$column['name']}` (`{$column['name']}`) USING BTREE";
			elseif ( $column['key'] == 'Normal' ) $str = "KEY `{$column['name']}` (`{$column['name']}`) USING BTREE";
			elseif ( $column['key'] == 'Full Text' ) $str = "FULLTEXT KEY `{$column['name']}` (`{$column['name']}`)";
			if ( $str ) array_push($keys,$str);
		}
		if ( !$field ) return api_error('请输入字段~');
		$sql .= implode(',',$field);
		if ( $keys ) $sql .= ',' . implode(',',$keys);
		$sql .= ") ENGINE={$engine} DEFAULT CHARSET=utf8 COMMENT='{$comment}'";
		$this->db->sql($sql);
		api_success();
	}
	public function structured() {
		$table = post('table');
		$newTablename = post('newTablename');
		$engine = post('engine');
		$comment = post('comment');
		$lines = post('lines');
		$data = '{"newTablename":"test2","engine":"InnoDB","comment":"testest2","lines":[{"name":"username","oldname":"uid","type":"char","long":"20","decimal":"0","notnull":"1","unsigned":"0","def":"","pri":"0","key":"Unique","comment":"\u7528\u6237\u540d"},{"name":"id","oldname":"id","type":"int","long":"10","decimal":"0","notnull":"1","unsigned":"1","def":"","pri":"1","key":"","comment":"\u4e3b\u952eID"},{"name":"price","oldname":"price","type":"decimal","long":"8","decimal":"2","notnull":"1","unsigned":"1","def":"","pri":"0","key":"","comment":"\u4ef7\u683cs"},{"name":"exp","oldname":"exp","type":"bigint","long":"20","decimal":"0","notnull":"1","unsigned":"1","def":"","pri":"0","key":"","comment":"\u7ecf\u9a8cs"},{"name":"pid","oldname":"pid","type":"int","long":"10","decimal":"0","notnull":"1","unsigned":"1","def":"1","pri":"0","key":"Unique","comment":"\u7236\u7ea7IDs"},{"name":"nick","oldname":"nick","type":"varchar","long":"100","decimal":"0","notnull":"1","unsigned":"0","def":"","pri":"0","key":"","comment":"\u6635\u79f0s"},{"name":"key","oldname":"key","type":"char","long":"20","decimal":"0","notnull":"1","unsigned":"0","def":"","pri":"0","key":"Full Text","comment":"\u952es"},{"name":"state","oldname":"state","type":"tinyint","long":"2","decimal":"0","notnull":"1","unsigned":"1","def":"1","pri":"0","key":"Normal","comment":"\u72b6\u6001s"},{"name":"data","oldname":"data","type":"longtext","long":"0","decimal":"0","notnull":"1","unsigned":"0","def":"","pri":"0","key":"","comment":"\u6570\u636es"},{"name":"content","oldname":"content","type":"text","long":"0","decimal":"0","notnull":"1","unsigned":"0","def":"","pri":"0","key":"","comment":"\u5185\u5bb9s"}],"table":"test1"}';
		$data = json_decode($data,TRUE);
		$table = $data['table'];
		$newTablename = $data['newTablename'];
		$engine = $data['engine'];
		$comment = $data['comment'];
		$lines = $data['lines'];
		$table = $this->db->config['prefix'] . $table;
		$newTablename = $this->db->config['prefix'] . $newTablename;
		$info = $this->db->sql("SELECT * FROM `INFORMATION_SCHEMA`.`TABLES` WHERE `TABLE_SCHEMA`='{$this->db->config['database']}' AND `TABLE_NAME`='{$table}'");
		//if ( $info[0]['ENGINE'] != $engine ) $this->db->sql("ALTER TABLE `{$table}` ENGINE={$engine}");
		//if ( $info[0]['TABLE_COMMENT'] != $comment ) $this->db->sql("ALTER TABLE `{$table}` COMMENT={$comment}");
		$keys = array();
		foreach ( $this->db->sql("SHOW INDEX FROM `{$table}`") as $item ) {
			$keys[$item['Column_name']] = $item;
		}
		/*for ( $i = count($lines) - 1; $i >= 0; $i-- ) {
			$column = $lines[$i];
			$sql = "ALTER TABLE `{$table}` CHANGE `{$column['oldname']}` `{$column['name']}`";
			$sql .= " {$column['type']}";
			if (
				$column['type'] == 'int' ||
				$column['type'] == 'bigint' ||
				$column['type'] == 'tinyint' ||
				$column['type'] == 'char' ||
				$column['type'] == 'varchar'
			) $sql .= "({$column['long']})";
			elseif ( $column['type'] == 'decimal' ) $sql .= "({$column['long']},{$column['decimal']})";
			$sql .= $column['unsigned'] ? " unsigned" : "";
			$sql .= $column['notnull'] ? " NOT NULL" : "";
			if (
				(
					$column['type'] == 'int' ||
					$column['type'] == 'bigint' ||
					$column['type'] == 'tinyint' ||
					$column['type'] == 'decimal' ||
					$column['type'] == 'char' ||
					$column['type'] == 'varchar'
				) && $column['def']
			) $sql .= " DEFAULT '{$column['def']}'";
			elseif (
				(
					$column['type'] == 'char' ||
					$column['type'] == 'varchar'
				) && !$column['def']
			) $sql .= " DEFAULT ''";
			$sql .= $column['pri'] ? " AUTO_INCREMENT" : "";
			$sql .= $column['comment'] ? " COMMENT '{$column['comment']}'" : "";
			$sql .= " AFTER `TMP_MOVER_REFER`";
			$this->db->sql($sql);
		}
		$this->db->sql("ALTER TABLE `{$table}` DROP COLUMN `TMP_MOVER_REFER`");*/
		foreach ( $lines as $column ) {
			if ( array_isset($keys,$column['oldname']) ) {
				$key = $keys[$column['oldname']];
				if ( $column['pri'] && $key['Key_name'] != 'PRIMARY' ) {
					$this->db_sql("ALTER TABLE `{$table}` DROP INDEX `{$key['Key_name']}`");
					$this->db_sql("ALTER TABLE `{$table}` ADD PRIMARY KEY (`{$column['name']}`)");
				}
				elseif ( $column['key'] == 'Unique' && $key['Non_unique'] == '1' ) {
					if ( $key['Key_name'] == 'PRIMARY' ) $this->db_sql("ALTER TABLE `{$table}` DROP PRIMARY KEY");
					else $this->db_sql("ALTER TABLE `{$table}` DROP INDEX `{$key['Key_name']}`");
					$this->db_sql("ALTER TABLE `{$table}` ADD UNIQUE KEY `{$column['name']}` (`{$column['name']}`) USING BTREE");
				}
				elseif ( $column['key'] == 'Normal' && ($key['Non_unique'] == '0' || ($key['Non_unique'] == '1' && $key['Index_type'] != 'BTREE')) ) {
					if ( $key['Key_name'] == 'PRIMARY' ) $this->db_sql("ALTER TABLE `{$table}` DROP PRIMARY KEY");
					else $this->db_sql("ALTER TABLE `{$table}` DROP INDEX `{$key['Key_name']}`");
					$this->db_sql("ALTER TABLE `{$table}` ADD KEY `{$column['name']}` (`{$column['name']}`) USING BTREE");
				}
				elseif ( $column['key'] == 'Full Text' && ($key['Non_unique'] == '0' || ($key['Non_unique'] == '1' && $key['Index_type'] != 'FULLTEXT')) ) {
					if ( $key['Key_name'] == 'PRIMARY' ) $this->db_sql("ALTER TABLE `{$table}` DROP PRIMARY KEY");
					else $this->db_sql("ALTER TABLE `{$table}` DROP INDEX `{$key['Key_name']}`");
					$this->db_sql("ALTER TABLE `{$table}` ADD FULLTEXT KEY `{$column['name']}` (`{$column['name']}`)");
				}
				elseif ( !$column['pri'] && !$column['key'] ) {
					if ( $key['Key_name'] == 'PRIMARY' ) $this->db_sql("ALTER TABLE `{$table}` DROP PRIMARY KEY");
					else $this->db_sql("ALTER TABLE `{$table}` DROP INDEX `{$key['Key_name']}`");
				}
			}
			elseif ( $column['pri'] ) {
				$this->db_sql("ALTER TABLE `{$table}` ADD PRIMARY KEY (`{$column['name']}`)");
			}
			elseif ( $column['key'] ) {
				if ( $column['key'] == 'Unique' ) $this->db_sql("ALTER TABLE `{$table}` ADD UNIQUE KEY `{$column['name']}` (`{$column['name']}`) USING BTREE");
				elseif ( $column['key'] == 'Normal' ) $this->db_sql("ALTER TABLE `{$table}` ADD KEY `{$column['name']}` (`{$column['name']}`) USING BTREE");
				elseif ( $column['key'] == 'Full Text' ) $this->db_sql("ALTER TABLE `{$table}` ADD FULLTEXT KEY `{$column['name']}` (`{$column['name']}`)");
			}
		}
		printr($lines);
		printr($this->data['sql']);
		if ( $newTablename != $table ) $this->db->sql("ALTER TABLE `{$table}` RENAME `$newTablename`");
		api_success();
	}
	private function db_sql($sql) {
		if ( !array_isset($this->data,'sql') ) $this->data['sql'] = '';
		$this->data['sql'] .= $sql . '<br>';
	}
	private function _getColumn($table) {
		$table = $this->db->config['prefix'] . $table;
		return $this->db->sql("SELECT * FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='{$this->db->config['database']}' AND `TABLE_NAME`='$table'");
	}
	public function upload() {
		$file = upfile('upfile');
		echo $file ? $file : '';
	}
}