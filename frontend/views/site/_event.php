<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
?>
<div class="col-md-12">
    <div class="process-item">
        <div class="row">
            <div class="col-md-4">
                <div class="process-img">
                    <?= Html::img('@web/uploads/cms/'.$model->image, []); ?>
                </div>
            </div>
            <div class="col-md-8">
                <div class="process-content">
                    <div class="process-desc text-upper text-bold">
                        <i class="fa fa-quote-left fa-border"></i> 
                        <?= Html::encode($model->title); ?>
                    </div>
                    <div>&nbsp;</div>
                    
                    <div>
                    <?= Html::decode($model->content); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div>&nbsp;</div>
</div>