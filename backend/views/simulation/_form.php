<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Subject;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Simulation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="simulation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= //$form->field($model, 'user_id')->textInput() ?>
<div class="row">
    <div class="col-sm-6">
            <?= $form->field($model, 'subject_id')->widget(Select2::className(),  [
                                                                            'data' => ArrayHelper::map(Subject::find()->all(), 'id', 'organizaton_name'),
                                                                            'options'=>[
                                                                                'placeholder'=>'Choose Subject',
                                                                                
                                                                            ],
                                                                            'pluginOptions'=>[
                                                                               'allowClear'=>true 
                                                                            ]
                                                                        ]) ?>
    </div>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'timer_mode')->textInput() ?>

    <?= $form->field($model, 'start')->textInput() ?>

    <?= $form->field($model, 'finish')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'score')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'updated')->textInput() ?>

    <div class="form-group form-action">
    	<?= Html::a('<i class="fa fa-remove"></i> Cancel', ['index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Create' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-danger outline' : 'btn btn-danger outline']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
