
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">
    <div class="row">    
        <div class="col-md-12">
            <div class="container-menu">
                <div class="upper-menu">
                    <div class="title-icon"><i class="fa fa-list-alt"></i></div>
                    <div class="upper-menu-title">
                    <?= Html::encode($this->title) ?>
                    </div>
                </div>
                <div class="middle-menu bg-white">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="text-right">
                            <?= Html::a('<i class="fa fa-plus"></i> <span>Create</span> ', ['create'], ['class' => 'btn btn-danger outline']) ?>
                        </div>
                                                   <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        

                                                       <?php \yii\widgets\Pjax::begin(); ?>
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
        'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                            'id',
            'title',
            'slug',
            'content:ntext',
            'image',
            // 'type',
            // 'is_html',
            // 'status',
            // 'seo_title',
            // 'seo_keyword',
            // 'seo_description',
            // 'created',
            // 'updated',

                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '<div class="btn-group">{view} {update} {delete}</div>',
                                    'buttons' => [
                                                    'view' => function ($url, $model, $key) {
                                                        return Html::a('<i class="fa fa-search"></i>', $url, ['class'=>'btn btn-xs btn-danger outline']);
                                                    },
                                                    'update' => function ($url, $model, $key) {
                                                        return Html::a('<i class="fa fa-pencil"></i>', $url, ['class'=>'btn btn-xs btn-danger outline']);
                                                    },
                                                    'delete' => function ($url, $model, $key) {
                                                        return Html::a('<i class="fa fa-trash"></i>', $url, ['class'=>'btn btn-xs btn-danger outline', 'data-confirm'=>'Are you sure you want to delete this item?', 'data-method'=>'post']);
                                                    },
                                    ]
                                ],
                            ],
                        ]); ?>
                                           <?php \yii\widgets\Pjax::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
