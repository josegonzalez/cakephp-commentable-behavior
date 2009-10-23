CREATE TABLE `comments` (
  `id` int(11) NOT NULL auto_increment,
  `class` varchar(128) NOT NULL,
  `foreign_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `body` text,
  `website` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;