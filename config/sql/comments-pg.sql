CREATE TABLE comments (
  id SERIAL PRIMARY KEY,
  class varchar(128) NOT NULL,
  foreign_id int NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(320) NOT NULL,
  body text,
  website varchar(255) NOT NULL,
  status varchar(255) NOT NULL,
  rating int NOT NULL,
  points int NOT NULL,
  created TIMESTAMP(0) default NULL,
  modified TIMESTAMP(0) default NULL
);
