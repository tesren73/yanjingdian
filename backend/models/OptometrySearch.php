<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Optometry as OptometryModel;
use backend\models\Optometry;

/**
 * Menu represents the model behind the search form about [[\rbac\models\Menu]].
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class OptometrySearch extends OptometryModel
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['number', 'remark', 'created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Searching menu
     * @param  array $params
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params)
    {

        $query = Optometry::find()->orderBy('id ASC, id ASC');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $sort = $dataProvider->getSort();

        $sort->defaultOrder = ['name' => SORT_ASC];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        $query->andFilterWhere(['like', 'lower(name)', strtolower($this->name)])
        ->andFilterWhere(['like', 'remark', $this->remark])
        ->andFilterWhere(['like', 'created_at', $this->created_at]);

        return $dataProvider;
    }
}
