#管理员表
create table if not exists `jd_admin`(
  `id` int(11) unsigned not null auto_increment,
  `name` varchar(50) not null  comment '管理员名称',
  `password` char(32) not null comment '管理员密码',
  `email` varchar(30) not null comment '管理员邮箱',
  `phone` varchar(30) not null comment '管理员手机号',
  `img` varchar(255) default null,
  `create_time` int(11) unsigned not null default 0,
  `update_time` int(11) unsigned not null default 0,
  primary key (`id`),
  unique key name(`name`),
  unique key emali(`emali`),
  unique key phone(`phone`)
)engine=InnoDB AUTO_INCREMENT=1 default charset=utf8;
#错误日志表
CREATE TABLE `jd_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app_name` varchar(30) NOT NULL DEFAULT '' COMMENT 'app 名字',
  `err_name` varchar(50) NOT NULL DEFAULT 'NOT SET',
  `http_code` int(11) NOT NULL DEFAULT '0',
  `err_code` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(20) NOT NULL,
  `ua` varchar(200) NOT NULL,
  `content` longtext NOT NULL COMMENT '日志内容',
  `create_time` int(11) unsigned not null default 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='错误日志表'
#会员表
create table if not exists `jd_user`(
  `id` BIGINT unsigned not null auto_increment,
  `username` varchar(50) not null  comment '管理员名称',
  `password` char(32) not null comment '管理员密码',
  `useremail` varchar(30) not null comment '管理员邮箱',
  `phone` varchar(30) not null comment '管理员手机号',
  `img` varchar(255) default null,
  `create_time` int(11) unsigned not null default 0,
  `update_time` int(11) unsigned not null default 0,
  primary key (`id`),
  unique key username(`username`),
  unique key useremail(`useremail`),
  unique key phone(`phone`)
)engine=InnoDB AUTO_INCREMENT=1 default charset=utf8;
#详细表
create table if not exists `jd_profile`(
  `id` BIGINT unsigned not null auto_increment,
  `truename` varchar(50) not null,
  `password` char(32) not null,
  `useremali` varchar(30) not null,
  `age` tinyint unsigned not null default 0,
  `sex` enum('0','1','2') not null default '0',
  `birthday` date not null default '2000-01-01',
  `nickname` varchar(30) not null,
  `company` varchar(100) default null,
  `userid` BIGINT unsigned not null,
  `create_time` int(11) unsigned not null default 0,
  `update_time` int(11) unsigned not null default 0,
  primary key (`id`),
  key userid(`userid`)
)engine=InnoDB AUTO_INCREMENT=1 default charset=utf8;
#商品分类表
create table if not exists `jd_category`(
  `id` BIGINT unsigned not null auto_increment,
  `title` varchar(32) not null,
  `pid` BIGINT unsigned not null,
  `create_time` int(11) unsigned not null default 0,
  `update_time` int(11) unsigned not null default 0,
  primary key (`id`),
  key pid(`pid`),
  unique key (`title`)
)engine=InnoDB AUTO_INCREMENT=1 default charset=utf8;
#商品子分类表
create table if not exists `jd_soncate`(
  `id` BIGINT unsigned not null auto_increment,
  `title` varchar(32) not null,
  `cateid` BIGINT unsigned not null,
  `create_time` int(11) unsigned not null default 0,
  `update_time` int(11) unsigned not null default 0,
  primary key (`id`),
  key cateid(`cateid`),
  unique key (`title`)
)engine=InnoDB AUTO_INCREMENT=1 default charset=utf8;
#商品表
CREATE TABLE IF NOT EXISTS `jd_product`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `cateid` BIGINT UNSIGNED NOT NULL DEFAULT '0',
    `title` VARCHAR(200) NOT NULL DEFAULT '',
    `desc` TEXT,
    `num` INT UNSIGNED NOT NULL DEFAULT '0',
    `price` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
    `cover` VARCHAR(200) NOT NULL DEFAULT '',
    `pics` TEXT,
    `issale` ENUM('0','1') NOT NULL DEFAULT '0',
    `ishot` ENUM('0','1') NOT NULL DEFAULT '0',
    `istui` ENUM('0','1') NOT NULL DEFAULT '0',
    `saleprice` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
    `ison` ENUM('0','1') NOT NULL DEFAULT '1',
    `createtime` INT UNSIGNED NOT NULL DEFAULT '0',
    KEY shop_product_cateid(`cateid`),
    KEY shop_product_ison(`ison`)
)ENGINE=InnoDB DEFAULT CHARSET='utf8';

