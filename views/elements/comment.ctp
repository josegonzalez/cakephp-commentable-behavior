<div id="comment-box">
	<?php echo $form->create('Post', array('action' => 'comment')); ?>
		<fieldset>
			<legend><?php __('Post a Comment');?></legend>
			<?php
				echo $form->input('Post.id', array('value' => $post['Post']['id']));
				echo $form->input('Comment.name');
				echo $form->input('Comment.email');
				echo $form->input('Comment.body');
			?>
		</fieldset>
	<?php echo $form->end('Submit'); ?>
</div>