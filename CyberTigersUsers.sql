use CS2830;

show tables;

create table CyberTigerMembers(
id int primary key auto_increment,
username varchar(255) not null unique,
userPassword text not null,
addDate datetime,
modifyDate datetime

);
