<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;
use common\helpers\ArrayHelper;

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
                    <?= $form->field($model, 'bar_code')->textInput(['maxlength' => true]) ?>
                    <table  class="table11_3">

                        <tr>
                            <td colspan="7"><span style="font-size:16px; font-weight:bold;">商品信息</span></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <?= $form->field($model, 'stocks')->widget(MultipleInput::className(), [
                                    'max' => 10,
                                    'cloneButton' => true,
                                    'columns' => [
                                        [
                                            'name'  => 'number',
                                            'type'  => \kartik\select2\Select2::class,
                                            'title' => '商品',
                                            'defaultValue' => 1,
                                            'options' => [
                                                'data'  =>[ArrayHelper::map(\backend\models\Goods::find()->asArray()->all(), 'id', 'number')],
                                            ],
                                        ],
                                        [
                                            'name'  => 'degrees',
                                            'title' => '度数',
                                            'defaultValue' => 0,
                                            'enableError' => true,
                                            'options' => [
                                                'class' => 'input-degrees',
                                            ]
                                        ],
                                        [
                                            'name'  => 'astigmia',
                                            'title' => '散光',
                                            'defaultValue' => 0,
                                            'enableError' => true,
                                            'options' => [
                                                'class' => 'input-astigmia',
                                            ]
                                        ],
                                    ]
                                ])->label(false); ?>
                            </td>
                        </tr>
                        </table>

                    <?= $form->field($model, 'unitName')->textInput(['maxlength' => true,'value'=>'片']) ?>
                    <?= $form->field($model, 'category_id')->widget(\kartik\select2\Select2::className(), [
                        'data' => ArrayHelper::map(\backend\models\MerchantConfig::find()->andFilterWhere(['set_type'=>'trade'])->asArray()->all(), 'id', 'title'),
                    ])->label("选择分类");?>
                    <?= $form->field($model, 'sale_price')->textInput() ?>
                    <?= $form->field($model, 'amount')->textInput() ?>
                    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'vip_price')->textInput() ?>
                    <?= $form->field($model, 'low_qty')->textInput() ?>
                    <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'high_qty')->textInput() ?>

                    <?= $form->field($model, 'qty_type')->dropDownList(['0'=>'入库','1'=>'出库']) ?>

                    <?= $form->field($model, 'wholesale_price')->textInput() ?>
                    <?= $form->field($model, 'width')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'sku_id')->textInput() ?>
                    <?= $form->field($model, 'property')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'safe_days')->textInput() ?>
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

<?php
$js = <<<JS
$(document).on('change', 'select', function(){
    var selectnum = $("#w1 option:selected").text();//监听select改变，获取下拉选项值

   var string_id=$(this).attr('id');
    var number = document.getElementById(string_id).value;
        //alert (number);
    if(string_id.indexOf("-")){
       var sid=string_id.split("-");
       var url = '/backend/yanpei/getgoods';
    	$.ajax({
    	    async:false,
    		type : 'post',
    		cache:false,
           url:url,
           dataType : 'json',
           async : false,
    		data:{'number':number},   //传值到控制器，获取相应数据
    		success : function(data){

           	   $("#invoiceinfo-stocks-"+sid[2]+"-degrees").val(data[0]['degrees']);
           		$("#invoiceinfo-stocks-"+sid[2]+"-astigmia").val(data[0]['astigmia']);
    		},
    	       error: function(XMLHttpRequest, textStatus, errorThrown) {
                                   //alert (errorThrown);
                                  	alert(XMLHttpRequest.status);
      					},
    		});
   }
});


JS;
$this->registerJs($js);
?>