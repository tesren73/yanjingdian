<?php

namespace backend\models;

use common\models\member\Member;
use Yii;
use common\enums\StatusEnum;
use common\behaviors\MerchantBehavior;
/**
 * This is the model class for table "{{%optometry}}".
 *
 * @property int $id
 * @property string $updated_at 更新时间
 * @property string $name 会员姓名
 * @property string $number 客户编号
 * @property string $billNo 编号
 * @property string $optname 客户名称
 * @property string $opttype 验光类型
 * @property string $rightsph 右球光
 * @property string $rightcyl 右散光
 * @property string $rightax 右轴向
 * @property string $Rlengjing 右棱镜
 * @property string $Rjidi 右基底
 * @property string $Rluoshi 右裸视
 * @property string $Radd 右ADD
 * @property string $Rtonggao 右瞳高
 * @property string $Rjihu 右基弧
 * @property string $RPD 右PD
 * @property string $leftsph 左球光
 * @property string $leftcyl 左散光
 * @property string $leftax 左轴向
 * @property string $Llengjing 左棱镜
 * @property string $Ljidi 左基底
 * @property string $Lcorrected 左矫正
 * @property string $Lluoshi 左裸视
 * @property string $Ladd 左ADD
 * @property string $Ltonggao 左瞳高
 * @property string $Ljihu 左基弧
 * @property string $LPD 左PD
 * @property string $pd 瞳距
 * @property string $remark 备注
 * @property string $yanguangshi 验光师
 * @property string $Rcorrected 矫正视力
 * @property string $created_at 验光日期
 * @property string $sales_id 销售员
 * @property string $created_user 制单员
 * @property int $status 状态
 */
class Optometry extends \yii\db\ActiveRecord
{
    use MerchantBehavior;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%optometry}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['remark'], 'string'],
            [['updated_at', 'name', 'number', 'billNo', 'yanguangshi', 'created_at', 'sales_id'], 'string', 'max' => 20],
            [['optname', 'opttype', 'rightsph', 'rightcyl', 'rightax', 'leftsph', 'leftcyl', 'leftax', 'pd', 'created_user'], 'string', 'max' => 50],
            [['Rlengjing', 'Rjidi', 'Rluoshi', 'Radd', 'Rtonggao', 'Rjihu', 'RPD', 'Llengjing', 'Ljidi', 'Lcorrected', 'Lluoshi', 'Ladd', 'Ltonggao', 'Ljihu', 'LPD', 'Rcorrected'], 'string', 'max' => 6],
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
            'updated_at' => '更新时间',
            'name' => '会员姓名',
            'number' => '客户编号',
            'billNo' => '编号',
            'optname' => '客户名称',
            'opttype' => '验光类型',
            'rightsph' => '右球光',
            'rightcyl' => '右散光',
            'rightax' => '右轴向',
            'Rlengjing' => '右棱镜',
            'Rjidi' => '右基底',
            'Rluoshi' => '右裸视',
            'Radd' => '右ADD',
            'Rtonggao' => '右瞳高',
            'Rjihu' => '右基弧',
            'RPD' => '右PD',
            'leftsph' => '左球光',
            'leftcyl' => '左散光',
            'leftax' => '左轴向',
            'Llengjing' => '左棱镜',
            'Ljidi' => '左基底',
            'Lcorrected' => '左矫正',
            'Lluoshi' => '左裸视',
            'Ladd' => '左ADD',
            'Ltonggao' => '左瞳高',
            'Ljihu' => '左基弧',
            'LPD' => '左PD',
            'pd' => '瞳距',
            'remark' => '备注',
            'yanguangshi' => '特殊验光',
            'Rcorrected' => '矫正视力',
            'created_at' => '验光日期',
            'sales_id' => '销售员',
            'created_user' => '制单员',
            'status' => '状态',
            'merchant_id' => '商户id'
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
        return $this->hasOne(Member::className(), ['id' => 'number']);
    }
}
