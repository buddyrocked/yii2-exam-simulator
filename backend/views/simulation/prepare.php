<?php
/* @var $this yii\web\View */
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use backend\components\EasyThumbnailImage;

$this->title = 'Exam Simulator';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prepare first-content" id="index-content">
<div class="container">
	<div class="row">    
        <div class="col-md-8"> 
            <div class="container-menu">
                <div class="upper-menu">
                    <div class="upper-menu-title">
                        Simulation Detail
                    </div>
                </div>
                <div class="middle-menu bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h1 class="bebas"><?= $model->name; ?></h1>
                                </div>
                                <div class="col-md-2">
                                    <div class="wellx text-center">
                                        <h2 class="text-bold bebas"><?= $model->question_number; ?></h2>
                                        <div>Questions</div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="wellx text-center">
                                        
                                        <?php if($model->timer_mode == 0): ?>
                                            <h2 class="text-bold bebas">NO</h2>
                                            No Timer
                                         <?php else: ?>
                                            <h2 class="text-bold bebas"><?= $model->time; ?></h2>
                                            Minutes
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-12">
                            <label>Description : </label>
                            <div class="well">
                                <?= Html::decode($model->desc); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <?php foreach ($model->domains as $domain): ?>
                                <label><?= $domain->name; ?> (<?= $domain->percentage; ?>%)</label>
                                <div><?= $domain->desc; ?></div> <div>&nbsp;</div>
                            <?php endforeach; ?><br />
                                                   
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
                            <label>Timer : </label>
                            <div class="well">
                                <h1 class="text-center bebas text-bold"><?= $model->convertToHoursMins($model->timer_mode, '%02d:%02d:00'); ?></h1>
                            </div>
                            <?php
                                if(sizeof($model->getQuestionForSimulations()) >= $model->question_number):
                                    echo Html::a('<i class="fa fa-check"></i> Start your exam', ['start', 'id' => $model->id], [
                                        'class' => 'btn btn-danger btn-block btn-lg',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to start exam simulation?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                else:
                                    /*echo Html::a('<i class="fa fa-times"></i> Cannot take this exam', '#', [
                                        'class' => 'btn btn-danger btn-block btn-lg',
                                        'data' => [
                                            'confirm' => 'We are sorry, The questtions is not enough for exam simulation.',
                                            
                                        ],
                                    ]);*/
                                     echo Html::a('<i class="fa fa-check"></i> Start your exam', ['start', 'id' => $model->id], [
                                        'class' => 'btn btn-danger btn-block btn-lg',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to start exam simulation?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                endif;

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

