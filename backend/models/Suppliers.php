<?php

namespace backend\models;

use Yii;
use common\enums\StatusEnum;
/**
 * This is the model class for table "{{%suppliers}}".
 *
 * @property int $id 主键
 * @property string $merchant_id 商户id
 * @property string $username 帐号
 * @property string $password_hash 密码
 * @property string $auth_key 授权令牌
 * @property string $password_reset_token 密码重置令牌
 * @property int $type 类别
 * @property string $nickname 昵称
 * @property string $realname 真实姓名
 * @property string $head_portrait 头像
 * @property int $current_level 当前级别
 * @property int $gender 性别[0:未知;1:男;2:女]
 * @property string $qq qq
 * @property string $email 邮箱
 * @property string $birthday 生日
 * @property string $visit_count 访问次数
 * @property string $home_phone 家庭号码
 * @property string $mobile 手机号码
 * @property int $role 权限
 * @property int $last_time 最后一次登录时间
 * @property string $last_ip 最后一次登录ip
 * @property int $province_id 省
 * @property int $city_id 城市
 * @property int $area_id 地区
 * @property string $pid 上级id
 * @property int $status 状态[-1:删除;0:禁用;1启用]
 * @property string $created_at 创建时间
 * @property string $updated_at 修改时间
 */
class Suppliers extends \common\models\base\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%suppliers}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'merchant_id', 'type', 'current_level', 'gender', 'visit_count', 'role', 'last_time', 'province_id', 'city_id', 'area_id', 'pid', 'status', 'created_at', 'updated_at'], 'integer'],
            [['birthday'], 'safe'],
            [['username', 'qq', 'home_phone', 'mobile'], 'string', 'max' => 20],
            [['password_hash', 'password_reset_token', 'head_portrait'], 'string', 'max' => 150],
            [['auth_key'], 'string', 'max' => 32],
            [['nickname', 'realname'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 60],
            [['last_ip'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'merchant_id' => '商户id',
            'username' => '帐号',
            'password_hash' => '密码',
            'auth_key' => '授权令牌',
            'password_reset_token' => '密码重置令牌',
            'type' => '类别',
            'nickname' => '昵称',
            'realname' => '真实姓名',
            'head_portrait' => '头像',
            'current_level' => '当前级别',
            'gender' => '性别',
            'qq' => 'qq',
            'email' => '邮箱',
            'birthday' => '生日',
            'visit_count' => '访问次数',
            'home_phone' => '家庭号码',
            'mobile' => '手机号码',
            'role' => '权限',
            'last_time' => '最后一次登录时间',
            'last_ip' => '最后一次登录ip',
            'province_id' => '省',
            'city_id' => '城市',
            'area_id' => '地区',
            'pid' => '上级id',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
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
