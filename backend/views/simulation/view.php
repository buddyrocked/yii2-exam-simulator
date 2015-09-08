<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
            </div>
        </div>
    </div>
</div>
