<?php
include_once('../sait3/tools.php');

/*
$ct1= 'create table Roles(id int not null auto_increment primary key, rolename varchar(20)) default charset="utf8"';
Tools::createTable($ct1);
*/

$ct2= 'create table Groups(id int not null auto_increment primary key, groupname varchar(100)) default charset="utf8"';
Tools::createTable($ct2);

/*
 $ct3= 'create table users(id int not null auto_increment primary key, username varchar(30) not null, pass varchar(255)
 	 not null, email varchar(250), role_id int, foreign key(role_id) references Roles(id) on delete cascade on update
 	  cascade) default charset="utf8"';
Tools::createTable($ct3);
*/
/*
$ct4= 'create table Products
		(id int not null auto_increment primary key,
		 product varchar(50),
		  group_id int, foreign key (group_id) references Groups(id) on delete cascade on update cascade,
		   price int not null,
		    country varchar(50),
		     info varchar(1024),
		      datein date,
		      discount int) default charset="utf8"';
Tools::createTable($ct4);
*/
/*
$ct5= 'create table sales 
		(id int not null auto_increment primary key,
		 product varchar(50),
		 price int not null,
		 country varchar(50),
		 datesold date,
		 group_id int, foreign key(group_id) references Groups(id) on delete cascade on update cascade)
		default charset="utf8"';
Tools::createTable($ct5);
*/
/*
$ct6= 'create table images(
		id int not null auto_increment primary key,
		product_id int, foreign key(product_id) references products(id) on delete cascade on update cascade,
		imagepath varchar(255))
		default charset="utf8"';
Tools::createTable($ct6);
*/
?>