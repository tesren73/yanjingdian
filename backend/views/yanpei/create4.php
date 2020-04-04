<?php

use common\helpers\Html;
use unclead\multipleinput\MultipleInput;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Optometry */
/* @var $form yii\widgets\ActiveForm */

$this->title = '验光信息';
$this->params['breadcrumbs'][] = ['label' => 'Optometries', 'url' => ['index']];
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
                        'enableClientValidation'    => false,
                        'validateOnChange'          => false,
                        'validateOnSubmit'          => true,
                        'validateOnBlur'            => false,
                    ]);?>
                <div class="col-sm-12">
                <table  class=table11_3 width="100%">
                  <tr>
                    <th>客户</th>
                    <th>销售人员</th>
                    <th>单据日期</th>
                    <th>单据编号</th>
                  </tr>
                  <tr>
                    <td><?= $form->field($model, 'name')->widget(\kartik\select2\Select2::className(), 
					['data' => ArrayHelper::map(\common\models\member\Member::find()->asArray()->all(), 'username', 'username'),
					])->label(false);?></td>
                    <td><?= $form->field($modelInv, 'sales_id')->widget(\kartik\select2\Select2::className(), [
        'data' => ArrayHelper::map(\common\models\backend\Member::find()->asArray()->all(), 'id', 'username'),
    ])->label(false);?></td>
                    <td><?= $form->field($model, 'created_at')->textInput(['maxlength' => true,'value' => date("Y-m-d H:i:s"),'readonly' => true])->label(false);?></td>
                    <td><?= $form->field($modelInv, 'bill_number')->textInput(['maxlength' => true])->label(false);?></td>
                  </tr>
                </table>
      
