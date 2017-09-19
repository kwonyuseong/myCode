CREATE TABLE user(
  usernum int AUTO_INCREMENT NOT NULL,
  userid VARCHAR(40) NOT NULL,
  userpass VARCHAR(30) NOT NULL,
  usernick VARCHAR(30),
  usermoney INT,
  userrank CHAR(15),
  primary KEY(usernum)
);

INSERT INTO user (userid,userpass,usernick,usermoney,userrank)
VALUES ('admin','1234','ADMINICK',100000,8);
