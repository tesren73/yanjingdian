<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                <div class="box-tools">
                    <?= Html::create(['edit']) ?>
                </div>
            </div>
            <div class="box-body table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-hover'],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'visible' => false,
            ],

            //'id',
            ['attribute'=>'buid',
                'label'=>'会员姓名',
                'value'=>'account.username',
            ],
            'bill_number',
            //'merchant_id',
            //'created_user',
            //'trans_type',
            'total_amount',
            'amount',
            //'rp_amount',
            //'description',
            //'arrears',
            //'dis_rate',
            //'dis_amount',
            'total_qty',
            //'total_arrears',
            ['attribute'=>'bill_status',
                'label'=>'订单状态',
                'value'=>'orderType.title',
            ],
            //'check_name',
            //'total_tax',
            //'total_tax_amount',
            'created_at',
            //'checked',
            //'accid',
            //'updated_at',
            //'sales_id',
            //'customer_free',
            //'hx_amount',
            //'payment',
            //'post_data:ntext',
            //'in_location',
            //'out_location',
            //'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{edit} {status} {delete}',
                'buttons' => [
                'edit' => function($url, $model, $key){
                        return Html::edit(['edit', 'id' => $model->id]);
                },
               'status' => function($url, $model, $key){
                        return Html::status($model['status']);
                  },
                'delete' => function($url, $model, $key){
                        return Html::delete(['delete', 'id' => $model->id]);
                },
                ]
            ]
    ]
    ]); ?>
            </div>
        </div>
    </div>
</div>
