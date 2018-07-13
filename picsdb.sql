create database if not exists picsdb;
use picsdb;

create table pictures(
	id int unsigned auto_increment primary key,
    filename nvarchar(255),
    filetype nvarchar(50),
    filedata longblob,
    date_created datetime default current_timestamp
);

select * from pictures;
