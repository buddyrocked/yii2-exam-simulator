
<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use webvimark\modules\UserManagement\models\User;
use backend\models\Subject;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SimulationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Simulations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">
    <div class="row">    
        <div class="col-md-12">
            <div class="container-menu">
                <div class="upper-menu">
                    <div class="title-icon"><i class="fa fa-male"></i></div>
                    <div class="upper-menu-title">
                    <?= Html::encode($this->title) ?>
                    </div>
                </div>
                <div class="middle-menu bg-white">
                    <div class="row">
                        <div class="col-md-12">
                           <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                            <?php \yii\widgets\Pjax::begin(); ?>
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    [
                                        'attribute'=>'user_id',
                                        'format'=>'raw',
                                        'filter'=>ArrayHelper::map(User::find()->all(), 'id', 'username'),
                                        'value'=>function($data){
                                            return $data->user->username;
                                        }
                                    ],
                                    [
                                        'attribute'=>'subject_id',
                                        'format'=>'raw',
                                        'filter'=>ArrayHelper::map(Subject::find()->all(), 'id', 'name'),
                                        'value'=>function($data){
                                            return $data->subject->name;
                                        }
                                    ],
                                    [
                                        'attribute'=>'timer_mode',
                                        'format'=>'raw',
                                        'filter'=>array('0'=>'No Timer', '1'=>'Timer per Exam', '2'=>'Timer per Question'),
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
                                    // 'start',
                                    // 'finish',
                                    // 'status',
                                    // 'score',
                                    'created',
                                    // 'updated',

                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'template' => '<div class="btn-group">{view}</div>',
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
