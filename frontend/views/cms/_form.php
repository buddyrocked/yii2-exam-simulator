<?php

use yii\helpers\Html;
use yii\web\View;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\ArticleSource;
use backend\models\Source;
use backend\models\Tag;
use yii\web\JsExpression;
use kartik\widgets\FileInput;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-form">

    <?php $form = ActiveForm::begin([
                                    'id' => 'dynamic-form',
                                    'options' => [
                                                    'enctype' => 'multipart/form-data'
                                                ]
                                ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(), [
        'clientOptions' => [
            'plugins' => ['clips', 'fontcolor','imagemanager', 'fontfamily', 'fontsize', 'table', 'filemanager', 'fullscreen'],
            'rows'=>20,
            'minHeight'=>500
        ],

    ])?>

    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
            ]); ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'type')->widget(Select2::className(),  [
                'data' => ['1'=>'latest issue', '2'=>'training', '3'=>'services', '4'=>'events', '5'=>'product', '6'=>'client', '7'=>'partner', '8'=>'others'],
                'options'=>['placeholder'=>'Choose Type'],
                'pluginOptions'=>[
                   'allowClear'=>true 
                ]
            ]) ?>
        </div>
        <div class="col-md-2">            
            <?= $form->field($model, 'is_html')->widget(SwitchInput::classname(), []); ?>
        </div>
    </div>
    <div class="form-group form-action">
    	<?= Html::a('<i class="fa fa-remove"></i> Cancel', ['index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Create' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-danger ' : 'btn btn-danger ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
