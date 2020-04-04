<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商品列表';
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

            'degrees',
            [
                'attribute' => 'unitName',
                'filter' => false, //不显示搜索框
            ],
            ['attribute'=>'category_id',
                'label'=>'商品分类',
                'value'=>'goodsType.title',
            ],
            //'categoryName',
            'astigmia',
            [
                'attribute' => 'salePrice',
                'filter' => false, //不显示搜索框
            ],
            //'amount',
            //'remark',
            //'status',
            //'vipPrice',
            //'lowQty',
            //'length',
            //'height',
            //'highQty',
            //'barCode',
            //'discountRate',
            //'merchant_id',
            //'locationName',
            //'wholesalePrice',
            //'width',
            //'sku_id:ntext',
            //'files:ntext',
            //'assistIds',
            //'assistName',
            //'assistUnit',
            //'property',
            //'safeDays',
            //'advanceDay',
            //'isWarranty',
            //'weight',
            [
                'attribute' => 'brand',
                'filter' => false, //不显示搜索框
            ],
            'quantity',
            //'spec',
            [
                'attribute' => 'created_at',
                'filter' => false, //不显示搜索框
            ],
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