CREATE TABLE IF NOT EXISTS `jd_cart`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `productid` BIGINT UNSIGNED NOT NULL DEFAULT '0',
    `productnum` INT UNSIGNED NOT NULL DEFAULT '0',
    `price` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
    `userid` BIGINT UNSIGNED NOT NULL DEFAULT '0',
    `createtime` INT UNSIGNED NOT NULL DEFAULT '0',
    KEY shop_cart_productid(`productid`),
    KEY shop_cart_userid(`userid`)
)ENGINE=InnoDB DEFAULT CHARSET='utf8';
#订单表
CREATE TABLE IF NOT EXISTS `jd_order`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `userid` BIGINT UNSIGNED NOT NULL DEFAULT '0',
    `addressid` BIGINT UNSIGNED NOT NULL DEFAULT '0',
    `amount` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
    `status` tinyint NOT NULL DEFAULT '0' comment '订单状态 -1：待付款，0：待发货，1：已发货',
    `expressid` INT UNSIGNED NOT NULL DEFAULT '0',
    `expressno` VARCHAR(50) NOT NULL DEFAULT '',
    `tradeno` VARCHAR(100) NOT NULL DEFAULT '',
    `tradeext` TEXT,
    `create_time` INT UNSIGNED NOT NULL DEFAULT '0',
    KEY jd_order_userid(`userid`),
    KEY jd_order_addressid(`addressid`),
    KEY jd_order_expressid(`expressid`)
)ENGINE=InnoDB DEFAULT CHARSET='utf8';
#订单详情表
CREATE TABLE IF NOT EXISTS `jd_order_detail`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `productid` BIGINT UNSIGNED NOT NULL DEFAULT '0',
    `price` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
    `productnum` INT UNSIGNED NOT NULL DEFAULT '0',
    `orderid` BIGINT UNSIGNED NOT NULL DEFAULT '0',
    `create_time` INT UNSIGNED NOT NULL DEFAULT '0',
    `update_time` INT UNSIGNED NOT NULL DEFAULT '0',
    KEY jd_order_detail_productid(`productid`),
    KEY jd_order_detail_orderid(`orderid`)
)ENGINE=InnoDB DEFAULT CHARSET='utf8';
#地址
CREATE TABLE IF NOT EXISTS `jd_address`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `firstname` VARCHAR(32) NOT NULL DEFAULT '',
    `lastname` VARCHAR(32) NOT NULL DEFAULT '',
    `company` VARCHAR(100) NOT NULL DEFAULT '',
    `address` TEXT,
    `postcode` CHAR(6) NOT NULL DEFAULT '',
    `email` VARCHAR(100) NOT NULL DEFAULT '',
    `telephone` VARCHAR(20) NOT NULL DEFAULT '',
    `userid` BIGINT UNSIGNED NOT NULL DEFAULT '0',
    `create_time` INT UNSIGNED NOT NULL DEFAULT '0',
    `update_time` INT UNSIGNED NOT NULL DEFAULT '0',
    KEY jd_address_userid(`userid`)
)ENGINE=InnoDB DEFAULT CHARSET='utf8';

#推荐位表
CREATE TABLE IF NOT EXISTS `jd_featured`(
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(32) NOT NULL DEFAULT '',
    `listorder` int(8) NOT NULL DEFAULT '',
    `desc` VARCHAR(255) NOT NULL DEFAULT '',
    `status` tinyint(1) NOT NULL DEFAULT '' comment '状态 0：不展示，1：正常展示',
    `create_time` INT UNSIGNED NOT NULL DEFAULT '0',
    `update_time` INT UNSIGNED NOT NULL DEFAULT '0'
)ENGINE=InnoDB DEFAULT CHARSET='utf8';

#浏览历史表
CREATE TABLE IF NOT EXISTS `jd_history`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `userid` BIGINT UNSIGNED NOT NULL DEFAULT '0',
    `productid` BIGINT UNSIGNED NOT NULL DEFAULT '0'

)ENGINE=InnoDB DEFAULT CHARSET='utf8';
#统计表
CREATE TABLE IF NOT EXISTS `jd_statistics`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `earn` DECIMAL(30,2) NOT NULL DEFAULT '0.00' comment '收入',
    `ordernum`  int NOT NULL DEFAULT '0' comment '订单数',
    `create_time` INT UNSIGNED NOT NULL DEFAULT '0'
)ENGINE=InnoDB DEFAULT CHARSET='utf8';
#品牌表
CREATE TABLE IF NOT EXISTS `jd_brand`(
    `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `title` VARCHAR(32) NOT NULL DEFAULT '',
    `logo` VARCHAR(200) NOT NULL DEFAULT '',
    `create_time` INT UNSIGNED NOT NULL DEFAULT '0'
)ENGINE=InnoDB DEFAULT CHARSET='utf8';

CREATE TABLE IF NOT EXISTS `jd_cate_brand`(
    `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `cateid` int UNSIGNED NOT NULL NOT NULL DEFAULT 0,
    `brandid` int UNSIGNED NOT NULL NOT NULL DEFAULT 0,
)ENGINE=InnoDB DEFAULT CHARSET='utf8';