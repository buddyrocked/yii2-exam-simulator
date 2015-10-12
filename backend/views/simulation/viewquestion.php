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
        <div class="col-md-12">
            <div class="list-task-progressx">
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-value="<?= Html::encode($model->simulation->getPercent()); ?>" style="width: 0%;">
                        <span class=""><?= $model->simulation->getPercent(); ?>%</span>
                    </div>
                </div>
            </div>
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
                                        echo $form->field($modelsAnswer, 'question_option_id')->radioList(
                                                                                                            ArrayHelper::map($model->question->questionOptions, 'id', 'option'),
                                                                                                            [
                                                                                                                    'item'=>function($index, $label, $name, $checked, $value)use($model){
                                                                                                                        $rights = ArrayHelper::getColumn($model->question->getQuestionRightOptions()->select(['id'])->asArray()->all(), 'id');
                                                                                                                        $right = (in_array($value, $rights))?'':'radio';
                                                                                                                        $myAnswer = $model->getMyAnswers()->one();
                                                                                                                        $icon = ($myAnswer['question_option_id'] == $value)?'<i class="fa fa-arrow-left"></i> Your answer':'';
                                                                                                                        return '<div class="'.$right.'">'.Html::radio($name, $checked, [
                                                                                                                           'value' => $value,
                                                                                                                           'label' => $label.' '.$icon,
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
                            
                            <div class="text-bold">
                                    <?= $model->simulationDomain->domain->name; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <?php ActiveForm::end(); ?>
</div>

