<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Optometry */
/* @var $form yii\widgets\ActiveForm */

$this->title = '验光信息';
$this->params['breadcrumbs'][] = ['label' => 'Optometries', 'url' => ['index']];
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
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'billNo')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'optname')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'opttype')->dropDownList([]) ?>
                    <?= $form->field($model, 'rightsph')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'rightcyl')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'rightax')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Rlengjing')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Rjidi')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Rluoshi')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Radd')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Rtonggao')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Rjihu')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'RPD')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'leftsph')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'leftcyl')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'leftax')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Llengjing')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Ljidi')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Lcorrected')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Lluoshi')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Ladd')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Ltonggao')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'Ljihu')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'LPD')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'pd')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>
                    <?= $form->field($model, 'yanguangshi')->dropDownList([]) ?>
                    <?= $form->field($model, 'Rcorrected')->textInput(['maxlength' => true]) ?>
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
                    <?= $form->field($model, 'sales_id')->dropDownList([]) ?>
                    <?= $form->field($model, 'created_user')->dropDownList([]) ?>
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
