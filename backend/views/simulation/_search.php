<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SimulationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="simulation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'duration') ?>

    <?= $form->field($model, 'timer_mode') ?>

    <?php // echo $form->field($model, 'start') ?>

    <?php // echo $form->field($model, 'finish') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'score') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
