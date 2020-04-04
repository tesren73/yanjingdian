<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Suppliers */
/* @var $form yii\widgets\ActiveForm */

$this->title = '供应商';
$this->params['breadcrumbs'][] = ['label' => '供应商', 'url' => ['index']];
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
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'type')->widget(\kartik\select2\Select2::className(), [
                        'data' => ArrayHelper::map(\backend\models\MerchantConfig::find()->andFilterWhere(['set_type'=>'supplytype'])->asArray()->all(), 'id', 'title'),
                    ]);?>
                    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'realname')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'head_portrait')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'gender')->dropDownList(['0'=>'保密','1'=>'男','2'=>'女']) ?>
                    <?= $form->field($model, 'qq')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'birthday')->widget(kartik\datetime\DateTimePicker::class, [
                        'language' => 'zh-CN',
                        'options' => [
                            'value' => $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s',$model->birthday),
                        ],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd hh:ii',
                            'todayHighlight' => true, // 今日高亮
                            'autoclose' => true, // 选择后自动关闭
                            'todayBtn' => true, // 今日按钮显示
                        ]
                    ]) ?>
                    <?= $form->field($model, 'visit_count')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'home_phone')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
                    <?= \common\widgets\provinces\Provinces::widget([
                        'form' => $form,
                        'model' => $model,
                        'provincesName' => 'province_id',// 省字段名
                        'cityName' => 'city_id',// 市字段名
                        'areaName' => 'area_id',// 区字段名
                        'template' => 'short' //合并为一行显示
                    ]); ?>

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
