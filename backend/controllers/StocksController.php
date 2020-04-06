<?php

namespace backend\controllers;

use backend\models\Goods;
use Yii;
use backend\models\Invoices;
use backend\models\InvoiceInfo;
use common\traits\Curd;
use common\models\base\SearchModel;
use backend\controllers\BaseController;

/**
* Stocks
*
* Class StocksController
* @package backend\controllers
*/
class StocksController extends BaseController
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
            $model->bill_number = 'CG'.$bill_number;
        }
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();  //开启事务
        try {
            if ($model->load(Yii::$app->request->post()) && $modelInf->load(Yii::$app->request->post())) {
                $model->amount = $model->total_amount;
                $model->total_qty = count($_POST['InvoiceInfo']['invoiceinfo']);
                $model->save(false); // skip validation as model is already validated
                //$ad->user_id = $user->id; // no need for validation rule on user_id as you set it yourself
                //\Yii::$app->session->setFlash('success',$modelInf);
                for($i=0; $i<count($_POST['InvoiceInfo']['invoiceinfo']);$i++){
                    $invoiceinf = new InvoiceInfo();
                    $invoiceinf->iid = $model->id;
                    $invoiceinf->buid = $model->buid;
                    $invoiceinf->bill_no = $model->bill_number;
                    $invoiceinf->invid = $_POST['InvoiceInfo']['invoiceinfo'][$i]['number'];
                    $invoiceinf->qty = $_POST['InvoiceInfo']['invoiceinfo'][$i]['qty'];
                    $invoiceinf->price = $_POST['InvoiceInfo']['invoiceinfo'][$i]['price'];
                    $invoiceinf->amount = $_POST['InvoiceInfo']['invoiceinfo'][$i]['price'];
                    $invoiceinf->save(false);
                    Goods::updateAllCounters(['quantity' => $invoiceinf->qty], ['id' => $invoiceinf->invid]);
                }

                $this->redirect(['invoices/index']);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'modelInf' => $modelInf,
                ]);
            }
            $transaction->commit();

            } catch (Exception $e) {
            // 记录回滚（事务回滚）
        $transaction->rollBack();
            //Yii::$app->session->setFlash('error',$e->getMessage());
        return $this->render('create', [
            'model' => $model,
            'modelInf'=>$modelInf,
            ]);
        }
    }
}
