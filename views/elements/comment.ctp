<div id="comment-box">
	<?php
		if (isset($extra)) {
			echo $form->create($modelName, array(
				'url' => array(
					'plugin' => $this->params['plugin'],
					'controller' => $this->params['controller'],
					'action' => $action,
					$extra)));
		} else {
			echo $form->create($modelName, array(
				'url' => array(
					'plugin' => $this->params['plugin'],
					'controller' => $this->params['controller'],
					'action' => $action)));
		}
	?>
		<fieldset>
			<legend><?php __("Post a {$commentModel}");?></legend>
			<?php
				echo $form->input("{$modelName}.id", array('value' => $value));
				echo $form->input("{$commentModel}.name");
				echo $form->input("{$commentModel}.email");
				echo $form->input("{$commentModel}.body");
			?>
		</fieldset>
	<?php echo $form->end('Submit'); ?>
</div>