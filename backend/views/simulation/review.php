<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use kartik\widgets\Select2;

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
                                <div>&nbsp;</div>
                                <div>
                                    <span>Answered : <?= $model->getSimulationQuestions()->andWhere(['status'=>1])->count(); ?></span> |
                                    <span>Blank : <?= $model->getSimulationQuestions()->andWhere(['status'=>0])->count(); ?></span> |
                                    <span>Marked : <?= $model->getSimulationQuestions()->andWhere(['status'=>2])->count(); ?></span> |
                                    <span>Answered Marked : <?= $model->getSimulationQuestions()->andWhere(['status'=>2])->andWhere(['not', ['correct'=>null]])->count(); ?></span> |
                                    <span>Blank Marked : <?= $model->getSimulationQuestions()->andWhere(['status'=>2])->andWhere(['correct'=>null])->count(); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h1>

                                    </h1>
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            <div class="subject-search well">

                                <?php 
                                    $query = $model->getSimulationQuestions();
                                    if(isset(Yii::$app->request->queryParams['SimulationQuestion']['status'])):
                                        $status = Yii::$app->request->queryParams['SimulationQuestion']['status'];

                                        if(Yii::$app->request->queryParams['SimulationQuestion']['status'] == 0 || Yii::$app->request->queryParams['SimulationQuestion']['status'] == 1 || Yii::$app->request->queryParams['SimulationQuestion']['status'] == 2):                                            
                                            $query = $query->where(['status'=>$status]);
                                            $modelx->status = Yii::$app->request->queryParams['SimulationQuestion']['status'];
                                        elseif($status == 3):
                                            //blank mark
                                            $query = $query->where(['status'=>2])->andWhere(['correct'=>null]);
                                            $modelx->status = 3;
                                        elseif($status == 4):
                                            //answer mark
                                            $query = $query->where(['status'=>2])->andWhere(['not', ['correct'=>null]]);
                                            $modelx->status = 4;
                                        endif;
                                        
                                    endif;

                                    $form = ActiveForm::begin([
                                    'action' => Url::to(['review', 'id'=>$model->id]),
                                    'method' => 'get',
                                ]); ?>
                                <div class='row'>
                                <div class="col-md-10">
                                        <?= $form->field($modelx, 'status')->widget(Select2::className(),  [
                                            'data' => ['0'=>'Blank', '1'=>'Answer', '2'=>'Mark', '3'=>'Blank Mark', '4'=>'Answer Mark'],
                                            'options'=>['placeholder'=>'Choose Status'],
                                            'pluginOptions'=>[
                                               'allowClear'=>true 
                                            ],
                                            'pluginEvents'=>[
                                                
                                            ]
                                        ]) ?>
                                </div>
                                <div class="col-md-2">
                                    <div>&nbsp;</div>
                                        <div class="form-group">
                                            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                                        </div>
                                    </div>
                                </div>
                                <?php ActiveForm::end(); ?>

                            </div>
                            <div>
                                <?php \yii\widgets\Pjax::begin(); ?>
                                <?php

                                    

                                    echo GridView::widget([
                                    'dataProvider' => new ActiveDataProvider([
                                                    'query' => $query,
                                    ]),
                                    'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                            [
                                                'attribute'=>'question',
                                                'format'=>'raw',
                                                'value'=>function($data){
                                                    $client = (isset($data->question->question))?substr($data->question->question, 0, 50):'-';
                                                    return strip_tags($client).'...';
                                                }
                                            ],
                                            [
                                                'attribute'=>'status',
                                                'format'=>'raw',
                                                'value'=>function($data){
                                                    return $data->getNewStatus();
                                                }
                                            ],
                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'template' => '{question}',
                                                'buttons' => [
                                                                'question' => function ($url, $model, $key) {
                                                                    if($model->simulation->timer_mode == 0 || $model->simulation->timer_mode == 1):
                                                                        return Html::a('<i class="fa fa-search"></i>', ['/simulation/question', 'id'=>$model->simulation_id, 'question'=>$model->id], ['class'=>'btn btn-danger btn-xs']);
                                                                    else:
                                                                        return Html::a('<i class="fa fa-search"></i>', ['/simulation/question', 'id'=>$model->simulation_id, 'question'=>$model->id], ['class'=>'btn btn-danger btn-xs disabled']);
                                                                    endif;
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
                <div class="upper-menu">
                    <div class="upper-menu-title">
                        &nbsp;Timer
                    </div>
                </div>
                <div class="middle-menu bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                                if($model->timer_mode == 1): 
                                    $diff = ($model->duration * 60) - (strtotime((string)$model->timer) - (strtotime((string)$model->start) - (strtotime((string)date('H:i:s')) - strtotime((string)Yii::$app->session->get('simulation_'.$model->id)))));
                                    $time = $model->convertSecondstoTimes($diff);
                            ?>
                                <div class="well">
                                    <h1 class="text-center bebas text-bold" id="timer-question" data-timer="<?= $time; ?>"></h1>
                                </div>
                            <?php else: ?>
                                <div class="well">
                                    <h1 class="text-center bebas text-bold"></h1>
                                </div>
                            <?php endif; ?>
                            <?= Html::a('<i class="fa fa-check"></i> Finish Exam', ['postfinish', 'id'=>$model->id], ['class' => 'btn-lg btn-block btn btn-danger', 'data' => [
                                        'confirm' => 'Are you sure you want to finish this exam?',
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

