<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use backend\models\Subject;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\SimulationSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div>&nbsp;</div>
<div class="simulation-search well">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
    <div class="col-md-5">
            <?= $form->field($model, 'subject_id')->widget(Select2::className(),  [
                'data' => ArrayHelper::map(Subject::find()->all(), 'id', 'id_subject'),
                'options'=>['placeholder'=>'Choose Subject'],
                'pluginOptions'=>[
                   'allowClear'=>true 
                ],
                'pluginEvents'=>[
                    
                ]
            ]) ?>
        </div>
    <div class="col-md-5">
            <?= $form->field($model, 'timer_mode')->widget(Select2::className(),  [
                        'data' => ArrayHelper::map(Subject::find()->all(), 'id', 'timer_mode'),
                        'options'=>['placeholder'=>'Choose Timer Mode'],
                        'pluginOptions'=>[
                           'allowClear'=>true 
                        ],
                        'pluginEvents'=>[
                            
                        ]
                    ]) ?>
    </div>
    
    <?php // echo $form->field($model, 'timer_mode') ?>
   
    <?php // echo $form->field($model, 'start') ?>

    <?php // echo $form->field($model, 'finish') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'score') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>
    <div class="col-md-2">
    <div>&nbsp;</div>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
