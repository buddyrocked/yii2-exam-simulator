<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$this->title = 'Exam Simulator';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-content first-content" id="index-content">
	<div class="row">    
        <div class="col-md-8"> 
            <div class="container-menu">
                <div class="upper-menu">
                    <div class="upper-menu-title">
                        Finish
                    </div>
                </div>
                <div class="middle-menu bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="well">
                                <h1 class="bebas">Exam Review</h1>
                                <div>Please review & re-check before you finished the exam.</div>
                                
                            </div>
                            <div>
                                <?php \yii\widgets\Pjax::begin(); ?>
                                    <?= GridView::widget([
                                    'dataProvider' => new ActiveDataProvider([
                                                    'query' => $model->getSimulationQuestions(),
                                    ]),
                                    'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                            [
                                                'attribute'=>'question_id',
                                                'format'=>'text',
                                                'value'=>function($data){
                                                    return strip_tags($data->question->question);
                                                }
                                            ],
                                            [
                                                'attribute'=>'status',
                                                'format'=>'raw',
                                                'value'=>function($data){
                                                    return $data->getLabelStatus();
                                                }
                                            ],
                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'template' => '{question}',
                                                'buttons' => [
                                                                'question' => function ($url, $model, $key) {
                                                                    return Html::a('<i class="fa fa-search"></i>', ['/simulation/question', 'id'=>$model->simulation_id, 'question'=>$model->id], ['class'=>'btn btn-danger btn-xs']);
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
        <div class="col-md-4">
        	<div class="container-menu">
                <div class="middle-menu bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Time : </label>
                            <div class="well">
                                <h1 class="text-center bebas text-bold">00:13:00</h1>
                            </div>
                            <?= Html::a('<i class="fa fa-check"></i> Close Exam', ['postfinish', 'id'=>$model->id], ['class' => 'btn-lg btn-block btn btn-danger', 'data' => [
                                        'confirm' => 'Are you sure you want to close this exam?',
                                        'method' => 'post',
                                    ]
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

