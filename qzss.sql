SET NAMES UTF8;
DROP DATABASE IF EXISTS qzss;
CREATE DATABASE qzss CHARSET=UTF8;
USE qzss;

--用户表
create table user(
    id int unsigned not null auto_increment primary key,
    username varchar(20) not null,
    password varchar(32) not null,
    realname varchar(20) not null,
    img  varchar(100) not null default 'moren.gif',
    sex tinyint unsigned not null default '1'
);

--管理员表
create table admin(
    id int unsigned not null auto_increment primary key,
    username varchar(20) not null,
    password varchar(32) not null
);

--广告表
create table advert(
    id int unsigned not null auto_increment primary key,
    img  varchar(100) not null,
    pos tinyint unsigned not null,
    url varchar(100) not null
);

--二手书类别表
create table class(
    id int unsigned not null auto_increment primary key,
    name varchar(50) not null
);

--二手书信息表 supplier默认0 本站提供
create table book(
    id int unsigned not null auto_increment primary key,
    name varchar(50) not null,
    writer varchar(50) not null,
    img  varchar(100) not null,
    info mediumtext not null,
    oldprice float(8,2) unsigned not null,
    nowprice float(8,2) unsigned not null,
    class_id int unsigned not null,
    stock int unsigned not null,
    sales int unsigned not null default '0',
    supplier int unsigned not null default '0',
    shelf tinyint unsigned not null,
    recommend tinyint unsigned not null default '0'
);

--评论表
create table comment(
    id int unsigned not null auto_increment primary key,
    user_id int unsigned not null,
    content text,
    book_id int unsigned not null,
    time int
);

--订单状态表
create table status(
    id int unsigned not null auto_increment primary key,
    name varchar(50)
);

--订单表  status_id默认1未发货
--confirm默认0未确认
--paytype默认1货到付款   2支付宝支付  3一卡通支付
--posttype默认1普通快递  2EMS  3顺丰
create table indent(
    id int unsigned not null auto_increment primary key,
    code varchar(50) not null,
    user_id int unsigned not null,
    touch_id int unsigned not null,
    book_id int unsigned not null,
    price float(8,2) unsigned not null,
    num int unsigned not null,
    status_id int not null default '1',
    confirm tinyint unsigned not null default '0',
    paytype int unsigned not null default '1',
    posttype int unsigned not null default '1',
    time int not null
);

--联系方式表
create table touch(
    id   int unsigned not null auto_increment primary key,
    name varchar(50) not null,
    addr varchar(100) not null,
    postcode varchar(10) not null,
    tel varchar(50) not null,
    user_id int unsigned not null
);

--书架表
create table bookshelf(
    id   int unsigned not null auto_increment primary key,
    book_id int unsigned not null,
    user_id int unsigned not null
);