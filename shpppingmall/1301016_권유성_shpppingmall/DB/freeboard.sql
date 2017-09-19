CREATE TABLE freeboard (
  freenum int(11) NOT NULL AUTO_INCREMENT,
  userid char(15) NOT NULL,
  username char(10) NOT NULL,
  usernick char(10) NOT NULL,
  freesubject char(100) NOT NULL,
  freecontent text NOT NULL,
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
  PRIMARY KEY (freenum)
);

INSERT INTO freeboard(
  userid,
  username,
  usernick,
  freesubject,
  freecontent
) VALUES(
  'admin',
  'adminname',
  'ADMINICK',
  'subject test',
  'test content test'
);
