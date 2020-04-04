<?php

namespace backend\models;

use Yii;
use backend\models\MerchantConfig;
use common\helpers\StringHelper;
use common\enums\StatusEnum;
/**
 * This is the model class for table "{{%goods}}".
 *
 * @property int $id
 * @property string $name 商品名称
 * @property string $number 商品编号
 * @property double $quantity 库存数量
 * @property string $degrees 度数
 * @property string $unitName 单位名称
 * @property int $category_id 商品分类ID
 * @property string $categoryName 分类名称
 * @property string $astigmia 散光
 * @property double $salePrice 销售价
 * @property double $amount 期初总价
 * @property string $remark 备注
 * @property int $status 状态
 * @property double $vipPrice 会员价
 * @property double $lowQty 最低库存
 * @property string $length 长度
 * @property string $height 高度
 * @property double $highQty 最高库存
 * @property string $barCode 扫描枪
 * @property double $discountRate 折扣率
 * @property int $merchant_id 门店
 * @property string $locationName 门店名称
 * @property double $wholesalePrice 批发价
 * @property string $width 宽度
 * @property string $sku_id 辅助属性分类
 * @property string $files 图片路径
 * @property string $assistIds 促销ID
 * @property string $assistName 促销名称
 * @property string $assistUnit 促销类型
 * @property string $property 属性
 * @property double $safeDays 有效期
 * @property double $advanceDay 到期日
 * @property double $isWarranty 警告
 * @property double $weight 重量
 * @property string $brand 品牌
 * @property string $spec 型号
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string $created_user 制单人
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'status', 'merchant_id'], 'integer'],
            [['quantity', 'salePrice', 'amount', 'vipPrice', 'lowQty', 'highQty', 'discountRate', 'wholesalePrice', 'safeDays', 'isWarranty', 'weight'], 'number'],
            [['sku_id', 'files'], 'string'],
            [['name', 'number', 'degrees', 'categoryName', 'astigmia', 'remark', 'locationName'], 'string', 'max' => 50],
            [['unitName'], 'string', 'max' => 10],
            [['length', 'height'], 'string', 'max' => 25],
            [['barCode'], 'string', 'max' => 60],
            [['width'], 'string', 'max' => 15],
            [['assistIds', 'assistUnit', 'property'], 'string', 'max' => 255],
            [['assistName'], 'string', 'max' => 100],
            [['brand', 'spec', 'created_at', 'updated_at', 'created_user'], 'string', 'max' => 20],
            [['id'], 'unique'],
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
            'quantity' => '库存数量',
            'degrees' => '度数',
            'unitName' => '单位名称',
            'category_id' => '商品分类ID',
            'categoryName' => '分类名称',
            'astigmia' => '散光',
            'salePrice' => '销售价',
            'amount' => '期初总价',
            'remark' => '备注',
            'status' => '状态',
            'vipPrice' => '会员价',
            'lowQty' => '最低库存',
            'length' => '长度',
            'height' => '高度',
            'highQty' => '最高库存',
            'barCode' => '扫描枪',
            'discountRate' => '折扣率',
            'merchant_id' => '门店',
            'locationName' => '门店名称',
            'wholesalePrice' => '批发价',
            'width' => '宽度',
            'sku_id' => '辅助属性分类',
            'files' => '图片路径',
            'assistIds' => '促销ID',
            'assistName' => '促销名称',
            'assistUnit' => '促销类型',
            'property' => '属性',
            'safeDays' => '有效期',
            'advanceDay' => '到期日',
            'isWarranty' => '警告',
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

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->advanceDay = StringHelper::dateToInt(($this->advanceDay));
            $this->created_at = time();
            $this->updated_at = $this->created_at;
            $this->merchant_id = Yii::$app->services->merchant->getId();
            $this->created_user = Yii::$app->user->id;
            $this->status = StatusEnum::ENABLED;
        } else {
            $this->updated_at = time();
        }
        return parent::beforeSave($insert);
    }
}
