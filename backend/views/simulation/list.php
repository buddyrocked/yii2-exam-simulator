
<?php

use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use backend\components\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SimulationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Exam';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simulation-list first-content" id="index-content">
<div class="container">
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
                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        

                            <?php //\yii\widgets\Pjax::begin(); ?>
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    [
                                        'attribute'=>'user_id',
                                        'format'=>'raw',
                                        'value'=>function($data){
                                            return isset($data->profile->first_name)?$data->profile->first_name:'';
                                        }
                                    ],
                                    [
                                        'attribute'=>'subject_id',
                                        'format'=>'raw',
                                        'value'=>function($data){
                                            return $data->subject->name;
                                        }
                                    ],
                                    [
                                        'attribute'=>'timer_mode',
                                        'format'=>'raw',
                                        'value'=>function($data){
                                            return $data->getLabelTimer();
                                        }
                                    ],
                                    [
                                        'attribute'=>'duration',
                                        'format'=>'raw',
                                        'value'=>function($data){
                                            return $data->duration.' Minutes';
                                        }
                                    ],
                                    [
                                        'attribute'=>'created',
                                        'format'=>'raw',
                                        'value'=>function($data){
                                            return $data->created;
                                        }
                                    ],
                                    // 'start',
                                    // 'finish',
                                    // 'status',
                                    // 'score',
                                    // 'created',
                                    // 'updated',

                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'template' => '<div class="btn-group">{view}{review}</div>',
                                        'buttons' => [
                                                        'view' => function ($url, $model, $key) {
                                                            return Html::a('<i class="fa fa-search"></i>', $url, ['class'=>'btn btn-xs btn-danger outline']);
                                                        },
                                                        'review' => function ($url, $model, $key) {
                                                            return (Yii::$app->formatter->asDatetime($model->created, "php:Y-m-d") == date('Y-m-d'))?Html::a('<i class="fa fa-pencil"></i> Resume', $url, ['class'=>'btn btn-xs btn-danger outline', 'target'=>'_blank']):'';
                                                        },
                                                        'delete' => function ($url, $model, $key) {
                                                            return Html::a('<i class="fa fa-trash"></i>', $url, ['class'=>'btn btn-xs btn-danger outline', 'data-confirm'=>'Are you sure you want to delete this item?', 'data-method'=>'post']);
                                                        },
                                        ]
                                    ],
                                ],
                            ]); ?>
                            <?php //\yii\widgets\Pjax::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
