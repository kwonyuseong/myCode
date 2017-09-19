create table product(
productnum int not null auto_increment,
productname varchar(50) not null,
productcategory varchar(30),
productcount int not null,
productprice int not null,
productseller int,
productexplain varchar(200),
procuctimgname varchar(40),
primary key(productnum)
);
