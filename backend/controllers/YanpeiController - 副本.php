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
            $modelInv->bill_number = $bill_number;
            $model->billNo = $bill_number;
        }
        if($model->load(Yii::$app->request->post()))
        {
         //   $model->save(false);
        }
            $db = Yii::$app->db;
            $transaction = $db->beginTransaction();  //开启事务
            try {

                    if ($modelInv->load(Yii::$app->request->post()) && $modelInf->load(Yii::$app->request->post()) && Model::validateMultiple([$modelInv, $modelInf->invoiceinfo])) {
                        $modelInv->buid = $model->name;
                        $modelInv->bill_number = $bill_number;
                        $modelInv->save(false); // skip validation as model is already validated
                        //$ad->user_id = $user->id; // no need for validation rule on user_id as you set it yourself
                        foreach ($modelInf->invoiceinfo as $index => $row) {
                            $modelInf->save(false);
                        }
                        //return $this->redirect(['view', 'id' => $user->id]);
                        return $this->redirect(['inoices/edit', 'id' => $modelInf->iid]);
                    } else {
                        return $this->render('create', [
                            'model' => $model,
                            'modelInv' => $modelInv,
                            'modelInf' => $modelInf,
                        ]);
                    }
                    /*if($modelInf->load(Yii::$app->request->post()))
                    {
                        $row['iid'] = $modelInv->id;
                        //$modelInf->save(false);
                        //foreach ($modelInf->invoiceinfo as $index => $row) {
                            //if ($row->validate()) {
                                //$row['priority'] = ;
                                //$row->iid = $modelInv->id;
                                //$row->buid = $model->name;
                                //$row->bill_no = $bill_number;
                                $row->save(false);
                            //}
                        //}
                        return $this->redirect(['inoices/edit', 'id' => $modelInf->iid]);
                   }*/
                /*}else{
                    $error=array_values($modelInf->getFirstErrors())[0];
                    throw new Exception($error);//抛出异常*/
                // 提交记录(执行事务)
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
            //var_dump($request);
            
            $purchaseData = Goods::find()->where(['id' => $purchaseDetailID])->asArray()->all();
            $data = json_encode($purchaseData,true);
            //echo $data;
            return $data;
        }
    }

}