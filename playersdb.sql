drop database if exists semesterProjectdb;
create database if not exists semesterProjectdb;
use semesterProjectdb;

create TABLE login(
id int unsigned auto_increment primary key,
username varchar(20),
email varchar(20),
password varchar(20),
yearJoined year(4)
);

create TABLE player(
player_id int unsigned auto_increment primary key,
firstNamePlayer varchar(20),
lastNamePlayer varchar(20),
nickname varchar(100),
yearEntered year(4),
yearExit year(4),
mvp bool default false,
champion bool default false
);
insert into login(username,email,password,yearJoined) values ('John','jSmith@yahoo.com','12557343',1999);
insert into login(username,email,password,yearJoined) values ('Tom','tHammond@gmail.com','125sd3ggg3',2015);
insert into login(username,email,password,yearJoined) values ('Kenny','kJohnson@yahoo.com','dog390cat',2012);
insert into login(username,email,password,yearJoined) values ('Josh','jPack@outlook.com','997762ski',2018);
insert into login(username,email,password,yearJoined) values ('Karl','kMaster@yahoo.com','master123',2010);



insert into player(firstNamePlayer,lastNamePlayer,nickname,yearEntered,yearExit,mvp,champion) values('Michael','Jordan','MJ',1984,2003,true,true);
insert into player(firstNamePlayer,lastNamePlayer,nickname,yearEntered,yearExit,mvp,champion) values('Charles','Barkley','Round mound of rebound',1985,2000,true,false);
insert into player(firstNamePlayer,lastNamePlayer,nickname,yearEntered,yearExit,mvp,champion) values('Kareem','Abdul-Jabbar','Lew',1969,1989,true,true);
insert into player(firstNamePlayer,lastNamePlayer,nickname,yearEntered,yearExit,mvp,champion) values('Kobe','Bryant','Black Mamba',1997,2016,true,true);
insert into player(firstNamePlayer,lastNamePlayer,nickname,yearEntered,yearExit,mvp,champion) values('Julius','Irving','Dr. J',1971,1987,true,true);
insert into player(firstNamePlayer,lastNamePlayer,nickname,yearEntered,yearExit,mvp,champion) values('Larry','Nance','Little Hawk',1982,1994,false,false);
insert into player(firstNamePlayer,lastNamePlayer,nickname,yearEntered,yearExit,mvp,champion) values('Charles','Oakley','Oak',1985,2004,false,false);
insert into player(firstNamePlayer,lastNamePlayer,nickname,yearEntered,yearExit,mvp,champion) values('Dikembe','Mutombo','Deke',1992,2009,false,false);
insert into player(firstNamePlayer,lastNamePlayer,nickname,yearEntered,yearExit,mvp,champion) values('Reggie','Miller','Uncle Reg',1988,2005,false,false);
insert into player(firstNamePlayer,lastNamePlayer,nickname,yearEntered,yearExit,mvp,champion) values('Shaquille','ONeal','Shaq',1993,2011,true,true);
