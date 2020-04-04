<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '出入库记录';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                <div class="box-tools">
                    <a class="btn btn-primary btn-xs" href="/backend/stocks/edit"><i class="icon ion-plus"></i> 出入库</a>
                    <a class="btn btn-primary btn-xs" href="/backend/stocks/out"><i class="icon ion-plus"></i> 仓库调拨</a>
                </div>
            </div>
            <div class="box-body table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-hover'],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'visible' => false,
            ],

            //'id',
            'name',
            'number',
            'quantity',
            'degrees',
            //'unitName',
            ['attribute'=>'category_id',
                'value'=>'goodsType.title',
                'filter'=>\backend\models\MerchantConfig::find()
                    ->select(['title','id','set_type'])
                    ->andWhere('set_type=:set_type',[':set_type'=>'trade'])
                    ->indexBy('id')
                    ->column(),
            ],
            //'astigmia',
            //'sale_price',
            //'amount',
            //'remark',
            //'status',
            //'vip_price',
            //'low_qty',
            //'length',
            //'height',
            //'high_qty',
            //'bar_code',
            ['attribute'=>'qty_type',
                'filter'=>['0'=>'入库', '1'=>'出库'],
                'value' => function($date) {
                    switch ($date-> qty_type) {
                        case '0';
                            return '入库';
                            break;
                        case '1';
                            return '出库';
                            break;
                        default:
                            return '其他状态';
                            break;
                    }
                }
            ],
            //'merchant_id',
            //'wholesale_price',
            //'width',
            //'sku_id',
            //'property',
            //'safe_days',
            //'advance_day',
            //'is_warranty',
            //'weight',
            //'brand',
            //'spec',
            'created_at',
            //'updated_at',
            //'created_user',
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
