<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Invoices */
/* @var $form yii\widgets\ActiveForm */

$this->title = '订单信息';
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
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
                    <?= $form->field($model, 'buid')->textInput() ?>
                    <?= $form->field($model, 'bill_number')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'merchant_id')->dropDownList([]) ?>
                    <?= $form->field($model, 'created_user')->dropDownList([]) ?>
                    <?= $form->field($model, 'trans_type')->textInput() ?>
                    <?= $form->field($model, 'total_amount')->textInput() ?>
                    <?= $form->field($model, 'amount')->textInput() ?>
                    <?= $form->field($model, 'rp_amount')->textInput() ?>
                    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'arrears')->textInput() ?>
                    <?= $form->field($model, 'dis_rate')->textInput() ?>
                    <?= $form->field($model, 'dis_amount')->textInput() ?>
                    <?= $form->field($model, 'total_qty')->textInput() ?>
                    <?= $form->field($model, 'total_arrears')->textInput() ?>
                    <?= $form->field($model, 'bill_status')->dropDownList([]) ?>
                    <?= $form->field($model, 'check_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'total_tax')->textInput() ?>
                    <?= $form->field($model, 'total_tax_amount')->textInput() ?>
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
                    <?= $form->field($model, 'checked')->textInput() ?>
                    <?= $form->field($model, 'accid')->textInput() ?>
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
                    <?= $form->field($model, 'sales_id')->dropDownList([]) ?>
                    <?= $form->field($model, 'customer_free')->textInput() ?>
                    <?= $form->field($model, 'hx_amount')->textInput() ?>
                    <?= $form->field($model, 'payment')->textInput() ?>
                    <?= $form->field($model, 'post_data')->textarea(['rows' => 6]) ?>
                    <?= $form->field($model, 'in_location')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'out_location')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'status')->dropDownList([]) ?>
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
