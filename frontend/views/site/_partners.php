<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
?>
<div class="col-md-12">
    <div class="process-item line">
        <div class="row">
            <div class="col-md-2">
                <div>&nbsp;</div>
                <div class="process-img">
                    <?= Html::img('@web/uploads/cms/'.$model->image, []); ?>
                </div>
            </div>
            <div class="col-md-10">
                <div class="text-upper text-bold">
                    <?= Html::encode($model->title); ?>
                </div>
                <div class="process-content">
                    <?= Html::decode($model->content); ?>
                </div>
            </div>
        </div>
    </div>
</div>