<table  class="table11_3">
  <tr>
    <td colspan="7"><span style="font-size:16px; font-weight:bold;">验光信息 </span></td>
  </tr>
  <tr height="40px">
    <th rowspan="4" >R</th>
    <th >球镜</th>
    <th >柱镜</th>
    <th >光轴</th>
    <th >瞳距</th>
    <th >棱镜</th>
    <th >基底</th>
  </tr>
  <tr height="40px">
    <td><?= $form->field($model, 'rightsph')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'rightcyl')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'rightax')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'pd')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'Rlengjing')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'Rjidi')->textInput(['maxlength' => true])->label(false);?></td>
  </tr>
  <tr>
    <th>矫正视力</th>
    <th>裸眼视力</th>
    <th>ADD</th>
    <th>瞳高</th>
    <th>基弧</th>
    <th>PD</th>
  </tr>
  <tr>
    <td><?= $form->field($model, 'Rcorrected')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'Rluoshi')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'Radd')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'Rtonggao')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'Rjihu')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'RPD')->textInput(['maxlength' => true])->label(false);?></td>
  </tr>
  <tr>
    <th rowspan="4">L</th>
    <th >球镜</th>
    <th >柱镜</th>
    <th >光轴</th>
    <th >瞳距</th>
    <th >棱镜</th>
    <th >基底</th>
  </tr>
  <tr>
    <td><?= $form->field($model, 'leftsph')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'leftcyl')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'leftax')->textInput(['maxlength' => true])->label(false);?></td>
    <td>&nbsp;</td>
    <td><?= $form->field($model, 'Llengjing')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'Ljidi')->textInput(['maxlength' => true])->label(false);?></td>
  </tr>
  <tr>
    <th>矫正视力</th>
    <th>裸眼视力</th>
    <th>ADD</th>
    <th>瞳高</th>
    <th>基弧</th>
    <th>类型</th>
  </tr>
  <tr>
    <td><?= $form->field($model, 'Lluoshi')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'Ladd')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'Ltonggao')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'Ljihu')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'LPD')->textInput(['maxlength' => true])->label(false);?></td>
    <td><?= $form->field($model, 'opttype')->dropDownList(['1' => '远用', '0' => '近用',])->label(false);?></td>
  </tr>
  <tr>
    <th colspan="2">被检人：</th>
    <td><?= $form->field($model, 'optname')->textInput(['maxlength' => true])->label(false);?></td>
    <th>验光师：</th>
    <td><?= $form->field($model, 'yanguangshi')->widget(\kartik\select2\Select2::className(), [
        'data' => ArrayHelper::map(\common\models\backend\Member::find()->asArray()->all(), 'id', 'username'),
    ])->label(false);?></td>
    <th>导购员：</th>
    <td><?= $form->field($model, 'sales_id')->widget(\kartik\select2\Select2::className(), [
        'data' => ArrayHelper::map(\common\models\backend\Member::find()->asArray()->all(), 'id', 'username'),
    ])->label(false);?></td>
  </tr>
  <tr>
    <th colspan="2">验光日期：</th>
    <td><?= $form->field($model, 'created_at')->textInput(['maxlength' => true,'value' => date("Y-m-d H:i:s"),'readonly' => true])->label(false);?></td>
    <th>备注：</th>
    <td colspan="3"><?= $form->field($model, 'remark')->textInput(['maxlength' => true])->label(false);?></td>
  </tr>
  <tr>
    <td colspan="7"><span style="font-size:16px; font-weight:bold;">商品信息</span></td>
  </tr>
  <tr>
    <td colspan="2">选择商品：</td>
    <td colspan="5">
    <?= $form->field($modelInf, 'goodsinfo')->widget(MultipleInput::className(), [
						'max' => 10,
						'cloneButton' => true,
						'columns' => [
							[
								'name'  => 'number',
								'type'  => \kartik\select2\Select2::class,
								'title' => '商品',
								'defaultValue' => 1,
//								'items' => ArrayHelper::map(\backend\models\Goods::find()->asArray()->all(), 'id', 'number'),
								 'options' => [
									 // 'prompt'=>['placeholder' => '请选择'],
									 'data'  =>[ArrayHelper::map(\backend\models\Goods::find()->asArray()->all(), 'id', 'number')],
								     //'onchange' => '',
								 ],
							],
						    [
						        'name'  => 'degrees',
						        'title' => '度数',
						        'defaultValue' => 1,
						        'enableError' => true,
						        'options' => [
						        //									'type' => 'number',
						        									'class' => 'input-degrees',
						        //									'onchange' => 'getProduct($(this))',
//						            'onkeyup' => 'getProduct($(this))',
						        ]
						    ],
						    [
						        'name'  => 'astigmia',
						        'title' => '散光',
						        'defaultValue' => 1,
						        'enableError' => true,
						        'options' => [
						        //									'type' => 'number',
						        									'class' => 'input-astigmia',
						        //									'onchange' => 'getProduct($(this))',
//						            'onkeyup' => 'getProduct($(this))',
						        ]
						    ],
							[
								'name'  => 'count',
								'title' => '数量',
								'defaultValue' => 1,
								'enableError' => true,
								'options' => [
//									'type' => 'number',
//									'class' => 'input-priority',
//									'onchange' => 'getProduct($(this))',
//									'onkeyup' => 'getProduct($(this))',
								]
							],
							[
								'name'  => 'salePrice',
								'title' => '单价',
								'defaultValue' => 0.00,
								'enableError' => true,
								'options' => [
//									'type' => 'string',
									'class' => 'input-salePrice',
//									'οnchange' => 'changeprice($(this));',
//									'onkeyup' => 'getProduct($(this))',
								]
							]
						]
					])->label(false); ?>
    <?= $form->field($model, 'field')->widget(MultipleInput::className(), [
        'id' => 'my_id',
        'allowEmptyList' => false,
        'rowOptions' => [
            'id' => 'row{multiple_index_my_id}',
        ],
        'columns' => [
            [
                'name'  => 'category',
                'type'  => 'dropDownList',
                'title' => 'Category',
                'defaultValue' => '1',
                'items' => [
                    '1' => 'Test 1',
                    '2' => 'Test 2',
                    '3' => 'Test 3',
                    '4' => 'Test 4',
                ],
                'options' => [
                    'onchange' => <<< JS
$.post("list?id=" + $(this).val(), function(data){
    console.log(data);
    $("select#subcat-{multiple_index_my_id}").html(data);
});
JS
                ],
            ],
            [
                'name'  => 'subcategory',
                'type'  => 'dropDownList',
                'title' => 'Subcategory',
                'items' => [],
                'options'=> [
                    'id' => 'subcat-{multiple_index_my_id}'
                ],
            ],
        ]
    ]);
    ?>
					</td>
  </tr>

  <tr>
    <td colspan="7"><span style="font-size:16px; font-weight:bold;">收款信息</span></td>
  </tr>
  <tr>
    <th colspan="2">总金额：</th>
    <td><?= $form->field($modelInv, 'total_amount')->textInput(['maxlength' => true])->label(false);?></td>
    <th>优惠金额：</th>
    <td><?= $form->field($modelInv, 'dis_amount')->textInput(['maxlength' => true])->label(false);?></td>
    <th>承担费用：</th>
    <td><?= $form->field($modelInv, 'customer_free')->textInput(['maxlength' => true])->label(false);?></td>
  </tr>
  <tr>
    <th colspan="2">结算账户：</th>
    <td><?= $form->field($modelInv, 'accid')->textInput(['maxlength' => true])->label(false);?></td>
    <th>付款金额：</th>
    <td><?= $form->field($modelInv, 'rp_amount')->textInput(['maxlength' => true])->label(false);?></td>
    <th>余额支付：</th>
    <td><?= $form->field($modelInv, 'bill_status')->textInput(['maxlength' => true])->label(false);?></td>
  </tr>
  <tr>
    <th colspan="2">制单人：</th>
    <td><?= $form->field($modelInv, 'created_user')->textInput(['maxlength' => true,'value' => Yii::$app->user->identity->username,'readonly' => true])->label(false);?></td>
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
    
    var number = $("#w1 option:selected").text();//监听select改变，获取下拉选项值

   var string_id=$(this).attr('id');
   if(string_id.indexOf("-")){
       var sid=string_id.split("-");
       var url = '/backend/yanpei/getgoods';
       //var url = 'http://localhost/backend/yanpei/getgoods';
    
    	$.ajax({
    	    async:false,
    		type : 'post',
    		cache:false,
           url:url,
           dataType : 'json',
           async : false,
    		data:{'number':number},   //传值到控制器，获取相应数据
    		success : function(data){
               alert (JSON.stringify(data));
          	   //var obj = JSON.parse(data);    //解析从控制器传来的数据（此时是数组）
               //alert(document.getElementById("invoiceinfo-name-1-astigmia").value);
               //document.getElementById("invoiceinfo-goodsinfo-"+sid[2]+"-degrees").value = data[0]['degrees'];
           	   //$("#input-degrees").val(obj[0]['degrees']);//解析后的数据相应值放到对应ID的文本框中
           	   $("#invoiceinfo-goodsinfo-"+sid[2]+"-degrees").val(data[0]['degrees']);
           		$("#invoiceinfo-goodsinfo-"+sid[2]+"-astigmia").val(data[0]['astigmia']);
           		$("#invoiceinfo-goodsinfo-"+sid[2]+"-saleprice").val(data[0]['saleprice']);
           	 
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