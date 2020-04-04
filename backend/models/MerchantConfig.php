<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%merchant_config}}".
 *
 * @property int $id ID
 * @property string $title 栏目名称
 * @property int $parent_id 上级栏目ID
 * @property int $merchant_id 商户id
 * @property int $level 层次
 * @property string $created_at 创建时间
 * @property int $status 状态
 * @property string $remark 备注
 * @property int $updated_at 更新时间
 * @property string $created_user 创建人
 * @property int $sort_index 排序
 */
class MerchantConfig extends \common\models\base\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%merchant_config}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'merchant_id', 'level', 'status', 'updated_at', 'sort_index'], 'integer'],
            [['merchant_id', 'updated_at'], 'required'],
            [['title'], 'string', 'max' => 50],
            [['created_at', 'created_user'], 'string', 'max' => 20],
            [['set_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '分类名称',
            'parent_id' => '上级栏目ID',
            'merchant_id' => '商户id',
            'level' => '层次',
            'created_at' => '创建时间',
            'status' => '状态',
            'set_type' => '系统分类',
            'updated_at' => '更新时间',
            'created_user' => '创建人',
            'sort_index' => '排序',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeName($set_type)
    {
        $status_arr = [
            'trade' => '商品分类',
            'customertype' =>'客户分类',
            'supplytype' =>'供应商分类',
            'paccttype' =>'账户分类',
            'raccttype' =>'财务设置',
            'PayMethod' =>'支付设置',
            'OrderType' =>'订单设置',
        ];
        if(array_key_exists($set_type, $status_arr)){
            return $status_arr[$set_type];
        }else{
            return  yii::t('common', '未设置');
        }
    }
}
