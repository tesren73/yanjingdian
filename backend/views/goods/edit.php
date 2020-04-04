<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */
/* @var $form yii\widgets\ActiveForm */

$this->title = '商品信息';
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">基本信息</h3>
            </div>
            <div class="box-body">
                <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'template' => "<div class='col-sm-2 text-right'>{label}</div><div class='col-sm-10'>{input}\n{hint}\n{error}</div>",
                    ],
                ]); ?>
                <div class="col-sm-12">
                    <?= $form->field($model, 'barCode')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'quantity')->textInput() ?>
                    <?= $form->field($model, 'degrees')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'unitName')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'category_id')->widget(\kartik\select2\Select2::className(), [
                        'data' => ArrayHelper::map(\backend\models\MerchantConfig::find()->andFilterWhere(['set_type'=>'trade'])->asArray()->all(), 'id', 'title'),
                    ])->label("选择分类");?>
                    <?= $form->field($model, 'astigmia')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'salePrice')->textInput() ?>
                    <?= $form->field($model, 'amount')->textInput() ?>
                    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'vipPrice')->textInput() ?>
                    <?= $form->field($model, 'lowQty')->textInput() ?>
                    <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'highQty')->textInput() ?>

                    <?= $form->field($model, 'discountRate')->textInput() ?>
                    <?= $form->field($model, 'locationName')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'wholesalePrice')->textInput() ?>
                    <?= $form->field($model, 'width')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'sku_id')->textInput() ?>
                    <?= $form->field($model, 'files')->textInput() ?>
                    <?= $form->field($model, 'assistIds')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'assistName')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'assistUnit')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'property')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'safeDays')->textInput() ?>
                    <?= $form->field($model, 'advanceDay')->widget(kartik\datetime\DateTimePicker::class, [
                        'language' => 'zh-CN',
                        'options' => [
                            'value' => $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s',$model->created_at),
                        ],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd hh:ii',
                            'todayHighlight' => true, // 今日高亮
                            'autoclose' => true, // 选择后自动关闭
                            'todayBtn' => true, // 今日按钮显示
                        ]
                    ]) ?>
                    <?= $form->field($model, 'isWarranty')->textInput() ?>
                    <?= $form->field($model, 'weight')->textInput() ?>
                    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'spec')->textInput(['maxlength' => true]) ?>

                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary" type="submit">保存</button>
                        <span class="btn btn-white" onclick="history.go(-1)">返回</span>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
