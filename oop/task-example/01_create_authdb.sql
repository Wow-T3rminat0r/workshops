drop database if exists authdb;
create database authdb;

use authdb;
create table auth (
	uid varchar(50) not null,
	password varchar(16) not null,
	primary key (uid, password)
) engine=InnoDB default charset=utf8;

insert into auth values('authdb_admin', 'admin123');
insert into auth values('user01', 'pass01');
insert into auth values('user02', 'pass02');
