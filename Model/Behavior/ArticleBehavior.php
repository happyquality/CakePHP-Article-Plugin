<?php
/**
 * Article behavior
 *
 * Copyright 2013, Astha co.ltd.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2013, Astha co.ltd.
 * @package       JetBrains PhpStorm
 * @link          https://github.com/happyquality/
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class ArticleBehavior extends ModelBehavior {

	/**
	 * Specify the model you want to save the article
	 * @var string
	 */
	protected $attacheModel = 'Article';

	/**
	 * Runtime configuration for this behavior
	 *
	 * @var array
	 **/
	public $runtime;

	/**
	 * Initiate Article behavior
	 * @param Model $model
	 * @param array $settings
	 * @return void
	 */
	public function setup(Model $model, $settings = array()) {

		if (isset($this->settings[$model->alias])) return;
		$this->settings[$model->alias] = array();

		// Set fields
		if (empty($settings['fields'])) {
			return;
		}
		foreach ($settings['fields'] as $field => $options) {
			if (!isset($this->settings[$model->alias][$field])) {
				if (empty($options)) {
					$options = array();
				}
				$this->settings[$model->alias][$field] = $options;
			}
		}

		// Set runtimes
		App::uses('Model', $this->attacheModel);
		$this->runtime[$model->alias] =& ClassRegistry::init($this->attacheModel);

	}

	/**
	 * @param Model $model
	 * @param bool  $created
	 * @return bool
	 */
	public function afterSave(Model $model, $created) {

		foreach ($this->settings[$model->alias] as $field => $options) {
			if (!empty($model->data[$model->alias][$field])) {
				// Whether or not to publish articles
				$published = false;
				if (!empty($model->data[$model->alias][$field.'_published'])) {
					$published = true;
				}
				// Create the data to be saved article
				$article[$this->attacheModel] = array(
					'model' => $model->alias,
					'model_id' => $model->id,
					'model_field' => $field,
					'content' => $model->data[$model->alias][$field],
					'published' => $published,
					'posted' => date('Y-m-d H:i:s'),
				);

				$this->log($created);
				$this->log($article);

				$this->runtime[$model->alias]->create();
				if (!$this->runtime[$model->alias]->save($article)) {
					return false;
				}
			}
		}

	}

}
