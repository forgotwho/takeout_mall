<?php

$sql = <<<EOT


CREATE TABLE `ims_takeout_mall_catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '分类名称',
  `icon` varchar(100) NOT NULL DEFAULT '' COMMENT '分类图标',
  `description` mediumtext NULL  COMMENT '分类描述',
  `priority` int(11) NOT NULL DEFAULT 10 COMMENT '优先级',
  `status` varchar(100) NOT NULL DEFAULT '01' COMMENT '分类状态',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `ims_takeout_mall_shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` varchar(100) NOT NULL COMMENT '门店号',
  `seller_name` varchar(100) NOT NULL DEFAULT '' COMMENT '门店名称',
  `pic_url` varchar(100) NOT NULL DEFAULT '' COMMENT '门店LOGO',  
  `sales` int(11) NOT NULL DEFAULT 0 COMMENT '月售量',
  `min_price` int(11) NOT NULL DEFAULT 10 COMMENT '起送价格',
  `reach_time` int(11) NOT NULL DEFAULT 30 COMMENT '配送最快时长',
  `longitude` double(20,6) NOT NULL  COMMENT '经度坐标',
  `latitude` double(20,6) NOT NULL  COMMENT '纬度坐标',
  `is_rest` int(11) NOT NULL DEFAULT 1 COMMENT '营业状态',
  `catalog_id` int(10) NOT NULL COMMENT '门店分类',
  `title` mediumtext NOT NULL COMMENT '门店标题',
  `notice` mediumtext NOT NULL  COMMENT '门店公告',
  `phone` varchar(100) NOT NULL DEFAULT '' COMMENT '商家电话',
  `qrcode` varchar(100) NOT NULL DEFAULT '' COMMENT '商家二维码',
  `address` varchar(100) NOT NULL DEFAULT '' COMMENT '商家地址',
  `sell_time` varchar(100) NOT NULL DEFAULT '' COMMENT '营业时间',
  `express_info` varchar(100) NOT NULL DEFAULT '' COMMENT '配送服务', 
  `delivery_fee` int(11) NULL COMMENT '配送费',
  `overall` double(10,2) NOT NULL DEFAULT '5' COMMENT '综合评分',
  `quality` double(10,2) NOT NULL DEFAULT '5' COMMENT '商家评分',
  `service` double(10,2) NOT NULL DEFAULT '5' COMMENT '配送评分',
  `tags` int(11) NULL COMMENT '标签类型',
  `status` varchar(100) NOT NULL DEFAULT '' COMMENT '产品状态',
  `priority` int(11) NOT NULL DEFAULT 10 COMMENT '优先级',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `ims_takeout_mall_shops_promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` varchar(100) NOT NULL COMMENT '门店号',
  `pic_url` varchar(200) NOT NULL DEFAULT '' COMMENT '活动图片',  
  `info` mediumtext NOT NULL COMMENT '活动内容',  
  `priority` int(11) NOT NULL DEFAULT 10 COMMENT '优先级',
  `status` varchar(100) NOT NULL DEFAULT '01' COMMENT '分类状态',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `ims_takeout_mall_goods_catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` varchar(100) NOT NULL COMMENT '门店号',
  `menu_name` varchar(100) NOT NULL COMMENT '分类名称',
  `priority` int(11) NOT NULL DEFAULT 10 COMMENT '优先级',
  `status` varchar(100) NOT NULL DEFAULT '01' COMMENT '分类状态',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `ims_takeout_mall_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_url` varchar(200) NOT NULL COMMENT '货品主图',
  `goods_name` varchar(100) NOT NULL COMMENT '货品名称',
  `sales` int(10) NOT NULL COMMENT '货品销量',
  `price` decimal(10,2) NOT NULL COMMENT '货品价格',
  `packing_fee` decimal(10,2) NOT NULL COMMENT '餐盒费',  
  `num` int(10) NOT NULL COMMENT '货品数量',  
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '货品状态',
  `has_standard` int(10) NOT NULL COMMENT '是否有规格',  
  `seller_id` varchar(100) NOT NULL COMMENT '门店号',
  `catalog_id` int(11) NOT NULL COMMENT '分类ID',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `ims_takeout_mall_goods_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(100) NOT NULL COMMENT '规格名称',
  `price` decimal(10,2) NOT NULL COMMENT '规格价格',
  `num` int(10) NOT NULL COMMENT '规格数量',  
  `packing_fee` decimal(10,2) NOT NULL COMMENT '餐盒费',
  `goods_id` varchar(100) NOT NULL COMMENT '门店号',  
  `seller_id` varchar(100) NOT NULL COMMENT '门店号',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `ims_takeout_mall_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '卡券名称',
  `code` varchar(100) NOT NULL COMMENT '卡券标识',
  `money` decimal(10,2) NOT NULL COMMENT '卡券金额',
  `num` int(10) NOT NULL COMMENT '卡券数量',  
  `publish_time` int(11) NOT NULL COMMENT '发行时间',
  `deadline_time` varchar(100) NOT NULL COMMENT '开始截止时间',
  `status` int(100) NOT NULL COMMENT '卡券状态',  
  `useful_type` int(100) NOT NULL COMMENT '使用范围', 
  `seller_id` varchar(100) NOT NULL COMMENT '门店号',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `ims_takeout_mall_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(100) NOT NULL COMMENT '订单编号',
  `cut_money` decimal(10,2) NOT NULL COMMENT '商城优惠',
  `coupon_money` decimal(10,2) NOT NULL COMMENT '卡券优惠',
  `receiver_addr_id` varchar(100) NOT NULL COMMENT '收件地址',
  `receiver` varchar(100) NOT NULL COMMENT '联系人',
  `receiver_phone` varchar(100) NOT NULL COMMENT '联系方式',
  `receiver_addr` varchar(100) NOT NULL COMMENT '联系地址',
  `user_coupon_id` varchar(100) NOT NULL COMMENT '卡券ID',
  `seller_name` varchar(100) NOT NULL COMMENT '卖家',
  `packing_fee` decimal(10,2) NOT NULL COMMENT '餐盒费',
  `delivery_fee` decimal(10,2) NOT NULL COMMENT '配送费',
  `order_price` decimal(10,2) NOT NULL COMMENT '总价',
  `pay_price` decimal(10,2) NOT NULL COMMENT '实付',
  `goods` mediumtext NOT NULL COMMENT '货品详情',  
  `title` varchar(200) NOT NULL COMMENT '订单名称',
  `pic_url` varchar(200) NOT NULL COMMENT '订单主图',
  `remark` mediumtext NOT NULL COMMENT '备注',
  `state` int(11) NOT NULL,
  `is_reviews` int(11) NOT NULL,
  `left_time` int(11) NOT NULL,
  `add_time` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL COMMENT '买家ID',
  `seller_id` varchar(100) NOT NULL COMMENT '卖家ID',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `ims_takeout_mall_orders_flow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(100) NOT NULL COMMENT '订单编号',
  `state` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `seller_id` varchar(100) NOT NULL COMMENT '卖家ID',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `ims_takeout_mall_users_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver` varchar(100) NOT NULL DEFAULT '' COMMENT '联系人',
  `phone` varchar(100) NOT NULL COMMENT '手机号',
  `detail` varchar(200) NOT NULL DEFAULT '' COMMENT '门牌号',
  `longitude` double(20,6) NOT NULL  COMMENT '经度坐标',
  `latitude` double(20,6) NOT NULL  COMMENT '纬度坐标',
  `addr` varchar(200) NOT NULL DEFAULT '' COMMENT '地址',
  `city_id` varchar(100) NOT NULL COMMENT '城市编码',
  `city_name` varchar(100) NOT NULL COMMENT '城市名称',
  `district_id` varchar(100) NOT NULL COMMENT '地区编码',
  `district_name` varchar(100) NOT NULL COMMENT '地区名称',
  `status` varchar(100) NOT NULL DEFAULT '' COMMENT '状态',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `user_id` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `ims_takeout_mall_users_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) NOT NULL COMMENT '卡券ID',
  `coupon_no` int(11) NOT NULL COMMENT '卡券编号',
  `use_status` int(11) NOT NULL COMMENT '使用状态',
  `use_time` int(11) NOT NULL COMMENT '使用时间',
  `user_id` int(11) NOT NULL COMMENT '用户ID',  
  `seller_id` varchar(100) NOT NULL COMMENT '门店号',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `ims_takeout_mall_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `openid` varchar(100) DEFAULT NULL,
  `unionid` varchar(100) DEFAULT NULL,
  `nickName` varchar(100) DEFAULT NULL,
  `avatarUrl` varchar(200) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,  
  `user_token` varchar(100) DEFAULT NULL,  
  `expire_time` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '用户状态',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `takeout_mall_shops_notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '公告名称',
  `description` mediumtext NOT NULL COMMENT '公告介绍',
  `mainpic` varchar(100) NOT NULL DEFAULT '' COMMENT '公告主图',
  `content` mediumtext NOT NULL COMMENT '公告内容',
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '公告状态',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `shop_id` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



