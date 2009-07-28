This plugin provides an easy way to include Commentable Behavior in your application.

## Installation
- Clone from github : in your plugin directory type `git clone git://github.com/josegonzalez/commentable-behavior.git commentable`
- Add as a git submodule : in your plugin directory type `git submodule add git://github.com/josegonzalez/commentable-behavior.git commentable`
- Download an archive from github and extract it in `/plugins/commentable`

## Usage
In a model that needs slugging, add :

    var $actsAs = array('Commentable.Commentable')

Add the following to it's controller (I'm using the Post controller as an example) :

    function comment($id = null) {
        if (!empty($this->data['Comment'])) {
            if ($this->Post->createComment($id, $this->data)){
                $this->Session->setFlash(__('Post was commented on', true), 'messages/success');
                $this->redirect(array('action' => 'view', $id), 200, true);
            } else {
                $this->Session->setFlash(__('Post could not be commented on. Perhaps you left a field empty?', true), 'messages/error');
            }
        }
    }

And add the following to the view (in my case the posts/view.ctp file) you'd like to comment on:

    <h2><?php __('Post a Comment'); ?></h2>
    <?php echo $form->create('Post', array('action' => 'comment')); ?>
        <fieldset>
            <legend><?php __('Add Comment');?></legend>
            <?php
                echo $form->input('Post.id');
                echo $form->input('Comment.name');
                echo $form->input('Comment.email');
                echo $form->input('Comment.body');
            ?>
        </fieldset>
    <?php echo $form->end('Submit'); ?>