<?php

namespace backend\controllers;

use Yii;
use backend\models\Invoices;
use backend\models\InvoiceInfo;
use common\traits\Curd;
use common\models\base\SearchModel;

/**
* Invoices
*
* Class InvoicesController
* @package backend\controllers
*/
class InvoicesController extends BaseController
{
    use Curd;

    /**
    * @var Invoices
    */
    public $modelClass = Invoices::class;


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
    
    public function actionCreate()
    {
        $model = new Invoices();
        $modelInf = new InvoiceInfo();
        $bill_number = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        if(!Invoices::find()->where([ 'bill_number' => $bill_number])->exists()){
            $model->bill_number = $bill_number;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save(false) && $modelInf->load(yii::$app->request->post()) && $modelInf->save(false)) {
            
            return $this->redirect(['invoices/view', 'id' => $modelInf->id]);
        }
        
        return $this->render('create', [
            'model' => $model,
            'modelInf' => $modelInf,
        ]);
    }
}
