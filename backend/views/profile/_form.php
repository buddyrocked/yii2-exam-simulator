<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Gender;
use backend\models\Prefix;
use backend\models\Province;
use backend\models\Country;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin([
                                    'id' => 'dynamic-form',
                                    'options' => [
                                                    'enctype' => 'multipart/form-data'
                                                ]
                                ]); ?>
    <div class="row">
        
        <hr />
        <div class="col-md-6">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'display_surname_preference')->widget(Select2::className(),  [
                                                                            'data' => ['0'=>'(surname) (first name)', '1'=>'(first name) (surname)'],
                                                                            'options'=>['placeholder'=>'Choose reference'],
                                                                            'pluginOptions'=>[
                                                                               'allowClear'=>true 
                                                                            ]
                                                                        ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'suffix')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'pob')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'dob')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Date of Birth'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'gender_id')->widget(Select2::className(),  [
                                                                            'data' => ArrayHelper::map(Gender::find()->all(), 'id', 'name'),
                                                                            'options'=>['placeholder'=>'Choose gender'],
                                                                            'pluginOptions'=>[
                                                                               'allowClear'=>true 
                                                                            ]
                                                                        ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'job')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'status')->widget(Select2::className(),  [
                                                                            'data' => ['0'=>'Non Active', '1'=>'Active'],
                                                                            'options'=>['placeholder'=>'Choose Status'],
                                                                            'pluginOptions'=>[
                                                                               'allowClear'=>true 
                                                                            ]
                                                                        ]) ?>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'street1')->textArea(['row' => 3]) ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'street2')->textArea(['row' => 3]) ?>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'province_id')->widget(Select2::className(),  [
                                                                                            'data' => ArrayHelper::map(Province::find()->all(), 'id', 'name'),
                                                                                            'options'=>['placeholder'=>'Choose Province'],
                                                                                            'pluginOptions'=>[
                                                                                               'allowClear'=>true 
                                                                                            ]
                                                                                        ]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'country_id')->widget(Select2::className(),  [
                                                                                            'data' => ArrayHelper::map(Country::find()->all(), 'id', 'name'),
                                                                                            'options'=>['placeholder'=>'Choose Country'],
                                                                                            'pluginOptions'=>[
                                                                                               'allowClear'=>true 
                                                                                            ]
                                                                                        ]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-md-6">
                        <?= $form->field($model, 'photo')->widget(FileInput::classname(), [
                                'options' => ['accept' => 'image/*'],
                        ]); ?>
                        <span>6x4cm & jpg/jpeg</span>
                        
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group form-action well">
                <?= Html::a('<i class="fa fa-remove"></i> Cancel', ['index'], ['class' => 'btn btn-danger outline']) ?>
                <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Create' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-danger outline' : 'btn btn-danger outline']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
