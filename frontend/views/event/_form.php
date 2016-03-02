<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use kartik\widgets\FileInput;
use kartik\widgets\SwitchInput;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin([
                                    'id' => 'dynamic-form',
                                    'options' => [
                                                    'enctype' => 'multipart/form-data'
                                                ]
                                ]); ?>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::className(), [
                    'clientOptions' => [
                        'plugins' => ['clips', 'fontcolor','imagemanager', 'fontfamily', 'fontsize', 'table', 'filemanager', 'fullscreen'],
                        'rows'=>20,
                        'minHeight'=>150
                    ],

                ])?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'note')->widget(\yii\redactor\widgets\Redactor::className(), [
                    'clientOptions' => [
                        'plugins' => ['clips', 'fontcolor','imagemanager', 'fontfamily', 'fontsize', 'table', 'filemanager', 'fullscreen'],
                        'rows'=>20,
                        'minHeight'=>150
                    ],

                ])?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'datetime')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Enter event time ...'],
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'venue')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'address')->widget(\yii\redactor\widgets\Redactor::className(), [
                    'clientOptions' => [
                        'plugins' => ['clips', 'fontcolor','imagemanager', 'fontfamily', 'fontsize', 'table', 'filemanager', 'fullscreen'],
                        'rows'=>20,
                        'minHeight'=>150
                    ],

                ])?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*'],
                ]); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                        'options' => ['accept' => '*'],
                ]); ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'published')->widget(SwitchInput::classname(), []); ?>
            </div>
            <div class="col-md-2">            
                <?= $form->field($model, 'popup')->widget(SwitchInput::classname(), []); ?>
            </div>
            <div class="col-md-12">
                <div class="form-group form-action well">
                	<?= Html::a('<i class="fa fa-remove"></i> Cancel', ['index'], ['class' => 'btn btn-danger outline']) ?>
                    <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Create' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-danger outline' : 'btn btn-danger outline']) ?>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
