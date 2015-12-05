<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Domain;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\DomainSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="domain-search">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
            <?php echo '<label class="control-label">Transfer To Domain</label>';
                echo Select2::widget([
                    'name' => 'domain_id',
                    'id' => 'domain_id',
                    'data' => ArrayHelper::map(Domain::find()->all(), 'id', function($model, $defaultValue){
                        return $model->subject->name.' - '.$model->name;
                    }),
                    'options' => [
                        'placeholder' => 'Select Domain ...',
                        'multiple' => false
                    ],
                    'pluginOptions'=>[
                       'allowClear'=>true 
                    ]
                ]);
            ?>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">&nbsp;</label>
                <div>
                <?= Html::submitButton('Transfer', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
