<?php

namespace backend\controllers;

use Yii;
use backend\models\InvoiceInfo;
use common\traits\Curd;
use common\models\base\SearchModel;

/**
* InvoiceInfo
*
* Class InvoiceInfoController
* @package backend\controllers
*/
class InvoiceInfoController extends BaseController
{
    use Curd;

    /**
    * @var InvoiceInfo
    */
    public $modelClass = InvoiceInfo::class;


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
            'partialMatchAttributes' => [], // 模糊查询
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
}
