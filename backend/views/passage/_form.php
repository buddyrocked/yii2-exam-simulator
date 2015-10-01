<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Passage;

/* @var $this yii\web\View */
/* @var $model backend\models\Passage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="passage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <div class="form-group form-action">
    	<?= Html::a('<i class="fa fa-remove"></i> Cancel', ['index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Create' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-danger outline' : 'btn btn-danger outline']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
