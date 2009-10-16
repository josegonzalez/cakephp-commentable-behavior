CREATE TABLE comments (
  id SERIAL PRIMARY KEY,
  class varchar(128) NOT NULL,
  foreign_id int NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(320) NOT NULL,
  body text,
  created TIMESTAMP(0) default NULL,
  modified TIMESTAMP(0) default NULL
);
