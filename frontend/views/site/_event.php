<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
?>
<div class="col-md-12">
    <div class="process-item">
        <div class="row">
            <div class="col-md-4">
                <div class="process-img">
                    <?= Html::img('@web/uploads/event/'.$model->image, []); ?>
                </div>
            </div>
            <div class="col-md-8">
                <div class="process-content">
                    <div class="process-desc text-upper text-bold">
                        <i class="fa fa-quote-left fa-border"></i> 
                        <?= Html::encode($model->name); ?>
                    </div>
                    <div>&nbsp;</div>
                    
                    <div>
                    <?= Html::decode($model->description); ?>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-3">
                            <label>Tempat dan Alamat</label>
                            <div class="text-bold">
                                <?= Html::encode($model->venue); ?>
                            </div>
                            <div>&nbsp;</div>
                            <div>
                                <?= Html::decode($model->address); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Tanggal dan Waktu</label>
                            <div>
                                <?= Html::decode($model->datetime); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Catatan</label>
                            <div>
                                <?= Html::decode($model->note); ?>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <?= Html::a('<i class="fa fa-check-circle"></i> Daftar Sekarang', ['/site/detail', 'id'=>$model->id, 'name'=>$model->name], ['class'=>'btn btn-green']); ?>
                            <?= Html::a('<i class="fa fa-cloud-download"></i> Download Form Pendaftaran', ['/site/form', 'id'=>$model->id], ['class'=>'btn btn-green']); ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="col-md-12">
    <div>&nbsp;</div>
</div>