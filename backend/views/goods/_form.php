<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'degrees')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unitName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoryId')->dropDownList([]) ?>

    <?= $form->field($model, 'categoryName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'astigmia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'salePrice')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([]) ?>

    <?= $form->field($model, 'vipPrice')->textInput() ?>

    <?= $form->field($model, 'lowQty')->textInput() ?>

    <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'highQty')->textInput() ?>

    <?= $form->field($model, 'barCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discountRate')->textInput() ?>

    <?= $form->field($model, 'merchant_id')->dropDownList([]) ?>

    <?= $form->field($model, 'locationName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wholesalePrice')->textInput() ?>

    <?= $form->field($model, 'width')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sku_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'files')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'assistIds')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assistName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assistUnit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'safeDays')->textInput() ?>

    <?= $form->field($model, 'advanceDay')->textInput() ?>

    <?= $form->field($model, 'isWarranty')->textInput() ?>

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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
