CREATE TABLE free (
  num int(11) NOT NULL AUTO_INCREMENT,
  id char(15) NOT NULL,
  name char(10) NOT NULL,
  nick char(10) NOT NULL,
  subject char(100) NOT NULL,
  content text NOT NULL,
  regist_day char(20) DEFAULT NULL,
  hit int(11) DEFAULT NULL,
  file_name_0 char(40) DEFAULT NULL,
  file_name_1 char(40) DEFAULT NULL,
  file_name_2 char(40) DEFAULT NULL,
  file_name_3 char(40) DEFAULT NULL,
  file_name_4 char(40) DEFAULT NULL,
  file_copied_0 char(30) DEFAULT NULL,
  file_copied_1 char(30) DEFAULT NULL,
  file_copied_2 char(30) DEFAULT NULL,
  file_copied_3 char(30) DEFAULT NULL,
  file_copied_4 char(30) DEFAULT NULL,
  PRIMARY KEY (num)
);

CREATE TABLE free_ripple (
  num int(11) NOT NULL AUTO_INCREMENT,
  parent int(11) NOT NULL,
  id char(15) NOT NULL,
  name char(10) NOT NULL,
  nick char(10) NOT NULL,
  content text NOT NULL,
  regist_day char(20) DEFAULT NULL,
  PRIMARY KEY (num)
)
