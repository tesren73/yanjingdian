<?php

namespace backend\models;

use common\behaviors\MerchantBehavior;
use common\enums\StatusEnum;
use common\helpers\ArrayHelper;
use common\traits\Tree;

/**
 * This is the model class for table "{{%goods_type}}".
 *
 * @property int $id ID
 * @property string $title 栏目名称
 * @property int $parent_id 上级栏目ID
 * @property string $path 栏目路径
 * @property int $level 层次
 * @property string $created_at 创建时间
 * @property int $status 状态
 * @property int $tree 树
 * @property string $remark 备注
 * @property string $updated_at 更新时间
 * @property string $created_user 创建人
 * @property int $sort_index 排序
 */
class GoodsType extends \common\models\base\BaseModel
{
    use Tree, MerchantBehavior;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%goods_type}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['merchant_id', 'id', 'parent_id', 'level', 'status', 'sort_index'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['created_at', 'created_user'], 'string', 'max' => 20],
            [['remark'], 'string', 'max' => 255],
            [['updated_at'], 'string', 'max' => 25],
            [['id'], 'unique'],
            [['tree'], 'string', 'max' => 500],
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
            'parent_id' => '上级分类',
            'merchant_id' => '分类路径',
            'level' => '层次',
            'created_at' => '创建时间',
            'status' => '状态',
            'remark' => '备注',
            'updated_at' => '更新时间',
            'created_user' => '创建人',
            'sort_index' => '排序',
            'tree' => '树',
        ];
    }
    /**
     * 获取下拉
     *
     * @param string $id
     * @return array
     */
    public static function getDropDownForEdit($id = '')
    {
        $list = self::find()
            ->where(['>=', 'status', StatusEnum::DISABLED])
            ->andFilterWhere(['<>', 'id', $id])
            ->select(['id', 'title', 'parent_id', 'level'])
            ->orderBy('sort_index asc')
            ->asArray()
            ->all();

        $models = ArrayHelper::itemsMerge($list);

        $data = ArrayHelper::map(ArrayHelper::itemsMergeDropDown($models), 'id', 'title');
//var_dump(itemsMergeDropDown($models));
        return ArrayHelper::merge([0 => '顶级分类'], $data);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }
}
