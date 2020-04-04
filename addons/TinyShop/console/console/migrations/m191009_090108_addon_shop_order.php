<?php

use yii\db\Migration;

class m191009_090108_addon_shop_order extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%addon_shop_order}}', [
            'id' => "int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单id'",
            'merchant_id' => "int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商户id'",
            'merchant_name' => "varchar(100) NULL DEFAULT '' COMMENT '商户店铺名称'",
            'order_sn' => "varchar(100) NOT NULL DEFAULT '' COMMENT '订单编号'",
            'out_trade_no' => "varchar(100) NULL DEFAULT '' COMMENT '外部交易号'",
            'order_type' => "tinyint(4) NULL DEFAULT '1' COMMENT '订单类型'",
            'payment_type' => "tinyint(4) NULL DEFAULT '0' COMMENT '支付类型。取值范围：































WEIXIN (微信自有支付)































WEIXIN_DAIXIAO (微信代销支付)































ALIPAY (支付宝支付)'",
            'shipping_type' => "tinyint(4) NULL DEFAULT '1' COMMENT '订单配送方式'",
            'order_from' => "varchar(200) NULL DEFAULT '' COMMENT '订单来源'",
            'buyer_id' => "int(11) NULL DEFAULT '0' COMMENT '买家id'",
            'user_name' => "varchar(50) NULL DEFAULT '' COMMENT '买家会员名称'",
            'buyer_ip' => "varchar(20) NULL DEFAULT '' COMMENT '买家ip'",
            'buyer_message' => "varchar(200) NULL DEFAULT '' COMMENT '买家附言'",
            'buyer_invoice' => "varchar(200) NULL DEFAULT '' COMMENT '买家发票信息'",
            'receiver_mobile' => "varchar(11) NULL DEFAULT '' COMMENT '收货人的手机号码'",
            'receiver_province' => "int(11) NULL DEFAULT '0' COMMENT '收货人所在省'",
            'receiver_city' => "int(11) NULL DEFAULT '0' COMMENT '收货人所在城市'",
            'receiver_area' => "int(11) NULL DEFAULT '0' COMMENT '收货人所在街道'",
            'receiver_address' => "varchar(200) NULL DEFAULT '' COMMENT '收货人详细地址'",
            'receiver_region_name' => "varchar(200) NULL DEFAULT '' COMMENT '收货人详细地址'",
            'receiver_zip' => "varchar(6) NULL DEFAULT '' COMMENT '收货人邮编'",
            'receiver_name' => "varchar(50) NULL DEFAULT '' COMMENT '收货人姓名'",
            'seller_star' => "tinyint(4) NULL DEFAULT '0' COMMENT '卖家对订单的标注星标'",
            'seller_memo' => "varchar(255) NULL DEFAULT '' COMMENT '卖家对订单的备注'",
            'consign_time_adjust' => "int(11) NULL DEFAULT '0' COMMENT '卖家延迟发货时间'",
            'product_money' => "decimal(19,2) NULL DEFAULT '0.00' COMMENT '商品总价'",
            'order_money' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '订单总价'",
            'point' => "int(11) NULL DEFAULT '0' COMMENT '订单消耗积分'",
            'point_money' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '订单消耗积分抵多少钱'",
            'coupon_money' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '订单代金券支付金额'",
            'coupon_id' => "int(11) NULL DEFAULT '0' COMMENT '订单代金券id'",
            'user_money' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '订单余额支付金额'",
            'user_platform_money' => "decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '用户平台余额支付'",
            'promotion_money' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '订单优惠活动金额'",
            'shipping_money' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '订单运费'",
            'pay_money' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '订单实付金额'",
            'refund_money' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '订单退款金额'",
            'coin_money' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '购物币金额'",
            'give_point' => "int(11) NULL DEFAULT '0' COMMENT '订单赠送积分'",
            'give_coin' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '订单成功之后返购物币'",
            'order_status' => "tinyint(4) NULL DEFAULT '0' COMMENT '订单状态'",
            'pay_status' => "tinyint(4) NULL DEFAULT '0' COMMENT '订单付款状态'",
            'shipping_status' => "tinyint(4) NULL DEFAULT '0' COMMENT '订单配送状态'",
            'review_status' => "tinyint(4) NULL DEFAULT '0' COMMENT '订单评价状态'",
            'feedback_status' => "tinyint(4) NULL DEFAULT '0' COMMENT '订单维权状态'",
            'is_evaluate' => "smallint(6) NULL DEFAULT '0' COMMENT '是否评价 0为未评价 1为已评价 2为已追评'",
            'tax_money' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '税费'",
            'company_id' => "int(11) NULL DEFAULT '0' COMMENT '配送物流公司ID'",
            'give_point_type' => "int(11) NULL DEFAULT '1' COMMENT '积分返还类型 1 订单完成  2 订单收货 3  支付订单'",
            'pay_time' => "int(11) NULL DEFAULT '0' COMMENT '订单付款时间'",
            'shipping_time' => "int(11) NULL DEFAULT '0' COMMENT '买家要求配送时间'",
            'sign_time' => "int(11) NULL DEFAULT '0' COMMENT '买家签收时间'",
            'consign_time' => "int(11) NULL DEFAULT '0' COMMENT '卖家发货时间'",
            'finish_time' => "int(11) NULL DEFAULT '0' COMMENT '订单完成时间'",
            'operator_type' => "int(1) NULL DEFAULT '0' COMMENT '操作人类型  1店铺  2用户'",
            'operator_id' => "int(11) NULL DEFAULT '0' COMMENT '操作人id'",
            'refund_balance_money' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '订单退款余额'",
            'fixed_telephone' => "varchar(50) NULL DEFAULT '' COMMENT '固定电话'",
            'distribution_time_out' => "varchar(50) NULL DEFAULT '' COMMENT '配送时间段'",
            'product_count' => "int(10) NULL DEFAULT '0' COMMENT '订单数量'",
            'status' => "tinyint(4) NULL DEFAULT '1' COMMENT '状态[-1:删除;0:禁用;1启用]'",
            'created_at' => "int(10) NULL DEFAULT '0'",
            'updated_at' => "int(10) NULL DEFAULT '0'",
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AVG_ROW_LENGTH=440 ROW_FORMAT=DYNAMIC COMMENT='订单表'");
        
        /* 索引设置 */
        $this->createIndex('UK_ns_order_buyer_id','{{%addon_shop_order}}','buyer_id',0);
        $this->createIndex('UK_ns_order_order_no','{{%addon_shop_order}}','order_sn',0);
        $this->createIndex('UK_ns_order_pay_status','{{%addon_shop_order}}','pay_status',0);
        $this->createIndex('UK_ns_order_status','{{%addon_shop_order}}','order_status',0);
        
        
        /* 表数据 */
        $this->insert('{{%addon_shop_order}}',['id'=>'203','merchant_id'=>'1','merchant_name'=>'微商城(中国)有限公司','order_sn'=>'201910091558155550541015','out_trade_no'=>'15706078955550555052','order_type'=>'1','payment_type'=>'10','shipping_type'=>'1','order_from'=>'','buyer_id'=>'1','user_name'=>'','buyer_ip'=>'127.0.0.1','buyer_message'=>'','buyer_invoice'=>'','receiver_mobile'=>'18888888888','receiver_province'=>'110000','receiver_city'=>'110100','receiver_area'=>'110105','receiver_address'=>'123','receiver_region_name'=>'北京市 市辖区 朝阳区 ','receiver_zip'=>'0','receiver_name'=>'大牛','seller_star'=>'0','seller_memo'=>'','consign_time_adjust'=>'0','product_money'=>'234.00','order_money'=>'234.00','point'=>'0','point_money'=>'0.00','coupon_money'=>'0.00','coupon_id'=>'0','user_money'=>'0.00','user_platform_money'=>'0.00','promotion_money'=>'0.00','shipping_money'=>'0.00','pay_money'=>'234.00','refund_money'=>'0.00','coin_money'=>'0.00','give_point'=>'48','give_coin'=>'0.00','order_status'=>'1','pay_status'=>'1','shipping_status'=>'0','review_status'=>'0','feedback_status'=>'0','is_evaluate'=>'0','tax_money'=>'0.00','company_id'=>'1','give_point_type'=>'3','pay_time'=>'1570607911','shipping_time'=>'0','sign_time'=>'0','consign_time'=>'0','finish_time'=>'0','operator_type'=>'0','operator_id'=>'0','refund_balance_money'=>'0.00','fixed_telephone'=>'','distribution_time_out'=>'','product_count'=>'9','status'=>'1','created_at'=>'1570607895','updated_at'=>'1570607911']);
        $this->insert('{{%addon_shop_order}}',['id'=>'204','merchant_id'=>'1','merchant_name'=>'微商城(中国)有限公司','order_sn'=>'201910091622105054102575','out_trade_no'=>'15706093305054102100','order_type'=>'1','payment_type'=>'10','shipping_type'=>'1','order_from'=>'','buyer_id'=>'1','user_name'=>'','buyer_ip'=>'127.0.0.1','buyer_message'=>'','buyer_invoice'=>'','receiver_mobile'=>'18888888888','receiver_province'=>'110000','receiver_city'=>'110100','receiver_area'=>'110105','receiver_address'=>'123','receiver_region_name'=>'北京市 市辖区 朝阳区 ','receiver_zip'=>'0','receiver_name'=>'大牛','seller_star'=>'0','seller_memo'=>'','consign_time_adjust'=>'0','product_money'=>'244.00','order_money'=>'244.00','point'=>'0','point_money'=>'0.00','coupon_money'=>'0.00','coupon_id'=>'0','user_money'=>'0.00','user_platform_money'=>'0.00','promotion_money'=>'0.00','shipping_money'=>'0.00','pay_money'=>'244.00','refund_money'=>'0.00','coin_money'=>'0.00','give_point'=>'48','give_coin'=>'0.00','order_status'=>'1','pay_status'=>'1','shipping_status'=>'0','review_status'=>'0','feedback_status'=>'0','is_evaluate'=>'0','tax_money'=>'0.00','company_id'=>'1','give_point_type'=>'3','pay_time'=>'1570609673','shipping_time'=>'0','sign_time'=>'0','consign_time'=>'0','finish_time'=>'0','operator_type'=>'0','operator_id'=>'0','refund_balance_money'=>'0.00','fixed_telephone'=>'','distribution_time_out'=>'','product_count'=>'9','status'=>'1','created_at'=>'1570609330','updated_at'=>'1570609673']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%addon_shop_order}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

