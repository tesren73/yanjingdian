<?php

use yii\grid\GridView;
use common\helpers\Url;
use common\helpers\Html;

$this->title = '物流配送';
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>

<div class="row">
    <div class="col-sm-12">
        <div class="nav-tabs-custom">
            <?= $this->render('../common/_express_nav', [
                'type' => 'company',
            ]) ?>
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="tab-pane active">
                        <nav class="goods-nav">
                            <ul>
                                <li class="selected"><a href="<?= Url::to(['index']) ?>">物流配送</a></li>
                                <li><a href="<?= Url::to(['address']) ?>">商家地址</a></li>
                            </ul>
                        </nav>
                        <div class="box">
                            <div class="box-header">
                                <div class="box-tools">
                                    <?= Html::create(['edit']); ?>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    //重新定义分页样式
                                    'tableOptions' => ['class' => 'table table-hover'],
                                    'columns' => [
                                        [
                                            'class' => 'yii\grid\SerialColumn',
                                        ],
                                        'title',
                                        'express_no',
                                        'mobile',
                                        [
                                            'attribute' => 'sort',
                                            'filter' => false, //不显示搜索框
                                            'value' => function ($model) {
                                                return Html::sort($model->sort);
                                            },
                                            'format' => 'raw',
                                            'headerOptions' => ['class' => 'col-md-1'],
                                        ],
                                        [
                                            'attribute' => 'is_default',
                                            'filter' => false, //不显示搜索框
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return Html::whether($model->is_default);
                                            },
                                        ],
                                        [
                                            'label' => '创建时间',
                                            'attribute' => 'created_at',
                                            'filter' => false, //不显示搜索框
                                            'format' => ['date', 'php:Y-m-d H:i'],
                                        ],
                                        // 'updated_at',
                                        [
                                            'header' => "操作",
                                            'class' => 'yii\grid\ActionColumn',
                                            'template' => '{template} {edit} {status} {delete}',
                                            'buttons' => [
                                                'template' => function ($url, $model, $key) {
                                                    return Html::linkButton([
                                                        'express-fee/index',
                                                        'company_id' => $model->id,
                                                    ], '运费模板');
                                                },
                                                'edit' => function ($url, $model, $key) {
                                                    return Html::edit(['edit', 'id' => $model->id]);
                                                },
                                                'status' => function ($url, $model, $key) {
                                                    return Html::status($model->status);
                                                },
                                                'delete' => function ($url, $model, $key) {
                                                    return Html::delete(['destroy', 'id' => $model->id]);
                                                },
                                            ],
                                        ],
                                    ],
                                ]); ?>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>