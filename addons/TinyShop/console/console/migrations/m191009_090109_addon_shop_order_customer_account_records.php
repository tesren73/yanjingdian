<?php

use yii\db\Migration;

class m191009_090109_addon_shop_order_customer_account_records extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%addon_shop_order_customer_account_records}}', [
            'id' => "int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id'",
            'order_goods_id' => "int(11) NOT NULL COMMENT '订单项id'",
            'refund_trade_no' => "varchar(55) NOT NULL COMMENT '退款交易号'",
            'refund_money' => "decimal(10,2) NOT NULL COMMENT '退款金额'",
            'refund_way' => "int(11) NOT NULL COMMENT '退款方式（1：微信，2：支付宝，10：线下）'",
            'buyer_id' => "int(11) NOT NULL COMMENT '买家id'",
            'refund_time' => "int(11) NOT NULL COMMENT '退款时间'",
            'remark' => "varchar(255) NOT NULL DEFAULT '' COMMENT '备注'",
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='订单售后账户记录'");
        
        /* 索引设置 */
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%addon_shop_order_customer_account_records}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

