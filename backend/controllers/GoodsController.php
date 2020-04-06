<?php

namespace backend\controllers;

use Yii;
use backend\models\Goods;
use common\traits\Curd;
use common\models\base\SearchModel;
use backend\controllers\BaseController;

/**
* Goods
*
* Class GoodsController
* @package backend\controllers
*/
class GoodsController extends BaseController
{
    use Curd;

    /**
    * @var Goods
    */
    public $modelClass = Goods::class;


    /**
    * 首页
    *
    * @return string
    * @throws \yii\web\NotFoundHttpException
    */
    public function actionIndex()
    {
        $searchModel = new SearchModel([
            'model' => $this->modelClass,
            'scenario' => 'default',
            'partialMatchAttributes' => ['name', 'quantity', 'degrees','number','category_id','advanceDay', 'created_at'], // 模糊查询
            'defaultOrder' => [
                'id' => SORT_DESC
            ],
            'pageSize' => $this->pageSize
        ]);

        $dataProvider = $searchModel
            ->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    public function actionGetgoods()
    {
        $request = Yii::$app->request;
        $purchaseDetailID = $request->post('number');
        if ($purchaseDetailID)
        {
            //var_dump($request);
            $purchaseData = Goods::find()->where(['id' => $purchaseDetailID])->asArray()->all();
            $data = json_encode($purchaseData,true);
            return $data;
        }
    }
}
