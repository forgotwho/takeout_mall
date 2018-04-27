<?php

$sql = <<<EOT

CREATE TABLE `takeout_mall_catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(10) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '分类名称',
  `icon` varchar(100) NOT NULL DEFAULT '' COMMENT '分类图标',
  `description` mediumtext NOT NULL COMMENT '分类描述',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '分类状态',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `takeout_mall_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_id` int(11) NOT NULL COMMENT '公告ID',
  `userId` int(10) NOT NULL,
  `user_id` varchar(100) NOT NULL DEFAULT '' COMMENT '评论人ID',
  `content` mediumtext NOT NULL COMMENT '评论内容',
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '评论状态',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `takeout_mall_notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(10) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '公告名称',
  `description` mediumtext NOT NULL COMMENT '公告介绍',
  `mainpic` varchar(100) NOT NULL DEFAULT '' COMMENT '公告主图',
  `content` mediumtext NOT NULL COMMENT '公告内容',
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '公告状态',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `takeout_mall_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '产品名称',
  `price` double(11,2) NOT NULL COMMENT '产品价格',
  `description` mediumtext NOT NULL COMMENT '产品介绍',
  `mainpic` varchar(100) NOT NULL DEFAULT '' COMMENT '产品主图',
  `content` mediumtext NOT NULL COMMENT '产品内容',
  `picture` varchar(500) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '产品状态',
  `catalog_id` int(11) NOT NULL COMMENT '产品分类',
  `userId` int(10) NOT NULL,
  `priority` int(11) NOT NULL COMMENT '优先级',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `takeout_mall_setting` (
  `key` varchar(100) NOT NULL,
  `value` text,
  `uniacid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `takeout_mall_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `openid` varchar(100) DEFAULT NULL,
  `unionid` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `avatarurl` varchar(200) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `detail` text,
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '分类状态',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


EOT;

pdo_query($sql);
