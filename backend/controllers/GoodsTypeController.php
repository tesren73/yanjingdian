<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\traits\MerchantCurd;
use backend\models\GoodsType;

/**
* GoodsType
*
* Class GoodsTypeController
* @package backend\controllers
*/
class GoodsTypeController extends BaseController
{
    use MerchantCurd;
    /**
    * @var GoodsType
    */
    public $modelClass = GoodsType::class;


    /**
    * 首页
    *
    * @return string
    * @throws \yii\web\NotFoundHttpException
    */
    public function actionIndex()
    {
        $query = GoodsType::find()
            ->orderBy('sort_index asc,created_at asc')
            ->andWhere(['merchant_id' => $this->getMerchantId()]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    }
    /**
     * @return mixed|string|\yii\console\Response|\yii\web\Response
     * @throws \yii\base\ExitException
     */
    public function actionAjaxEdit()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $model = $this->findModel($id);
        $model->parent_id = $request->get('parent_id', null) ?? $model->parent_id; // 父id

        // ajax校验
        $this->activeFormValidate($model);
        if ($model->load(Yii::$app->request->post())) {
            return $model->save()
                ? $this->redirect(['index'])
                : $this->message($this->getError($model), $this->redirect(['index']), 'error');
        }

        return $this->renderAjax($this->action->id, [
            'model' => $model,
            'cateDropDownList' => GoodsType::getDropDownForEdit($id),
        ]);
    }
}
