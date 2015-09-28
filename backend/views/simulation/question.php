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
                                    'id' => 'dynamic-form',
                                    'options'=>[
                                        'class'=>'form-ajax-question',
                                    ]
                            ]); ?>
	<div class="row">    
        <div class="col-md-8"> 
            <div class="container-menu">
                <div class="upper-menu">
                    <div class="upper-menu-title">
                        &nbsp;Question
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
                                <?= Html::decode($model->question->question); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr />
                            <div class="">

                                <?php
                                    if($model->question->getQuestionRightOptions()->count() == 1):
                                        echo $form->field($modelsAnswer, 'question_option_id')->radioList(ArrayHelper::map($model->question->questionOptions, 'id', 'option'));
                                    else:
                                        echo $form->field($modelsAnswer, 'question_option_id')->checkboxList(ArrayHelper::map($model->question->questionOptions, 'id', 'option'));
                                    endif;
                                ?>
                            </div>
                            <hr />
                            <div>
                            <?php
                                echo CheckboxX::widget([
                                    'name'=>'mark',
                                    'options'=>['id'=>'mark'],
                                    'pluginOptions'=>['threeState'=>false, 'size'=>'sm']
                                ]);
                                echo '<label class="cbx-label" for="mark">Mark as unsure answer.</label>';
                            ?>
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
                                <h1 class="text-center bebas text-bold"><?= $model->simulation->subject->convertToHoursMins($model->simulation->subject->time, '%02d:%02d:00'); ?></h1>
                            </div>
                            <?= Html::submitButton($modelsAnswer->isNewRecord ? '<i class="fa fa-check"></i> Submit Answer' : '<i class="fa fa-save"></i> Update Answer', ['class' => 'btn-lg btn-block btn btn-danger', 'data' => [
                                        'method' => 'post',
                                    ]
                            ]) ?>
                            <hr />
                            <a href="#" class="btn btn-danger btn-lg btn-block" id="clear-answer"><i class="fa fa-times"></i> Reset Answer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

