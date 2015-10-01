<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Profile;


/* @var $this yii\web\View */
/* @var $model backend\models\ProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-search well">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
    <div class="col-md-5">
            <?= $form->field($model, 'first_name')->widget(Select2::className(),  [
                'data' => ArrayHelper::map(Profile::find()->all(), 'id', 'first_name'),
                'options'=>['placeholder'=>'Choose Name'],
                'pluginOptions'=>[
                   'allowClear'=>true 
                ],
                'pluginEvents'=>[
                    
                ]
            ]) ?>
    </div>
    <?php // echo $form->field($model, 'display_surname_preference') ?>

    <?php // echo $form->field($model, 'suffix') ?>

    <?php // echo $form->field($model, 'gender_id') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'pob') ?>

    <?php // echo $form->field($model, 'job') ?>

    <?php // echo $form->field($model, 'street1') ?>

    <?php // echo $form->field($model, 'street2') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'province_id') ?>

    <?php // echo $form->field($model, 'country_id') ?>

    <?php // echo $form->field($model, 'postal_code') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'photo') ?>

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
