<?php

namespace backend\models;

use Yii;
use common\enums\StatusEnum;
use common\behaviors\MerchantBehavior;
use common\models\member\Member;
/**
 * This is the model class for table "{{%invoices}}".
 *
 * @property int $id
 * @property int $buid 会员ID
 * @property string $bill_number 单据编号
 * @property int $merchant_id 商户id
 * @property string $created_user 制单人
 * @property int $trans_type 150501购货 150502退货 150601销售 150602退销 150706其他入库
 * @property double $total_amount 购货总金额
 * @property double $amount 折扣后金额
 * @property double $rp_amount 本次付款
 * @property string $description 详情
 * @property double $arrears 本次欠款
 * @property double $dis_rate 折扣率
 * @property double $dis_amount 折扣金额
 * @property double $total_qty 总数量
 * @property double $total_arrears 欠款总额
 * @property int $bill_status 订单状态 
 * @property string $check_name 采购单审核人
 * @property double $total_tax 税率
 * @property double $total_tax_amount 税款
 * @property string $created_at 创建时间
 * @property int $checked 采购单状态
 * @property int $accid 结算账户ID
 * @property string $updated_at 更新时间
 * @property int $sales_id 销售人员ID
 * @property double $customer_free 客户承担费用
 * @property double $hx_amount 本次核销金额
 * @property double $payment 本次预收款
 * @property string $post_data 提交订单明细 
 * @property string $in_location 调入仓库ID多个,分割
 * @property string $out_location 调出仓库ID多个,分割
 * @property int $status 1删除  0正常
 */
class Invoices extends \yii\db\ActiveRecord
{
    use MerchantBehavior;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%invoices}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'buid', 'merchant_id', 'trans_type', 'bill_status', 'checked', 'accid', 'sales_id', 'status'], 'integer'],
            [['total_amount', 'amount', 'rp_amount', 'arrears', 'dis_rate', 'dis_amount', 'total_qty', 'total_arrears', 'total_tax', 'total_tax_amount', 'customer_free', 'hx_amount', 'payment'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['post_data'], 'string'],
            [['bill_number'], 'string', 'max' => 25],
            [['created_user', 'check_name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
            [['in_location', 'out_location'], 'string', 'max' => 255],
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
            'buid' => '会员ID',
            'bill_number' => '单据编号',
            'merchant_id' => '商户id',
            'created_user' => '制单人',
            'trans_type' => '150501购货 150502退货 150601销售 150602退销 150706其他入库',
            'total_amount' => '购货总金额',
            'amount' => '折扣后金额',
            'rp_amount' => '本次付款',
            'description' => '详情',
            'arrears' => '本次欠款',
            'dis_rate' => '折扣率',
            'dis_amount' => '折扣金额',
            'total_qty' => '单数',
            'total_arrears' => '欠款总额',
            'bill_status' => '订单状态 ',
            'check_name' => '采购单审核人',
            'total_tax' => '税率',
            'total_tax_amount' => '税款',
            'created_at' => '创建时间',
            'checked' => '采购单状态',
            'accid' => '结算账户ID',
            'updated_at' => '更新时间',
            'sales_id' => '销售人员ID',
            'customer_free' => '客户承担费用',
            'hx_amount' => '本次核销金额',
            'payment' => '本次预收款',
            'post_data' => '提交订单明细 ',
            'in_location' => '调入仓库ID多个,分割',
            'out_location' => '调出仓库ID多个,分割',
            'status' => '0删除  1正常',
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
    public function getAccount()
    {
        return $this->hasOne(Member::className(), ['id' => 'buid']);
    }
    public function getOrderType()
    {
        return $this->hasOne(MerchantConfig::className(), ['id' => 'bill_status'])->where(['set_type'=>'OrderType']);
    }
}
