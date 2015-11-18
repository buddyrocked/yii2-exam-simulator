<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Subject;

/* @var $this yii\web\View */
/* @var $model backend\models\Subject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-form">

    <?php $form = ActiveForm::begin([
                                    'id' => 'dynamic-form',
                                    ]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'status')->widget(Select2::className(),  [
                'data' => ['0'=>'Live', '1'=>'Demo'],
                'options'=>['placeholder'=>'Choose Exam Mode'],
                'pluginOptions'=>[
                'allowClear'=>true 
            ]
            ]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'explain_mode')->widget(Select2::className(),  [
                'data' => ['0'=>'Hide', '1'=>'Show'],
                'options'=>['placeholder'=>'Choose Explain Mode'],
                'pluginOptions'=>[
                'allowClear'=>true 
            ]
            ]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'timer_mode')->widget(Select2::className(),  [
                'data' => ['0'=>'No Timer', '1'=>'Timer per Exam', '2'=>'Timer per Question'],
                'options'=>['placeholder'=>'Choose Timer Mode'],
                'pluginOptions'=>[
                'allowClear'=>true 
            ]
            ]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'random_method')->widget(Select2::className(),  [
                'data' => ['0'=>'Whole Random', '1'=>'Domain Based Allocation'],
                'options'=>['placeholder'=>'Choose Random Domain'],
                'pluginOptions'=>[
                'allowClear'=>true 
            ]
            ]) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'desc')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'plugins' => ['clips', 'fontcolor','imagemanager', 'fontfamily', 'fontsize', 'table', 'filemanager', 'fullscreen']
                ]
            ])?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'question_number')->input('number', ['min'=>'0', 'max'=>'5000']); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'minimum_score')->input('number', ['min'=>'0', 'max'=>'100']); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'time')->input('number', ['min'=>'0', 'max'=>'7200']); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'true')->input('number', ['min'=>'0', 'max'=>'2']); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'false')->input('number', ['min'=>'0', 'max'=>'2']); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'blank')->input('number', ['min'=>'0', 'max'=>'2']); ?>
        </div>
        <?php if($model->isNewRecord): ?>
        <div class="col-md-12">
            <h3>Domain</h3>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="">
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 10, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $modelsDomain[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'name',
                        'percentage',
                    ],
                ]); ?>

                <div class="row container-items"><!-- widgetContainer -->
                <?php foreach ($modelsDomain as $i => $modelDomain): ?>
                    <div class="col-md-12 item"><!-- widgetBody -->
                        
                            <?php
                                // necessary for update action.
                                if (! $modelDomain->isNewRecord) {
                                    echo Html::activeHiddenInput($modelDomain, "[{$i}]id");
                                }
                            ?>
                            <div class="row">
                                <div class="col-sm-4">
                                    <?= $form->field($modelDomain, '['.$i.']name')->textInput(['maxlength' => true]) ?>
                                </div>
                                
                                <div class="col-sm-2">
                                    <?= $form->field($modelDomain, '['.$i.']percentage')->input('number', ['min'=>'0', 'max'=>'100']); ?>
                                </div>
                                <div class="col-sm-5">
                                    <?= $form->field($modelDomain, '['.$i.']desc')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-1">                                
                                    <br /><br />
                                    <button type="button" class="add-item btn btn-info btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                </div>
                            </div>
                    </div>
                <?php endforeach; ?>
                </div>
            <?php DynamicFormWidget::end(); ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="col-md-12">
            <div class="form-group form-action well">
            	<?= Html::a('<i class="fa fa-remove"></i> Cancel', ['index'], ['class' => 'btn btn-danger outline']) ?>
                <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Create' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-danger outline' : 'btn btn-danger outline']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
