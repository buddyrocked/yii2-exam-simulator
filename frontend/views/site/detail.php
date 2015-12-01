<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Cms */

$this->title = 'Detail Event';
$this->params['breadcrumbs'][] = ['label' => 'Event', 'url' => ['/site/training']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-content2 first-content parallax" id="index-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="index-intro2">
                    <h3 class="text-bold text-upper">Detail & Registrasi Event</h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="process">
    <div class="title-section text-center">
        <span></span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="process-item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="process-img">
                                <?= Html::img('@web/uploads/event/'.$model_event->image, []); ?>
                            </div>


                        </div>
                        <div class="col-md-8">
                            <div class="process-content">
                                <h3 class="text-upper text-bold">
                                    <i class="fa fa-quote-left fa-border"></i> 
                                    <?= Html::encode($model_event->name); ?>
                                </h3>
                                <div>&nbsp;</div>
                                
                                <div>
                                <?= Html::decode($model_event->description); ?>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Tempat dan Alamat</label>
                                        <div class="text-bold">
                                            <?= Html::encode($model_event->venue); ?>
                                        </div>
                                        <div>&nbsp;</div>
                                        <div>
                                            <?= Html::decode($model_event->address); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tanggal dan Waktu</label>
                                        <div>
                                            <?= Html::decode($model_event->datetime); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Catatan</label>
                                        <div>
                                            <?= Html::decode($model_event->note); ?>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="clockdiv" data-time="<?= $model_event->datetime; ?>">
                                            <div>
                                                <span class="days"></span>
                                                <div class="smalltext">Days</div>
                                            </div>
                                            <div>
                                                <span class="hours"></span>
                                                <div class="smalltext">Hours</div>
                                            </div>
                                            <div>
                                                <span class="minutes"></span>
                                                <div class="smalltext">Minutes</div>
                                            </div>
                                            <div>
                                                <span class="seconds"></span>
                                                <div class="smalltext">Seconds</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <?= Html::a('<i class="fa fa-cloud-download"></i> Download Form Pendaftaran', ['/site/form', 'id'=>$model_event->id], ['class'=>'btn btn-green btn-lg']); ?>
                                        
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
        </div>
        <div class="row">            
            <div class="col-md-12">
                <div class="container-menu">
                    <div class="upper-menu">
                        <div class="title-icon"><i class="fa fa-list-alt"></i></div>
                        <div class="upper-menu-title">
                            <?= Html::encode('Online Form Registration') ?>
                        </div>
                    </div>
                    <div class="middle-menu bg-white">
                        <div class="row">
                            <div class="col-md-12">  
        					    <?= $this->render('_form_registration', [
        					        'model' => $model,
        					    ]) ?>
                            </div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
