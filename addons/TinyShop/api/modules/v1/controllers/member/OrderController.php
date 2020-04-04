<?php

namespace addons\TinyShop\api\modules\v1\controllers\member;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use common\enums\StatusEnum;
use common\helpers\AddonHelper;
use common\enums\PayTypeEnum;
use common\helpers\ResultHelper;
use api\controllers\UserAuthController;
use addons\TinyShop\common\models\order\Order;
use addons\TinyShop\common\models\SettingForm;
use addons\TinyShop\common\enums\OrderStatusEnum;
use addons\TinyShop\common\enums\ShippingTypeEnum;
use addons\TinyShop\common\models\forms\OrderQueryForm;

/**
 * 订单管理
 *
 * Class OrderController
 * @package addons\TinyShop\api\controllers
 * @author jianyan74 <751393839@qq.com>
 */
class OrderController extends UserAuthController
{
    /**
     * @var Order
     */
    public $modelClass = Order::class;

    /**
     * 首页
     *
     * @return array|ActiveDataProvider|\yii\db\ActiveRecord[]
     */
    public function actionIndex()
    {
        $model = new OrderQueryForm();
        $model->attributes = Yii::$app->request->get();
        $model->member_id = Yii::$app->user->identity->member_id;

        return Yii::$app->tinyShopService->order->query($model);
    }

    /**
     * 单个显示
     *
     * @param $id
     * @return \yii\db\ActiveRecord
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $with = ['product', 'invoice', 'coupon'];
        // 简单的查询订单基本信息
        if ($simplify = Yii::$app->request->get('simplify')) {
            $with = [];
        }

        $model = $this->modelClass::find()->where([
            'id' => $id,
            'status' => StatusEnum::ENABLED,
            'buyer_id' => Yii::$app->user->identity->member_id,
        ])
            ->andFilterWhere(['merchant_id' => $this->getMerchantId()])
            ->with($with)
            ->asArray()
            ->one();

        if (!$model) {
            throw new NotFoundHttpException('找不到订单信息');
        }

        // 倒计时
        $setting = new SettingForm();
        $setting->attributes = AddonHelper::getBackendConfig();
        $model['close_time'] = $model['created_at'] + $setting->order_buy_close_time * 60;
        // 支付类型、配送方式
        $model['payment_explain'] = PayTypeEnum::getValue($model['payment_type']);
        $model['shipping_explain'] = ShippingTypeEnum::getValue($model['shipping_type']);

        return $model;
    }

    /**
     * 关闭订单
     *
     * @param $id
     * @throws NotFoundHttpException
     * @throws \yii\web\UnprocessableEntityHttpException
     */
    public function actionClose($id)
    {
        // 验证订单
        $member_id = Yii::$app->user->identity->member_id;

        return Yii::$app->tinyShopService->order->close($id, $member_id);
    }

    /**
     * 关闭订单
     *
     * @param $id
     * @throws NotFoundHttpException
     * @throws \yii\web\UnprocessableEntityHttpException
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        // 非关闭订单不可删除
        if ($model->order_status != OrderStatusEnum::REPEAL) {
            return ResultHelper::json(422, "删除失败");
        }

        $model->status = StatusEnum::DELETE;
        if ($model->save()) {
            return true;
        }

        return ResultHelper::json(422, "删除失败");
    }

    /**
     * 确认收货
     *
     * @param $id
     * @throws NotFoundHttpException
     * @throws \yii\web\UnprocessableEntityHttpException
     */
    public function actionTakeDelivery($id)
    {
        // 验证订单
        $member_id = Yii::$app->user->identity->member_id;

        return Yii::$app->tinyShopService->order->takeDelivery($id, $member_id);
    }

    /**
     * @param $id
     * @return \yii\db\ActiveRecord
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        /* @var $model \yii\db\ActiveRecord */
        if (empty($id) || !($model = $this->modelClass::find()->where([
                'id' => $id,
                'status' => StatusEnum::ENABLED,
                'buyer_id' => Yii::$app->user->identity->member_id,
                'merchant_id' => $this->getMerchantId()
            ])->one())) {
            throw new NotFoundHttpException('请求的数据不存在或您的权限不足.');
        }

        return $model;
    }

    /**
     * 权限验证
     *
     * @param string $action 当前的方法
     * @param null $model 当前的模型类
     * @param array $params $_GET变量
     * @throws \yii\web\BadRequestHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        // 方法名称
        if (in_array($action, ['update', 'create'])) {
            throw new \yii\web\BadRequestHttpException('权限不足');
        }
    }
}