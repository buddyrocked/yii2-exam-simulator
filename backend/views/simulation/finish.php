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
                                <h1 class="bebas">Congratulation Guys..!!!</h1>
                                <div>Exam Simulation already finish.</div>
                            </div>
                            <div>
                                <h3 class="bebas">Summary</h3>
                                <hr />
                                <div class="row">
                                    <div class="col-xs-6"><h5>Total Questions</h5></div>
                                    <div class="col-xs-6"><h4 class="bebas"><?= $model->getSimulationQuestions()->count(); ?></h4></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6"><h5>Total Correct Answer</h5></div>
                                    <div class="col-xs-6"><h4 class="bebas"><?= $model->getSimulationQuestions()->where(['correct'=>1])->count(); ?></h4></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6"><h5>Total Incorrect Answer</h5></div>
                                    <div class="col-xs-6"><h4 class="bebas"><?= $model->getSimulationQuestions()->where(['correct'=>0])->count(); ?></h4></div>
                                </div>
                                <hr />
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
                                                        /*[
                                                            'attribute'=>'status',
                                                            'format'=>'raw',
                                                            'value'=>function($data){
                                                                return $data->getLabelStatus();
                                                            }
                                                        ],*/
                                                        [
                                                            'attribute'=>'simulation_question_answers',
                                                            'header'=>'Your Answer',
                                                            'format'=>'raw',
                                                            'value'=>function($data){
                                                                return $data->textSimulationQuestionAnswers();
                                                            }
                                                        ],
                                                        [
                                                            'attribute'=>'is_correct',
                                                            'header'=>'Correct',
                                                            'format'=>'raw',
                                                            'value'=>function($data){
                                                                return $data->getLabelCorrect();
                                                            }
                                                        ],
                                                        [
                                                            'header'=>'Right Answer',
                                                            'format'=>'raw',
                                                            'value'=>function($data){
                                                                return ($data->simulation->explain_mode == 1)?$data->question->getTextQuestionRightOptions():'';
                                                            }
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
                            <div class="well">
                                <h1 class="text-center bebas text-bold">00:00:00</h1>
                            </div>
                            <?= Html::a('<i class="fa fa-check"></i> Go to Dashboard', ['/site/dashboard'], ['class' => 'btn-lg btn-block btn btn-danger', 'data' => [
                                        //'confirm' => 'Are you sure you want to close this exam?',
                                        //'method' => 'post',
                                    ]
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

