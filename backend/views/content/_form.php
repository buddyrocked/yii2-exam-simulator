<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\SwitchInput;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?php $form = ActiveForm::begin([
                                    'id'=>'dynamic-form',
                                    'options'=>[
                                                    'enctype' => 'multipart/form-data'
                                                ]

                                    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'plugins' => ['clips', 'fontcolor','imagemanager', 'fontfamily', 'fontsize', 'table', 'filemanager', 'fullscreen']
                    ]
                ]) ?>
    <div class="col-md-6">
    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]); ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'type')->widget(Select2::className(),  [
                                                                            'data' => ['0'=>'Intro', '1'=>'Process', '2'=>'Features', '3'=>'Advantages'],
                                                                            'options'=>['placeholder'=>'Choose Type'],
                                                                            'pluginOptions'=>[
                                                                               'allowClear'=>true 
                                                                            ]
                                                                        ]) ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'is_html')->widget(SwitchInput::classname(), []); ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'status')->widget(Select2::className(),  [
                                                                            'data' => ['0'=>'UnPublish', '1'=>'Publish'],
                                                                            'options'=>['placeholder'=>'Choose Status'],
                                                                            'pluginOptions'=>[
                                                                               'allowClear'=>true 
                                                                            ]
                                                                        ]) ?>
    </div>
    <div class="form-group form-action">
    	<?= Html::a('<i class="fa fa-remove"></i> Cancel', ['index'], ['class' => 'btn btn-danger outline']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Create' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-danger outline' : 'btn btn-danger outline']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>