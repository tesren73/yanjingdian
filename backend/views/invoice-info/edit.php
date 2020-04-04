<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InvoiceInfo */
/* @var $form yii\widgets\ActiveForm */

$this->title = '订单信息';
$this->params['breadcrumbs'][] = ['label' => 'Invoice Infos', 'url' => ['index']];
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
                    <?= $form->field($model, 'id')->textInput() ?>
                    <?= $form->field($model, 'iid')->textInput() ?>
                    <?= $form->field($model, 'buid')->textInput() ?>
                    <?= $form->field($model, 'bill_no')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'trans_type')->textInput() ?>
                    <?= $form->field($model, 'amount')->textInput() ?>
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
                    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'invid')->textInput() ?>
                    <?= $form->field($model, 'price')->textInput() ?>
                    <?= $form->field($model, 'deduction')->textInput() ?>
                    <?= $form->field($model, 'discount_rate')->textInput() ?>
                    <?= $form->field($model, 'qty')->textInput() ?>
                    <?= $form->field($model, 'merchant_id')->dropDownList([]) ?>
                    <?= $form->field($model, 'tax')->textInput() ?>
                    <?= $form->field($model, 'tax_amount')->textInput() ?>
                    <?= $form->field($model, 'entry_id')->textInput() ?>
                    <?= $form->field($model, 'created_user')->dropDownList([]) ?>
                    <?= $form->field($model, 'status')->dropDownList([]) ?>
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
                    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>
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
