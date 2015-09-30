<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model backend\models\Simulation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['/site/dashboard']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simulation-view">
    <div class="row">    
        <div class="col-md-12">
            <div class="container-menu">
                <div class="upper-menu">
                    <div class="upper-menu-title">
                        &nbsp; Detail Simulasi
                    </div>
                </div>
                <div class="middle-menu bg-white">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-briefcase"></i> Information</a></li>
                            <li role="presentation"><a href="#domain" aria-controls="domain" role="tab" data-toggle="tab"><i class="fa fa-database"></i> Review</a></li>
                            <li role="presentation"><a href="#question" aria-controls="question" role="tab" data-toggle="tab"><i class="fa fa-dropbox"></i> Result</a></li>
                            
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="well bg-white">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <span class="fa-stack fa-3x text-danger">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="fa fa-trophy fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </div>
                                                <div class="col-md-9">
                                                    <h1 class="bebas text-bold"><?= Html::encode($model->subject->name); ?></h1>
                                                </div>
                                                <div class="col-md-1">
                                                    <h3 class="text-center text-danger bebas">
                                                        <strong><?= Html::encode($model->subject->time); ?></strong>
                                                    </h3>
                                                    <div class="text-center">Minutes</div>
                                                </div>
                                                <div class="col-md-1">
                                                    <h3 class="text-center text-danger bebas">
                                                        <strong><?= Html::encode($model->subject->question_number); ?></strong>
                                                    </h3>
                                                    <div class="text-center">Questions</div>
                                                </div>
                                            </div>
                                        </div>
                                        <?= DetailView::widget([
                                            'model' => $model,
                                            'attributes' => [
                                                [
                                                   'attribute'=>'user_id',
                                                   'value'=>($model->profile != null)?$model->profile->getFullName():'',
                                                ],
                                                [
                                                   'attribute'=>'subject_id',
                                                   'value'=>$model->subject->name,
                                                ],
                                                [
                                                   'attribute'=>'duration',
                                                   'value'=>$model->duration.' Minutes',
                                                ],
                                                [
                                                   'attribute'=>'Timer Mode',
                                                   'value'=>$model->getLabelTimer(),
                                                ],
                                                'start',
                                                'finish',
                                                'status',
                                                'score',
                                            ],
                                        ]) ?>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="domain">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="well">
                                            <h1 class="bebas">Exam Review</h1>
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
                                                    ],
                                                ]); ?>
                                            <?php \yii\widgets\Pjax::end(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="question">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="well">
                                            <h1 class="bebas">Exam Summary</h1>
                                            <div>Your exam simulation summary</div>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
