<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Passage;
use backend\models\Source;
use backend\models\Domain;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-12">
    <div class="question-form">
    <?php $form = ActiveForm::begin([
                                    'id' => 'dynamic-form',
                                    'options'=>[
                                        'class'=>'form-ajax-modal',
                                    ]
                            ]); ?>
    <div class="row">
        <div class="col-sm-4">
            <?php \yii\widgets\Pjax::begin(['id'=>'pjax-passage']); ?>
            <?= $form->field($modelQuestion, 'passage_id')->widget(Select2::className(),  [
                                                                'data' => ArrayHelper::map(Passage::find()->all(), 'id', 'name'),
                                                                'options'=>['placeholder'=>'Choose Passage'],
                                                                'pluginOptions'=>[
                                                                   'allowClear'=>true 
                                                                ],
                                                                'pluginEvents'=>[
                                                                    "change"=>"function(){
                                                                        var id = $('#question-passage_id option:selected').val();
                                                                        $.ajax({
                                                                            'url':'".Url::to(['passage/getone'])."',
                                                                            'data':{id:id},
                                                                            'success':function(data){
                                                                                $('#response-address').html(data);
                                                                            }
                                                                        });
                                                                    }"
                                                                ],
                                                                'addon' => [
                                                                    'append' => [
                                                                        'content' => Html::a('<i class="fa fa-plus"></i>', ['/passage/add'], [
                                                                            'class' => 'btn btn-danger btn-modal', 
                                                                            'title' => 'Create new passage', 
                                                                            'data-toggle' => 'tooltip'
                                                                        ]),
                                                                        'asButton' => true
                                                                    ]
]
                                                            ]) ?>

             <div id="response-address"></div>
            <?php \yii\widgets\Pjax::end(); ?>
        </div>
        <div class="col-sm-4">
                                                            <?php \yii\widgets\Pjax::begin(['id'=>'pjax-source']); ?>
                                                            <?= $form->field($modelQuestion, 'source_id')->widget(Select2::className(),  [
                                                                                                                'data' => ArrayHelper::map(Source::find()->all(), 'id', 'name'),
                                                                                                                'options'=>['placeholder'=>'Choose Source'],
                                                                                                                'pluginOptions'=>[
                                                                                                                   'allowClear'=>true 
                                                                                                                ],
                                                                                                                'pluginEvents'=>[
                                                                                                                    "change"=>"function(){
                                                                                                                        var id = $('#question-source_id option:selected').val();
                                                                                                                        $.ajax({
                                                                                                                            'url':'".Url::to(['source/getone'])."',
                                                                                                                            'data':{id:id},
                                                                                                                            'success':function(data){
                                                                                                                                $('#response-address1').html(data);
                                                                                                                            }
                                                                                                                        });
                                                                                                                    }"
                                                                                                                ],
                                                                                                                'addon' => [
                                                                                                                    'append' => [
                                                                                                                        'content' => Html::a('<i class="fa fa-plus"></i>', ['/source/add'], [
                                                                                                                            'class' => 'btn btn-danger btn-modal', 
                                                                                                                            'title' => 'Create new source', 
                                                                                                                            'data-toggle' => 'tooltip'
                                                                                                                        ]),
                                                                                                                        'asButton' => true
                                                                                                                    ]
    ]
                                                                                                            ]) ?>

                                                             <div id="response-address1"></div>
                                                            <?php \yii\widgets\Pjax::end(); ?>
                                                            
                                                        </div>
        <div class="col-sm-1">
             <?= $form->field($modelQuestion, 'level')->widget(Select2::className(),  [
                                                                'data' => ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'],
                                                                'options'=>['placeholder'=>'Choose Level'],
                                                                'pluginOptions'=>[
                                                                   'allowClear'=>true 
                                                                ],
                                                            ]) ?>
        </div>                                                        
        <div class="col-sm-1">
            <?= $form->field($modelQuestion, 'time')->textInput() ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($modelQuestion, 'is_random')->widget(SwitchInput::classname(), []); ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($modelQuestion, 'question')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'plugins' => ['clips', 'fontcolor','imagemanager', 'fontfamily', 'fontsize', 'table', 'filemanager', 'fullscreen']
                ]
            ])?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($modelQuestion, 'explaination')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'plugins' => ['clips', 'fontcolor','imagemanager', 'fontfamily', 'fontsize', 'table', 'filemanager', 'fullscreen']
                ]
            ])?>
        </div>
        <div class="col-md-12">
            <h3>domains</h3>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="">
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper3', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items3', // required: css class selector
                    'widgetItem' => '.item3', // required: css class
                    'limit' => 2, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item3', // css class
                    'deleteButton' => '.remove-item3', // css class
                    'model' => $modelsDomain[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'domain_id',
                    ],
                ]); ?>

                <div class="row container-items3"><!-- widgetContainer -->
                <?php foreach ($modelsDomain as $x => $modelDomain): ?>
                    <div class="col-md-3 item3"><!-- widgetBody -->                                                                        
                        <?php
                            // necessary for update action.
                            if (! $modelDomain->isNewRecord) {
                                echo Html::activeHiddenInput($modelDomain, "[{$x}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-md-10">
                                <?= $form->field($modelDomain, '['.$x.']domain_id')->widget(Select2::className(),  [
                                                                'data' => ArrayHelper::map(Domain::find()->where(['subject_id'=>$modelQuestion->subject_id])->all(), 'id', 'name'),
                                                                'options'=>['placeholder'=>'Choose Domain'],
                                                                'pluginOptions'=>[
                                                                   'allowClear'=>true 
                                                                ]
                                                            ]);
                                ?>
                            </div>
                            <div class="col-md-2">
                                <div>&nbsp;</div>
                                <button type="button" class="add-item3 btn btn-info btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                <button type="button" class="remove-item3 btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            <?php DynamicFormWidget::end(); ?>
            </div>
        </div>
        <div class="col-md-12">
            <h3>options</h3>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="">
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 10, // the maximum times, an element can be cloned (default 999)
                    'min' => 4, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $modelsOption[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'option',
                        'is_coreect',
                        'answer'
                    ],
                ]); ?>

                <div class="row container-items"><!-- widgetContainer -->
                <?php foreach ($modelsOption as $i => $modelOption): ?>
                    <div class="col-md-12 item"><!-- widgetBody -->
                        
                            <?php
                                // necessary for update action.
                                if (! $modelOption->isNewRecord) {
                                    echo Html::activeHiddenInput($modelOption, "[{$i}]id");
                                }
                            ?>
                            <div class="row">
                                <div class="col-sm-4">
                                    <?= $form->field($modelOption, '['.$i.']option')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-2">
                                    <label>&nbsp;</label>
                                    <?= $form->field($modelOption, '['.$i.']is_correct')->checkbox(['class'=>'checkbox-answer']); ?>
                                </div>

                                <div class="col-sm-5">
                                    <?= $form->field($modelOption, '['.$i.']answer')->textArea(['maxlength' => true]) ?>
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
        <div class="col-sm-12">
            <div class="form-group form-action well">
                <?= Html::submitButton($modelQuestion->isNewRecord ? '<i class="fa fa-save"></i> Create' : '<i class="fa fa-save"></i> Update', ['class' => $modelQuestion->isNewRecord ? 'btn btn-danger outline' : 'btn btn-danger outline']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>