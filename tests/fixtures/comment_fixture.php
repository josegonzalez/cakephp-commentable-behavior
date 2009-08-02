<?php 
/* SVN FILE: $Id$ */
/* Group Fixture generated on: 2009-08-02 01:08:28 : 1249192168*/

class CommentFixture extends CakeTestFixture {
	var $name = 'Comment';
	var $table = 'comments';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'class' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 128),
		'foreign_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 250),
		'email' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 320),
		'body' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Post',
		'foreign_id'  => 1,
		'name'  => 'Lorem Ipsum',
		'email'  => 'lorem@ipsum.com',
		'body'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'created'  => '2009-08-02 01:49:43',
		'modified'  => '2009-08-02 01:49:43',
	));
}
?>