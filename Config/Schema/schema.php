<?php 
class ArticleSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $articles = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'model' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'model_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'model_field' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'content' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'published' => array('type' => 'boolean', 'null' => false, 'default' => '1', 'comment' => '公開設定（下書きなら0）'),
		'posted' => array('type' => 'datetime', 'null' => false, 'default' => null, 'comment' => '公開日時'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'unq_article' => array('column' => array('model', 'model_id', 'model_field'), 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
}
