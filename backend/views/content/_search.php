<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Content;

/* @var $this yii\web\View */
/* @var $model backend\models\ContentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-search well">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<div class="row">
    <div class="col-md-5">
            <?= $form->field($model, 'title')->widget(Select2::className(),  [
                'data' => ArrayHelper::map(Content::find()->all(), 'id', 'title'),
                'options'=>['placeholder'=>'Choose Title'],
                'pluginOptions'=>[
                   'allowClear'=>true 
                ],
                'pluginEvents'=>[
                    
                ]
            ]) ?>
    </div>

    <?php // echo $form->field($model, 'is_html') ?>

    <?php // echo $form->field($model, 'status') ?>

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
