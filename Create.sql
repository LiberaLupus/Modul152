create database Video;

use video;

create table MedienTypen (
	Id int not null auto_increment,
    Typ char(35),
    primary key(Id)
);

create table User ();



create table Medien (
	Id int not null auto_increment,
    Name char(225),
    UserFk int not null,
    primary key(Id),
    foreign key(UserFk) references User(Id)
);