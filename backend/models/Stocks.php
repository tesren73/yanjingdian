<?php

namespace backend\models;

use Yii;
use backend\models\MerchantConfig;

/**
 * This is the model class for table "{{%stocks}}".
 *
 * @property int $id
 * @property string $name 商品名称
 * @property string $number 商品编号
 * @property double $quantity 出入库数量
 * @property string $degrees 度数
 * @property string $unitName 单位名称
 * @property int $category_id 商品分类ID
 * @property string $astigmia 散光
 * @property double $sale_price 销售价
 * @property double $amount 期初总价
 * @property string $remark 备注
 * @property int $status 状态
 * @property double $vip_price 会员价
 * @property double $low_qty 最低库存
 * @property string $length 长度
 * @property string $height 高度
 * @property double $high_qty 最高库存
 * @property string $bar_code 扫描枪
 * @property int $qty_type 出入库类型
 * @property int $merchant_id 门店
 * @property double $wholesale_price 批发价
 * @property string $width 宽度
 * @property int $sku_id 辅助属性分类
 * @property string $property 属性
 * @property int $safe_days 有效期
 * @property int $advance_day 到期日
 * @property string $is_warranty 警告
 * @property double $weight 重量
 * @property string $brand 品牌
 * @property string $spec 型号
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string $created_user 制单人
 */
class Stocks extends \common\models\base\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%stocks}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'sale_price', 'amount', 'vip_price', 'low_qty', 'high_qty', 'wholesale_price', 'weight'], 'number'],
            [['category_id', 'status', 'qty_type', 'merchant_id', 'sku_id', 'safe_days', 'advance_day'], 'integer'],
            [['name', 'number', 'degrees', 'astigmia', 'remark', 'property'], 'string', 'max' => 50],
            [['unitName'], 'string', 'max' => 10],
            [['length', 'height'], 'string', 'max' => 25],
            [['bar_code'], 'string', 'max' => 60],
            [['width'], 'string', 'max' => 15],
            [['is_warranty', 'brand', 'spec', 'created_at', 'updated_at', 'created_user'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '商品名称',
            'number' => '商品编号',
            'quantity' => '出入库数量',
            'degrees' => '度数',
            'unitName' => '单位名称',
            'category_id' => '商品分类ID',
            'astigmia' => '散光',
            'sale_price' => '销售价',
            'amount' => '期初总价',
            'remark' => '备注',
            'status' => '状态',
            'vip_price' => '会员价',
            'low_qty' => '最低库存',
            'length' => '长度',
            'height' => '高度',
            'high_qty' => '最高库存',
            'bar_code' => '扫描枪',
            'qty_type' => '出入库类型',
            'merchant_id' => '门店',
            'wholesale_price' => '批发价',
            'width' => '宽度',
            'sku_id' => '辅助属性分类',
            'property' => '属性',
            'safe_days' => '有效期',
            'advance_day' => '到期日',
            'is_warranty' => '警告',
            'weight' => '重量',
            'brand' => '品牌',
            'spec' => '型号',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'created_user' => '制单人',
        ];
    }

    public function getGoodsType()
    {
        return $this->hasOne(MerchantConfig::className(), ['id' => 'category_id'])
            ->where('set_type=:set_type',[':set_type'=>'trade']);
    }
}
