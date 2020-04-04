<?php
use backend\models\MerchantConfig;
use yii\widgets\ActiveForm;
use common\helpers\Url;
use common\enums\StatusEnum;

$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableAjaxValidation' => true,
    'validationUrl' => Url::to(['ajax-edit','id' => $model['id']]),
    'fieldConfig' => [
        'template' => "<div class='col-sm-2 text-right'>{label}</div><div class='col-sm-10'>{input}\n{hint}\n{error}</div>",
    ]
]);
?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">基本信息</h4>
    </div>
    <div class="modal-body">
        <?= $form->field($model, 'set_type')->dropDownList(['trade' => '商品分类',
                                                            'customertype' =>'客户分类',
                                                            'supplytype' =>'供应商分类',
                                                            'paccttype' =>'账户分类',
                                                            'raccttype' =>'财务设置',
                                                            'PayMethod' =>'支付设置',
                                                            'OrderType' =>'订单设置',]) ?>
        <?= $form->field($model, 'title')->textInput(); ?>
        <?= $form->field($model, 'parent_id')->textInput(); ?>
        <?= $form->field($model, 'status')->radioList(StatusEnum::getMap()); ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
        <button class="btn btn-primary" type="submit">保存</button>
    </div>
<?php ActiveForm::end(); ?>