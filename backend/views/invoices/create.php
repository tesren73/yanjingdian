<?php

use common\helpers\Html;
use unclead\multipleinput\MultipleInput;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Optometry */
/* @var $form yii\widgets\ActiveForm */

$this->title = '销售单';
$this->params['breadcrumbs'][] = ['label' => '销售单', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>


.table11_3 table {
	width:100%;
	margin:15px 0;
	border:0;
}
.table11_3 th {
	background-color:#E2E2E2;
	color:#000000
}
.table11_3,.table11_3 th,.table11_3 td {
	font-size:0.95em;
	text-align:center;
	padding:4px;
	border-collapse:collapse;
}
.table11_3 th,.table11_3 td {
	border: 1px solid ;
	border-width:1px 0 1px 0;
	border:2px inset #ffffff;
}
.table11_3 tr {
	border: 1px solid #ffffff;
}
.STYLE1 {color: #FF0000}
</style>
</head><body>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">基本信息</h3>
            </div>
            <div class="box-body">
                <?php $form = ActiveForm::begin([
                        'enableAjaxValidation'      => true,
                        'enableClientValidation'    => true,
                        'validateOnChange'          => false,
                        'validateOnSubmit'          => true,
                        'validateOnBlur'            => false,
                    ]);?>
                <div class="col-sm-12">

                            <table  class="table11_3">
                                <tr>
                                    <th colspan="2">客户</th>
                                    <th colspan="2">销售人员</th>
                                    <th colspan="2">单据编号</th>
                                </tr>
                                <tr>
                                    <td colspan="2"><?= $form->field($model, 'buid')->widget(\kartik\select2\Select2::className(),
                                            ['data' => ArrayHelper::map(\common\models\member\Member::find()->asArray()->all(), 'id', 'username'),
                                            ])->label(false);?></td>
                                    <td colspan="2"><?= $form->field($model, 'sales_id')->widget(\kartik\select2\Select2::className(), [
                                            'data' => ArrayHelper::map(\common\models\backend\Member::find()->asArray()->all(), 'id', 'username'),
                                        ])->label(false);?></td>
                                    <td colspan="2"><?= $form->field($model, 'bill_number')->textInput(['maxlength' => true])->label(false);?></td>
                                </tr>
                                <tr>
                                    <th colspan="2">客户电话</th>
                                    <th colspan="2">客户余额</th>
                                    <th colspan="2">单据日期</th>
                                </tr>
                                <tr>
                                    <td colspan="2">客户</td>
                                    <td colspan="2">销售人员</td>
                                    <td colspan="2"><?= $form->field($model, 'created_at')->textInput(['maxlength' => true,'value' => date("Y-m-d H:i:s"),'readonly' => true])->label(false);?></td>
                                </tr>
                              <tr>
                                <td colspan="6"><span style="font-size:16px; font-weight:bold;">商品信息</span></td>
                              </tr>
                              <tr>
                                <td colspan="6"><div id="message-tip"></div>
                                <?= $form->field($modelInf, 'invoiceinfo')->widget(MultipleInput::className(), [
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
                                                            'name'  => 'name',
                                                            'title' => '商品名称',

                                                            'enableError' => true,
                                                            'options' => [
                                                                'readonly' => true,
                                                            ]
                                                        ],
                                                        [
                                                            'name'  => 'degrees',
                                                            'title' => '度数',
                                                            'defaultValue' => 0,
                                                            'enableError' => true,
                                                            'options' => [
                                                                'readonly' => true,
                                                                'class' => 'input-degrees',
                                                            ]
                                                        ],
                                                        [
                                                            'name'  => 'astigmia',
                                                            'title' => '散光',
                                                            'defaultValue' => 0,
                                                            'enableError' => true,
                                                            'options' => [
                                                                'readonly' => true,
                                                                'class' => 'input-astigmia',
                                                            ]
                                                        ],
                                                        [
                                                            'name'  => 'qty',
                                                            'title' => '数量',
                                                            'defaultValue' => 1,
                                                            'enableError' => true,
                                                            'options' => [
                                                            ]
                                                        ],
                                                        [
                                                            'name'  => 'price',
                                                            'title' => '单价',
                                                            'defaultValue' => 0.00,
                                                            'enableError' => true,
                                                            'options' => [
                                                            ]
                                                        ]
                                                    ]
                                                ])->label(false); ?>
                                                </td>
                              </tr>

                              <tr>
                                <td colspan="6"><span style="font-size:16px; font-weight:bold;">收款信息</span></td>
                              </tr>
                              <tr>
                                <th>总金额：</th>
                                <td><?= $form->field($model, 'total_amount')->textInput(['maxlength' => true])->label(false);?></td>
                                <th>优惠金额：</th>
                                <td><?= $form->field($model, 'dis_amount')->textInput(['maxlength' => true])->label(false);?></td>
                                <th>承担费用：</th>
                                <td><?= $form->field($model, 'customer_free')->textInput(['maxlength' => true])->label(false);?></td>
                              </tr>
                              <tr>
                                <th>结算账户：</th>
                                <td><?= $form->field($model, 'accid')->widget(\kartik\select2\Select2::className(), [
                                        'data' => ArrayHelper::map(\backend\models\MerchantConfig::find()->andFilterWhere(['set_type'=>'PayMethod'])->asArray()->all(), 'id', 'title'),
                                    ])->label(false);?></td>
                                <th>付款金额：</th>
                                <td><?= $form->field($model, 'rp_amount')->textInput(['maxlength' => true])->label(false);?></td>
                                <th>余额支付：</th>
                                <td><?= $form->field($model, 'bill_status')->textInput(['maxlength' => true])->label(false);?></td>
                              </tr>
                              <tr>
                                <th>制单人：</th>
                                <td><?= $form->field($model, 'created_user')->textInput(['maxlength' => true,'value' => Yii::$app->user->identity->username,'readonly' => true])->label(false);?></td>
                                <th></th>
                                <th></th>
                                <th>审核人：</th>
                                <td>&nbsp;</td>
                              </tr>
                            </table>

                            </div>
                            <p>&nbsp;</p>
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
    if(string_id.indexOf("invoiceinfo") != -1){
        var messagediv = document.getElementById("message-tip");
        messagediv.innerHTML="";
       var sid=string_id.split("-");
       var url = '/backend/yanpei/getgoods';
       //var url = 'http://localhost/backend/yanpei/getgoods';

    	$.ajax({
    	    async:false,
    		type : 'post',
    		cache:false,
           url:url,
           dataType : 'json',
    		data:{'number':number},   //传值到控制器，获取相应数据
    		success : function(data){
                if('0'==data[0]['quantity']){
                    messagediv.innerHTML="<font color='red'>您选择的商品库存不足！请重新选择。</font>";
    		    }else{
                   //var obj = JSON.parse(data);    //解析从控制器传来的数据（此时是数组）
                   $("#invoiceinfo-invoiceinfo-"+sid[2]+"-name").val(data[0]['name']);
                   //document.getElementById("invoiceinfo-goodsinfo-"+sid[2]+"-degrees").value = data[0]['degrees'];
                   //$("#input-degrees").val(obj[0]['degrees']);//解析后的数据相应值放到对应ID的文本框中
                   $("#invoiceinfo-invoiceinfo-"+sid[2]+"-degrees").val(data[0]['degrees']);
                    $("#invoiceinfo-invoiceinfo-"+sid[2]+"-astigmia").val(data[0]['astigmia']);
                    $("#invoiceinfo-invoiceinfo-"+sid[2]+"-price").val(data[0]['saleprice']);
                }
    		},
    	       error: function(XMLHttpRequest, textStatus, errorThrown) {
                                   //alert (errorThrown);
                                  	alert(XMLHttpRequest.status);
      					},
    		});
   }
});

$("#invoices-total_amount").click(function () {
    var toutelamou = 0;
    for (var i = 0; i < 10; i++) {
    //alert($("#invoiceinfo-invoiceinfo-"+i+"-saleprice").val());
        if($("#invoiceinfo-invoiceinfo-"+i+"-price").length>0){
           toutelamou += $("#invoiceinfo-invoiceinfo-"+i+"-price").val()*$("#invoiceinfo-invoiceinfo-"+i+"-qty").val();
        }
    }
    //alert(toutelamou);
    $("#invoices-total_amount").val(toutelamou);
   // $("#invoices-rp_amount").val(toutelamou);
});
$("#invoices-rp_amount").change(function () {
    var disamount = 0;
    //alert($("#invoices-dis_amount").val());
           disamount = $("#invoices-total_amount").val()-$("#invoices-rp_amount").val();
    //alert(toutelamou);
    $("#invoices-dis_amount").val(disamount);
});

JS;
$this->registerJs($js);
?>