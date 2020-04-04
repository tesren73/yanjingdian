<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\enums\StatusEnum;
use common\behaviors\MerchantBehavior;
/**
 * This is the model class for table "{{%invoice_info}}".
 *
 * @property int $id
 * @property int $iid 关联ID
 * @property int $buid 会员ID
 * @property string $bill_no 单据编号
 * @property int $trans_type 150501采购 150502退货
 * @property double $amount 购货金额
 * @property string $created_at 单据日期
 * @property string $description 详情
 * @property int $invid 商品ID
 * @property double $price 单价
 * @property double $deduction 折扣额
 * @property double $discount_rate 折扣率
 * @property double $qty 数量
 * @property int $merchant_id 商户id
 * @property double $tax 税率
 * @property double $tax_amount 税款
 * @property int $entry_id 区分调拨单  进和出
 * @property int $created_user 创建时间
 * @property int $status 1删除 0正常
 * @property string $updated_at 更新时间
 * @property string $remark 备注
 */
class InvoiceInfo extends \yii\db\ActiveRecord
{
    use MerchantBehavior;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%invoice_info}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'iid', 'buid', 'trans_type', 'invid', 'merchant_id', 'entry_id', 'created_user', 'status'], 'integer'],
            [['amount', 'price', 'deduction', 'discount_rate', 'qty', 'tax', 'tax_amount'], 'number'],
            [['created_at'], 'safe'],
            [['remark'], 'string'],
            [['bill_no'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 50],
            [['updated_at'], 'string', 'max' => 20],
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
            'iid' => '关联ID',
            'buid' => '会员ID',
            'bill_no' => '单据编号',
            'trans_type' => '150501采购 150502退货',
            'amount' => '购货金额',
            'created_at' => '单据日期',
            'description' => '详情',
            'invid' => '商品ID',
            'price' => '单价',
            'deduction' => '折扣额',
            'discount_rate' => '折扣率',
            'qty' => '数量',
            'merchant_id' => '商户id',
            'tax' => '税率',
            'tax_amount' => '税款',
            'entry_id' => '区分调拨单  进和出',
            'created_user' => '创建时间',
            'status' => '1删除 0正常',
            'updated_at' => '更新时间',
            'remark' => '备注',
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
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
