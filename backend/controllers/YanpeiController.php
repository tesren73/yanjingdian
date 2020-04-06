<?php

namespace backend\controllers;

use Http\Message\Encoding\InflateStream;
use Yii;
use yii\base\Model;
use yii\db\Exception;
use yii\web\Response;
use backend\models\Goods;
use backend\models\Optometry;
use backend\models\Invoices;
use backend\models\InvoiceInfo;

/**
* Optometry
*
* Class OptometryController
* @package backend\controllers
*/
class YanpeiController extends BaseController
{

    public function actionCreate()
    {
        $model = new Optometry();
        $modelInv = new Invoices();
        $modelInf = new InvoiceInfo();
        $bill_number = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        if(!Invoices::find()->where([ 'bill_number' => $bill_number])->exists()){
            $modelInv->bill_number = 'XS'.$bill_number;
            $model->billNo = 'XS'.$bill_number;
        }
        if($model->load(Yii::$app->request->post()))
        {
            $model->save(false);
        }
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();  //开启事务
        try {
            if ($modelInv->load(Yii::$app->request->post()) && $modelInf->load(Yii::$app->request->post())) {
                $modelInv->bill_number = 'XS'.$bill_number;
                $modelInv->buid = $model->name;
                $modelInv->amount = $modelInv->rp_amount;
                $modelInv->total_qty = count($_POST['InvoiceInfo']['invoiceinfo']);
                $modelInv->save(false); // skip validation as model is already validated
                //$ad->user_id = $user->id; // no need for validation rule on user_id as you set it yourself
                //\Yii::$app->session->setFlash('success',$modelInf);
                for($i=0; $i<count($_POST['InvoiceInfo']['invoiceinfo']);$i++){
                    $invoiceinf = new InvoiceInfo();
                    $invoiceinf->iid = $modelInv->id;
                    $invoiceinf->buid = $modelInv->buid;
                    $invoiceinf->bill_no = $modelInv->bill_number;
                    $invoiceinf->invid = $_POST['InvoiceInfo']['invoiceinfo'][$i]['number'];
                    $invoiceinf->qty = $_POST['InvoiceInfo']['invoiceinfo'][$i]['qty'];
                    $invoiceinf->price = $_POST['InvoiceInfo']['invoiceinfo'][$i]['price'];
                    $invoiceinf->amount = $_POST['InvoiceInfo']['invoiceinfo'][$i]['price'];
                    $invoiceinf->save(false);
                    $modelGoods = Goods::findOne($invoiceinf->invid);
                    $modelGoods->quantity = $modelGoods->quantity - $invoiceinf->qty;
                    $modelGoods->save(false);
                }
                $this->redirect(['invoices/index']);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'modelInv' => $modelInv,
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
                'modelInv'=>$modelInv,
                'modelInf'=>$modelInf,
            ]);
        }
    }


    public function actionGetgoods()
    {
        $request = Yii::$app->request;
        $purchaseDetailID = $request->post('number');
        if ($purchaseDetailID)
        {
            $purchaseData = Goods::find()->where(['id' => $purchaseDetailID])->asArray()->all();
                $data = json_encode($purchaseData,true);
                return $data;
        }
    }

}