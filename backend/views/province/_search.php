<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Province;

/* @var $this yii\web\View */
/* @var $model backend\models\ProvinceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="province-search well">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
    <div class="col-md-5">
            <?= $form->field($model, 'name')->widget(Select2::className(),  [
                'data' => ArrayHelper::map(Province::find()->all(), 'id', 'name'),
                'options'=>['placeholder'=>'Choose Name'],
                'pluginOptions'=>[
                   'allowClear'=>true 
                ],
                'pluginEvents'=>[
                    
                ]
            ]) ?>
    </div>
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
