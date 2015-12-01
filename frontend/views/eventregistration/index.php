
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EventRegistrationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Event Registrations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index first-content">
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
                                <div class="text-right">
                                    <?php //Html::a('<i class="fa fa-plus"></i> <span>Create</span> ', ['create'], ['class' => 'btn btn-danger outline']) ?>
                                </div>
                                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                                <?php \yii\widgets\Pjax::begin(); ?>
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    //'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                            'name',
                                            'phone',
                                            'email:email',
                                            [
                                                'attribute'=>'event_id',
                                                'value'=>function($data){
                                                    return isset($data->event->name)?$data->event->name:'';
                                                }
                                            ],
                                            [
                                                'attribute'=>'status',
                                                'value'=>function($data){
                                                    return ($data->status == 0)?'Unverified':'Verified';
                                                }
                                            ],
                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'template' => '<div class="btn-group">{view}</div>',
                                                'buttons' => [
                                                                'view' => function ($url, $model, $key) {
                                                                    return Html::a('<i class="fa fa-search"></i>', $url, ['class'=>'btn btn-xs btn-danger outline']);
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
</div>
