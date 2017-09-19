create table coment(
 comentno      int auto_increment not null,
 productnum    int not null,
 usernick      varchar(20),
 comentdate    char(20),
 comentcontent text,
 PRIMARY key(comentno)
);
