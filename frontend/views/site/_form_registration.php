<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\EventRegistration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-registration-form">

    <?php $form = ActiveForm::begin(); ?>
    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab"><i class="fa fa-male"></i> Personal</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="personal">
                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-12">
                        <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'registered_by')->widget(Select2::className(),  [
                            'data' => ['0'=>'Personal', '1'=>'Company'],
                            'options'=>['placeholder'=>'Choose Type'],
                            'pluginOptions'=>[
                               'allowClear'=>true 
                            ],
                            'pluginEvents'=>[
                                'change'=>"function(){
                                    if($('#eventregistration-registered_by').val() == 1){
                                        $('#company-container').show();
                                    }else{
                                        $('#company-container').hide();
                                    }
                                }"
                            ]
                        ]) ?>
                    </div>
                </div>

                <div id="company-container" style="display:none;">
                    <div>&nbsp;</div>
                    <label>If registered by company</label>
                    <hr />
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'job_title')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-8">
                            <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'company_address')->textarea(['rows' => 6]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'company_phone')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'company_fax')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'approved_by')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'designation')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group form-action">
        <hr />
    	<?= Html::a('<i class="fa fa-remove"></i> Cancel', ['index'], ['class' => 'btn btn-danger outline']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Create' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-danger outline' : 'btn btn-danger outline']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