CREATE TABLE `takeout_mall_standard_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '规格类型名称',
  `field` varchar(255) NOT NULL DEFAULT '' COMMENT '字段名称',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `dataType` tinyint(1) DEFAULT NULL COMMENT '数据类型',
  `priority` int(11) DEFAULT NULL COMMENT '排序',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`standardtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='商品规格类型表';

CREATE TABLE `takeout_mall_standard` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL DEFAULT '0' COMMENT '规格类型Id',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '规格名称',
  `color` varchar(10) DEFAULT NULL COMMENT '颜色',
  `priority` int(11) NOT NULL DEFAULT '10' COMMENT '排序',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`standard_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='商品规格表';


CREATE TABLE `takeout_mall_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '产品名称',
  `price` double(11,2) NOT NULL COMMENT '产品价格',
  `description` mediumtext NOT NULL COMMENT '产品介绍',
  `mainpic` varchar(100) NOT NULL DEFAULT '' COMMENT '产品主图',
  `content` mediumtext NOT NULL COMMENT '产品内容',
  `picture` varchar(500) DEFAULT NULL,
  `month_sale` int(11) NOT NULL COMMENT '销量',
  `tags` int(11) NOT NULL COMMENT '标签类型',
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '产品状态',
  `shop_id` int(11) NOT NULL COMMENT '门店ID',
  `catalog_id` int(11) NOT NULL COMMENT '分类ID',
  `has_standard` int(11) NOT NULL COMMENT '是否有规格',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `takeout_mall_products_standard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` double(11,2) NOT NULL COMMENT '产品价格',
  `month_sale` int(11) NOT NULL COMMENT '销量',
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '规格状态',
  `shop_id` int(11) NOT NULL COMMENT '门店ID',
  `product_id` int(11) NOT NULL COMMENT '商品ID',
  `standard_id` varchar(100) NOT NULL COMMENT '规格ID组合',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `takeout_mall_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `items` text,
  `price` double(10,2) DEFAULT NULL,
  `orderAddress` varchar(100) DEFAULT NULL,
  `orderName` varchar(100) DEFAULT NULL,
  `orderPhone` varchar(100) DEFAULT NULL,
  `orderArrivedTime` int(11) DEFAULT NULL,
  `orderRemark` varchar(100) DEFAULT NULL,
  `payId` varchar(100) DEFAULT NULL,
  `paymethod` int(1) DEFAULT NULL,
  `payTime` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '订单状态',
  `expireTime` int(11) DEFAULT NULL,
  `orderTime` int(11) DEFAULT NULL,
  `shop_id` int(10) DEFAULT NULL,
  `shop_name` varchar(100) DEFAULT NULL,
  `shop_phone` varchar(100) DEFAULT NULL,
  `received` int(1) DEFAULT NULL,
  `receivedTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `takeout_mall_orders_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `score1` double(10,2) NOT NULL COMMENT '商品质量',
  `score2` double(10,2) NOT NULL COMMENT '口味',
  `score3` double(10,2) NOT NULL COMMENT '包装',
  `score3` mediumtext NOT NULL COMMENT '评论内容',
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '评论状态',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `shop_id` int(10) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL,
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;




CREATE TABLE `takeout_mall_users_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(10) NOT NULL,
  `receiverName` varchar(100) NOT NULL DEFAULT '' COMMENT '联系人',
  `receiverPhone` varchar(100) NOT NULL DEFAULT '' COMMENT '手机号',
  `receiverAddress` varchar(100) NOT NULL COMMENT '收货地址',
  `receiverAddressDetail` varchar(100) NULL COMMENT '门牌号',
  `priority` int(11) NOT NULL COMMENT '优先级',
  `status` varchar(10) NOT NULL DEFAULT '' COMMENT '地址状态',
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;







EOT;

pdo_query($sql);
