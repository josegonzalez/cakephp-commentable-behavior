<?php
/**
 * Commentable Model Behavior
 * 
 * Allows you to attach a comment to any model in your application
 *
 * @package app.models.behaviors
 * @author Jose Diaz-Gonzalez
 * @version 0.2
 * @copyright Stoop Dev
 **/
class CommentableBehavior extends ModelBehavior {

	/**
	 * Contain settings indexed by model name.
	 *
	 * @var array
	 * @access private
	 */
	var $__settings = array();
	
	/**
	 * Initiate behaviour for the model using settings.
	 *
	 * @param object $Model Model using the behaviour
	 * @param array $settings Settings to override for model.
	 * @access public
	 */
	function setup(&$model, $settings = array()) {
		$default = array(
			'class' => 'Comment',    // name of Comment model
			'foreign_key' => 'foreign_id',    // foreign key of Comment model
			'counter_cache' => true,
			'dependent' => true,    // model dependency
			'conditions' => array('Comment.class' => $model->alias),    // conditions for find method on Comment model
			'auto_bind' => true,     // automatically bind the model to the User model (default true),
			'sanitize' => true     // whether to sanitize incoming comments
		);

		if (!isset($this->__settings[$model->alias])) {
			$this->__settings[$model->alias] = $default;
		}

		$this->__settings[$model->alias] = array_merge($this->__settings[$model->alias], ife(is_array($settings), $settings, array()));

		//handles model binding to the model
		//according to the auto_bind settings (default true)
		if ($this->__settings[$model->alias]['auto_bind']) {
			$commonHasMany = array(
				'Comment' => array(
					'className' => $this->__settings[$model->alias]['class'],
					'foreignKey' => $this->__settings[$model->alias]['foreign_key'],
					'dependent' => $this->__settings[$model->alias]['dependent'],
					'conditions' =>$this->__settings[$model->alias]['conditions']));
			$commentBelongsTo = array(
				$model->alias => array(
					'className' => $model->alias,
					'foreignKey' => $this->__settings[$model->alias]['foreign_key'],
					'counterCache' => $this->__settings[$model->alias]['counter_cache']
					)
				);
			$model->bindModel(array('hasMany' => $commonHasMany), false);
			$model->Comment->bindModel(array('belongsTo' => $commentBelongsTo), false);
		}
	}

	function createComment(&$model, $commentData = array()){
		if (!empty($commentData['Comment']) ) {
			$commentData['Comment']['class'] = $model->alias;
			$commentData['Comment']['foreign_id'] = $commentData[$model->alias]['id'];
			if ($this->__settings[$model->alias]['sanitize']) {
				App::import('Sanitize');
				$commentData['Comment']['name'] = Sanitize::clean($commentData['Comment']['name']);
				$commentData['Comment']['email'] = Sanitize::clean($commentData['Comment']['email']);
				$commentData['Comment']['body'] = Sanitize::clean($commentData['Comment']['body']);
			} else {
				$commentData['Comment']['name'] = $commentData['Comment']['name'];
				$commentData['Comment']['email'] = $commentData['Comment']['email'];
				$commentData['Comment']['body'] = $commentData['Comment']['body'];
			}
			if ($this->__checkForEmptyVal($commentData['Comment']) == false) {
				$model->Comment->create();
				if ($model->Comment->save($commentData)) {
					return true;
				}
			}
		}
		return false;
	}

	function getComments(&$model, $parameters = array()){
		$parameters = array_merge(array('id', 'options'), $parameters);
		
		if (isset($parameters['id']) && !is_numeric($parameters['id'])) {
			$options = array_merge_recursive(
				array('conditions' => array("$this->__settings[$model->alias]['class'].$this->__settings[$model->alias]['foreign_key']" => $parameters['id'])),
				$parameters['options']
			);
		}
		if (isset($options) && !$this->__checkForEmptyVal($options)){
			$model->Comment->find('all',
				$options
			);
		} else {
			$model->Comment->find('all');
		}
	}

	function __checkForEmptyVal($array) {
		$isEmpty = 0;
		foreach($array as $key => $item) {
			if(is_numeric($item)) {
			} elseif(empty($item)) {
				$isEmpty++;
			}
		}
		if($isEmpty > 0) {
			return true;
		}
		return false;
	}
}
?>