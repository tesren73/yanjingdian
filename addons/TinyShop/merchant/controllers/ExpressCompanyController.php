<?php

namespace addons\TinyShop\merchant\controllers;

use common\enums\AppEnum;
use common\helpers\AddonHelper;
use Yii;
use common\models\base\SearchModel;
use common\enums\StatusEnum;
use common\traits\MerchantCurd;
use common\helpers\ArrayHelper;
use addons\TinyShop\common\models\express\Company;
use addons\TinyShop\merchant\forms\CompanyAddressForm;

/**
 * 快递管理控制器
 *
 * Class ExpressCompanyController
 * @package addons\TinyShop\merchant\controllers
 * @author jianyan74 <751393839@qq.com>
 */
class ExpressCompanyController extends BaseController
{
    use MerchantCurd;

    /**
     * @var Company
     */
    public $modelClass = Company::class;

    /**
     * 首页
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionIndex()
    {
        $searchModel = new SearchModel([
            'model' => Company::class,
            'scenario' => 'default',
            'partialMatchAttributes' => ['title', 'express_no', 'mobile'], // 模糊查询
            'defaultOrder' => [
                'sort' => SORT_ASC,
                'id' => SORT_DESC,
            ],
            'pageSize' => $this->pageSize,
        ]);

        $dataProvider = $searchModel
            ->search(Yii::$app->request->queryParams);
        $dataProvider->query
            ->andWhere(['>=', 'status', StatusEnum::DISABLED])
            ->andFilterWhere(['merchant_id' => $this->getMerchantId()]);

        return $this->render($this->action->id, [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * @return mixed|string
     */
    public function actionAddress()
    {
        $request = Yii::$app->request;
        $model = new CompanyAddressForm();
        $model->attributes = AddonHelper::getBackendConfig(true);
        if ($model->load($request->post()) && $model->validate()) {
            AddonHelper::setConfig(ArrayHelper::toArray($model), '', AppEnum::BACKEND);

            return $this->message('修改成功', $this->redirect(['address']));
        }

        return $this->render('address', [
            'model' => $model,
        ]);
    }
}