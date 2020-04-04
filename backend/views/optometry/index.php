<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '验光列表';
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
                <div class="box-tools">
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
            //'updated_at',
            ['attribute'=>'name',
                'label'=>'会员姓名',
                'value'=>'account.username',
            ],
            'number',
            //'billNo',
            //'optname',
            //'opttype',
            [
                'attribute' => 'rightsph',
                'filter' => false, //不显示搜索框
            ],
            [
                'attribute' => 'rightcyl',
                'filter' => false, //不显示搜索框
            ],
            [
                'attribute' => 'rightax',
                'filter' => false, //不显示搜索框
            ],
            //'Rlengjing',
            //'Rjidi',
            //'Rluoshi',
            //'Radd',
            //'Rtonggao',
            //'Rjihu',
            //'RPD',
            [
                'attribute' => 'leftsph',
                'filter' => false, //不显示搜索框
            ],
            [
                'attribute' => 'leftcyl',
                'filter' => false, //不显示搜索框
            ],
            [
                'attribute' => 'leftax',
                'filter' => false, //不显示搜索框
            ],
            //'Llengjing',
            //'Ljidi',
            //'Lcorrected',
            //'Lluoshi',
            //'Ladd',
            //'Ltonggao',
            //'Ljihu',
            //'LPD',
            [
                'attribute' => 'pd',
                'filter' => false, //不显示搜索框
            ],
            //'remark:ntext',
            //'yanguangshi',
            //'Rcorrected',
            'created_at',
            //'sales_id',
            //'created_user',
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
