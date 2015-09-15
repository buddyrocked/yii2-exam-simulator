<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
?>
<div class="col-md-6">
    <div class="process-item">
        <div class="process-desc text-upper text-bold">
            <?= Html::encode($model->title); ?>
        </div>
        <div class="process-content">
            <?= Html::img('@web/uploads/cms/'.$model->image, ['class'=>'img-right']); ?>
            <?= Html::decode($model->content); ?>
        </div>
    </div>
</div>