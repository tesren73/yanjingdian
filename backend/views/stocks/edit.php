<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Stocks */
/* @var $form yii\widgets\ActiveForm */

$this->title = '库存列表';
$this->params['breadcrumbs'][] = ['label' => '库存列表', 'url' => ['index']];
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
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'quantity')->textInput() ?>
                    <?= $form->field($model, 'degrees')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'unitName')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'category_id')->dropDownList([]) ?>
                    <?= $form->field($model, 'astigmia')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'sale_price')->textInput() ?>
                    <?= $form->field($model, 'amount')->textInput() ?>
                    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'status')->dropDownList([]) ?>
                    <?= $form->field($model, 'vip_price')->textInput() ?>
                    <?= $form->field($model, 'low_qty')->textInput() ?>
                    <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'high_qty')->textInput() ?>
                    <?= $form->field($model, 'bar_code')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'qty_type')->dropDownList([]) ?>
                    <?= $form->field($model, 'merchant_id')->dropDownList([]) ?>
                    <?= $form->field($model, 'wholesale_price')->textInput() ?>
                    <?= $form->field($model, 'width')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'sku_id')->textInput() ?>
                    <?= $form->field($model, 'property')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'safe_days')->widget(kartik\datetime\DateTimePicker::class, [
                        'language' => 'zh-CN',
                        'options' => [
                            'value' => $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s',$model->safe_days),
                        ],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd hh:ii',
                            'todayHighlight' => true, // 今日高亮
                            'autoclose' => true, // 选择后自动关闭
                            'todayBtn' => true, // 今日按钮显示
                        ]
                    ]) ?>
                    <?= $form->field($model, 'advance_day')->widget(kartik\datetime\DateTimePicker::class, [
                        'language' => 'zh-CN',
                        'options' => [
                            'value' => $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s',$model->advance_day),
                        ],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd hh:ii',
                            'todayHighlight' => true, // 今日高亮
                            'autoclose' => true, // 选择后自动关闭
                            'todayBtn' => true, // 今日按钮显示
                        ]
                    ]) ?>
                    <?= $form->field($model, 'is_warranty')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'weight')->textInput() ?>
                    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'spec')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'created_at')->widget(kartik\datetime\DateTimePicker::class, [
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
                    <?= $form->field($model, 'updated_at')->widget(kartik\datetime\DateTimePicker::class, [
                        'language' => 'zh-CN',
                        'options' => [
                            'value' => $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s',$model->updated_at),
                        ],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd hh:ii',
                            'todayHighlight' => true, // 今日高亮
                            'autoclose' => true, // 选择后自动关闭
                            'todayBtn' => true, // 今日按钮显示
                        ]
                    ]) ?>
                    <?= $form->field($model, 'created_user')->dropDownList([]) ?>
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
