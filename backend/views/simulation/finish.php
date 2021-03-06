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
        <div class="col-md-12"> 
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
                                <h1 class="bebas">You have reached the end of the exam</h1>
                                <div>Please review the exam result report below.</div>
                            </div>
                            <div role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#summary" aria-controls="summary" role="tab" data-toggle="tab"><i class="fa fa-briefcase"></i> Summary</a></li>
                                    <li role="presentation"><a href="#domain" aria-controls="domain" role="tab" data-toggle="tab"><i class="fa fa-database"></i> Domain</a></li>
                                    <li role="presentation"><a href="#question" aria-controls="question" role="tab" data-toggle="tab"><i class="fa fa-dropbox"></i> Question</a></li>
                                    
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="summary">
                                        <div>
                                            <div class="col-md-6">
                                            <h3 class="bebas">Summary</h3>
                                            </div>
                                            <div class="col-md-6">
                                            <h3 class="bebas">Scoring</h3>
                                            </div>
                                            <hr />
                                            <br /><br /><br /><br /><br />
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-xs-6"><h4 class="bebas">Correct Answer</h4></div>
                                                <div class="col-xs-1"><h4 class="bebas"><?= $model->getSimulationQuestions()->where(['correct'=>1])->count(); ?></h4></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-xs-6"><h4 class="bebas">Score</h4></div>
                                                <div class="col-xs-1"><h4 class="bebas"><?= ($model->getSimulationQuestions()->where(['correct'=>1])->count()) * (($model->true != null)?$model->true:1); ?></h4></div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-xs-6"><h4 class="bebas">Incorrect Answer</h4></div>
                                                <div class="col-xs-1"><h4 class="bebas"><?= $model->getSimulationQuestions()->where(['correct'=>0])->count(); ?></h4></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-xs-6"><h4 class="bebas">Incorrect Score</h4></div>
                                                <div class="col-xs-1"><h4 class="bebas"><?= ($model->getSimulationQuestions()->where(['correct'=>0])->count()) * (($model->false != null)?$model->false:1); ?></h4></div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-xs-6"><h4 class="bebas">Blank Answer</h4></div>
                                                <div class="col-xs-1"><h4 class="bebas"><?= $model->getSimulationQuestions()->andWhere(['correct'=>null])->count(); ?></h4></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-xs-6"><h4 class="bebas">Blank Score</h4></div>
                                                <div class="col-xs-1"><h4 class="bebas"><?= ($model->getSimulationQuestions()->andWhere(['correct'=>null])->count()) * (($model->blank != null)?$model->blank:1); ?></h4></div>
                                            </div>
                                            </div>
                                            <hr />
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-xs-6"><h4 class="bebas">Total Questions</h4></div>
                                                <div class="col-xs-1"><h4 class="bebas"><?= $model->getSimulationQuestions()->count(); ?></h4></div>
                                            </div>
                                            </div>
                                            <hr />
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-xs-6"><h4 class="bebas">Minimum Score</h4></div>
                                                <div class="col-xs-1"><h4 class="bebas"><?= $model->minimum_score; ?>%</h4></div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-xs-6"><h4 class="bebas">Your Score</h4></div>
                                                <div class="col-xs-1"><h4 class="bebas"><?= $model->getScore(); ?>%</h4></div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-xs-6"><div>&nbsp;</div><h4 class="bebas">Status</h4></div>
                                                <div class="col-xs-6"><?= $model->getScoreStatus(); ?></div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="domain">
                                        <div>
                                            <hr />
                                            <h3 class="bebas">Domain</h3>
                                            <hr />
                                            <div>
                                                <?php \yii\widgets\Pjax::begin(); ?>
                                                <?= GridView::widget([
                                                        'dataProvider' => new ActiveDataProvider([
                                                                        'query' => $model->getSimulationDomains(),
                                                        ]),
                                                        'columns' => [
                                                                ['class' => 'yii\grid\SerialColumn'],
                                                                [
                                                                    'attribute'=>'name',
                                                                    'format'=>'raw',
                                                                    'value'=>function($data){
                                                                        return $data->domain->name;
                                                                    }
                                                                ],
                                                                [
                                                                    'header'=>'Question per Domain',
                                                                    'format'=>'raw',
                                                                    'value'=>function($data) use($model){
                                                                        return $data->getSimulationQuestions()->count();
                                                                    }
                                                                ],
                                                                [
                                                                    'header'=>'Right Answer',
                                                                    'format'=>'raw',
                                                                    'value'=>function($data) use($model){
                                                                        return $data->getSimulationQuestions()->where(['correct'=>1])->count();
                                                                    }
                                                                ],
                                                                [
                                                                    'header'=>'Percentage',
                                                                    'format'=>'raw',
                                                                    'value'=>function($data) use($model){
                                                                        return $data->countPercent().'%';
                                                                    }
                                                                ],
                                                                [
                                                                    'header'=>'Strength',
                                                                    'format'=>'raw',
                                                                    'value'=>function($data) use($model){
                                                                        return $data->getStrength()->one()->name;
                                                                    }
                                                                ],
                                                        ]
                                                    ]);
                                                ?>
                                                <?php \yii\widgets\Pjax::end(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="question">
                                        <div>
                                            <hr />
                                            <h3 class="bebas">Review Exam <?= $model->explain_mode; ?></h3>
                                            <hr />
                                            <div>
                                                <?php \yii\widgets\Pjax::begin(); ?>
                                                    <?= GridView::widget([
                                                    'dataProvider' => new ActiveDataProvider([
                                                                    'query' => $model->getSimulationQuestions(),
                                                    ]),
                                                    'columns' => [
                                                            ['class' => 'yii\grid\SerialColumn'],
                                                            /*[
                                                                'attribute'=>'question_id',
                                                                'format'=>'text',
                                                                'value'=>function($data){
                                                                    return strip_tags($data->question->question);
                                                                }
                                                            ],*/
                                                            /*[
                                                                'attribute'=>'status',
                                                                'format'=>'raw',
                                                                'value'=>function($data){
                                                                    return $data->getLabelStatus();
                                                                }
                                                            ],*/
                                                            /*[
                                                                'attribute'=>'simulation_question_answers',
                                                                'header'=>'Your Answer',
                                                                'format'=>'raw',
                                                                'value'=>function($data){
                                                                    return $data->textSimulationQuestionAnswers();
                                                                }
                                                            ],*/
                                                            [
                                                                'attribute'=>'question',
                                                                'format'=>'raw',
                                                                'value'=>function($data){
                                                                    $client = (isset($data->question->question))?substr($data->question->question, 0, 150):'-';
                                                                    return strip_tags($client).'...';
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
                                                            /*[
                                                                'header'=>'Right Answer',
                                                                'format'=>'raw',
                                                                'value'=>function($data){
                                                                    return ($data->simulation->explain_mode == 1)?$data->question->getTextQuestionRightOptions():'';
                                                                }
                                                            ],*/
                                                            [
                                                                'class' => 'yii\grid\ActionColumn',
                                                                'template' => ($model->explain_mode == 1)?'<div class="btn-group">{view}</div>':'',
                                                                'buttons' => [
                                                                                'view' => function ($url, $model, $key) {
                                                                                    return Html::a('<i class="fa fa-search"></i>', ['/simulation/viewquestion', 'id'=>$model->id], ['class'=>'btn btn-xs btn-danger outline btn-modal']);
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
                            <div>&nbsp;</div>
                            <div class="well">
                                <?= Html::a('<i class="fa fa-list-alt"></i> Go To My Exam', ['/simulation/list'], ['class' => 'btn-lg btn btn-info']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="col-md-4">
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
                                        
                                    ]
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
</div>