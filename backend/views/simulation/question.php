<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\checkbox\CheckboxX;

$this->title = 'Exam Simulator';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-content first-content" id="index-content">
    <?php $form = ActiveForm::begin([
                                    'id' => 'form-question',
                                    'options'=>[
                                        'class'=>'form-ajax-question',
                                    ]
                            ]); ?>
	<div class="row">    
        <div class="col-md-8">
            <div class="list-task-progressx">
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-value="<?= Html::encode($model->simulation->getPercentProgress()); ?>" style="width: 0%;">
                        <span class=""><?= $model->simulation->getPercentProgress(); ?>%</span>
                    </div>
                </div>
            </div>
            <div class="container-menu">
                <div class="upper-menu">
                    <div class="upper-menu-title">
                        &nbsp;Question No. <?= $model->number; ?> / <?= $model->simulation->getSimulationQuestions()->count(); ?>
                    </div>
                </div>
                <div class="middle-menu bg-white">
                    <div class="row">
                        <?php if(isset($model->question->passage)): ?>
                            <div class="col-md-12">
                                <div><label>Passage : </label></div>
                                <div class="well bg-white">
                                    <?= Html::decode($model->question->passage->desc); ?>
                                </div>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                        <?php endif; ?>
                        <div class="col-md-12">
                            <div><label>Statement : </label></div>
                            <div class="well bg-white">
                            <?php
                            if($model->question->type==1){
                                echo Html::decode($model->question->question);
                            }
                            elseif ($model->question->type==2) {
                                echo \wbraganca\videojs\VideoJsWidget::widget([
                                        'options' => [
                                            'class' => 'video-js vjs-default-skin vjs-big-play-centered',
                                            //'poster' => "http://www.videojs.com/img/poster.jpg",
                                            'controls' => true,
                                            'preload' => 'auto',
                                            'width' => '970',
                                            'height' => '400',
                                        ],
                                        'tags' => [
                                            'source' => [
                                                ['src' => Yii::getAlias('@web').'/uploads/video_audio/'.$model->question->file, 'type' => 'video/mp4'],
                                            ],
                                            'track' => [
                                                ['kind' => 'captions', 'src' =>  Yii::getAlias('@web').'/uploads/video_audio/'.$model->question->file, 'srclang' => 'en', 'label' => 'English']
                                            ]
                                        ]
                                ]);
                            }
                            else{
                                echo \wbraganca\videojs\VideoJsWidget::widget([
                                        'options' => [
                                            'class' => 'video-js vjs-default-skin vjs-big-play-centered',
                                            //'poster' => "http://www.videojs.com/img/poster.jpg",
                                            'controls' => true,
                                            'preload' => 'auto',
                                        ],
                                        'tags' => [
                                            'source' => [
                                                ['src' => Yii::getAlias('@web').'/uploads/video_audio/'.$model->question->file, 'type' => 'audio/mp3'],
                                            ],
                                            'track' => [
                                                ['kind' => 'captions', 'src' =>  Yii::getAlias('@web').'/uploads/video_audio/'.$model->question->file, 'srclang' => 'en', 'label' => 'English']
                                            ]
                                        ]
                                ]);
                            }
                            ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr />
                            <div class="">
                                <?php
                                    if($model->question->getQuestionRightOptions()->count() == 1):
                                        echo $form->field($modelsAnswer, 'question_option_id')->radioList(
                                                                                                            ArrayHelper::map($model->question->questionOptions, 'id', 'option'),
                                                                                                            [
                                                                                                                    'item'=>function($index, $label, $name, $checked, $value)use($model){
                                                                                                                        $rights = ArrayHelper::getColumn($model->question->getQuestionRightOptions()->select(['id'])->asArray()->all(), 'id');
                                                                                                                        $right = (($model->simulation->is_dummy) && (in_array($value, $rights)))?'':'radio';
                                                                                                                        return '<div class="'.$right.'">'.Html::radio($name, $checked, [
                                                                                                                           'value' => $value,
                                                                                                                           'label' => $label,
                                                                                                                           'class' => ''
                                                                                                                        ]).'</div>';
                                                                                                                    }
                                                                                                                ]
                                                                                                        );
                                    else:
                                        $modelsAnswer->question_option_id = ArrayHelper::getColumn($model->getSimulationQuestionAnswers()->select(['question_option_id'])->asArray()->all(), 'question_option_id');
                                        echo $form->field($modelsAnswer, 'question_option_id')->checkboxList(
                                                                                                                ArrayHelper::map($model->question->questionOptions, 'id', 'option'),
                                                                                                                [
                                                                                                                    'item'=>function($index, $label, $name, $checked, $value)use($model){
                                                                                                                        $rights = ArrayHelper::getColumn($model->question->getQuestionRightOptions()->select(['id'])->asArray()->all(), 'id');
                                                                                                                        $right = (($model->simulation->is_dummy) && (in_array($value, $rights)))?'':'checkbox';
                                                                                                                        return '<div class="'.$right.'">'.Html::checkbox($name, $checked, [
                                                                                                                           'value' => $value,
                                                                                                                           'label' => $label,
                                                                                                                           'class' => ''
                                                                                                                        ]).'</div>';
                                                                                                                    }
                                                                                                                ]
                                                                                                            );
                                       
                                    endif;
                                ?>
                            </div>
                            <hr />
                            <div>
                            <?php
                                if($model->simulation->timer_mode == 0 || $model->simulation->timer_mode == 1):
                                    echo CheckboxX::widget([
                                        'name'=>'mark',
                                        'disabled'=>false,
                                        'value'=>($model->status == 2)?1:0,
                                        'options'=>['id'=>'mark'],
                                        'pluginOptions'=>['threeState'=>false, 'size'=>'sm']
                                    ]);
                                    echo '<label class="cbx-label" for="mark" checked>Mark this question.</label>';
                                else:
                                    echo CheckboxX::widget([
                                        'name'=>'mark',
                                        'disabled'=>true,
                                        'options'=>['id'=>'mark'],
                                        'pluginOptions'=>['threeState'=>false, 'size'=>'sm']
                                    ]);
                                    echo '<label class="cbx-label" for="mark" checked>Mark this question.</label>';
                                endif;
                            ?>
                            <a href="#" class="btn btn-danger pull-right" id="clear-answer"><i class="fa fa-times"></i>Clear</a>
                            <?php if($model->simulation->timer_mode == 0): ?>
                            <?php endif; ?>
                            </div>
                            <hr />
                            <div class="text-bold">
                                    <?= $model->simulationDomain->domain->name; ?>
                                
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
                                if($model->simulation->timer_mode == 1): 
                                    $diff = ($model->simulation->duration * 60) - (strtotime((string)$model->simulation->timer) - (strtotime((string)$model->simulation->start) - (strtotime((string)date('H:i:s')) - strtotime((string)Yii::$app->session->get('simulation_'.$model->simulation->id)))));
                                    $time = $model->convertSecondstoTimes($diff);
                            ?>
                                <div class="well">
                                    <h1 class="text-center bebas text-bold" id="timer-question" data-timer="<?= $time; ?>"></h1>
                                </div>
                            <?php 
                                elseif($model->simulation->timer_mode == 2): 
                                    $diff = ($model->question->time * 60) - (strtotime((string)$model->simulation->timer) - strtotime((string)Yii::$app->session->get($model->simulation->id.'_'.$model->id)));
                                    $time = $model->convertSecondstoTimes($diff);
                            ?>
                                <div class="well">
                                    <h1 class="text-center bebas text-bold" id="timer-question" data-timer="<?= $time; ?>"></h1>
                                </div>
                            <?php 
                                elseif($model->simulation->timer_mode == 3): 
                                    $diff = ($model->question->time * 60) - (strtotime((string)date('H:i:s')) - strtotime((string)Yii::$app->session->get($model->simulation->id.'_'.$model->id)));
                                    $time = $model->convertSecondstoTimes($diff);

                                    $diff2 = ($model->simulation->duration * 60) - (strtotime((string)date('H:i:s')) - strtotime((string)Yii::$app->session->get('simulation_'.$model->simulation->id)));
                                    $time2 = $model->convertSecondstoTimes($diff2);
                            ?>
                                <div class="well">
                                    <h1 class="text-center bebas text-bold" id="timer-question" data-timer="<?= $time; ?>"></h1>         
                                </div>
                                <div class="well">
                                    <h1 class="text-center bebas text-bold" id="timer-question2" data-timer="<?= $time2; ?>"><?= gmdate('H:i:s', $diff2); ?></h1>         
                                </div>
                            <?php else: ?>
                                <div class="well">
                                    <h1 class="text-center bebas text-bold">No Timer</h1>
                                </div>
                            <?php endif; ?>
                            <hr />
                            <div class="">
                                <div class="">
                                    <?php
                                        if(($model->simulation->timer_mode == 0 || $model->simulation->timer_mode == 1) && $modelPrev != null):
                                            echo Html::a('<i class="fa fa-chevron-left"></i> Back', ['back', 'id'=>$model->simulation->id, 'question'=>$model->id], ['class' => 'btn-lg btn btn-success']); 
                                        else:
                                            echo Html::a('<i class="fa fa-chevron-left"></i> Back', ['back', 'id'=>$model->simulation->id, 'question'=>$model->id], ['class' => 'btn-lg btn btn-success disabled']); 
                                        endif;
                                    ?>
                                    
                                    <?= Html::submitButton(($modelNext != null)? 'Next <i class="fa fa-chevron-right"></i>' : 'Finish  <i class="fa fa-chevron-right"></i>', ['class' => 'btn-lg btn btn-success pull-right', 'data' => [
                                                'method' => 'post',
                                            ]
                                    ]) ?>
                                </div>
                            </div>
                                
                                <hr />
                                <?php
                                    if($model->simulation->timer_mode == 0 || $model->simulation->timer_mode == 1):
                                        echo Html::submitButton('<i class="fa fa-eye"></i> Review Answer Sheet', ['class' => 'btn-lg btn btn-success btn-block', 'name'=> 'review', 'value' => 1, 'data' => [
                                                    'method' => 'post',
                                                ]
                                        ]);
                                        //echo Html::a('<i class="fa fa-eye"></i> Review Answer Sheet', ['review', 'id'=>$model->simulation->id, 'question'=>$model->id], ['class' => 'btn btn-success btn-block btn-lg']);
                                    else:
                                        echo Html::a('<i class="fa fa-eye"></i> Finish', ['postfinish', 'id'=>$model->simulation->id], ['class' => 'btn btn-success btn-block btn-lg', 'data' => [
                                        'confirm' => 'Are you sure you want to finish this exam?',
                                        'method' => 'post',
                                        ]
                                        ]);
                                    endif;
                                ?>

                                <?php //Html::a('<i class="fa fa-eye"></i> Review Answer Sheet', ['review', 'id'=>$model->simulation->id], ['class' => 'btn btn-success btn-block btn-lg']); ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

