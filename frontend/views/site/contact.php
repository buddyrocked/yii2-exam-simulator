<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'PT Rialachas | Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact first-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="" id="map-rialachas">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-contact-desc">
    <div class="container">
        <div class="row">
            <div class="col-md-6">                
                <div class="title-section text-centers">
                    <span>Send Message</span>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                    <?= $form->field($model, 'name') ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'subject') ?>
                    <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-6">                
                <div class="title-section text-centers">
                    <span>Our Office</span>
                </div>
                <div>
                    
                    <div>
                        <div class="text-bold text-upper"><i class="fa fa-building"></i> Jakarta Office:</div>
                        <div>&nbsp;</div>
                        <div>Menara Palma 12th Floor</div>
                        <div>Jalan HR Rasuna Said Blok X2 Kav 6 </div>
                        <div>Jakarta, Indonesia 12950</div>
                        <div>P: +62.21.2939.1106, +62.21.7088.2248</div>
                        <div>F: +62.21.29.39.12.22</div>
                        <div>E: <a href="mailto:contact@rialachas.com">contact@rialachas.com</a></div>
                    </div>
                </div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>
                    <div>
                        <div class="text-bold text-upper"><i class="fa fa-building"></i> Bintaro Office:</div>
                        <div>&nbsp;</div>
                        <div>Jalan Cut Mutia 1 FG-2 No. 42A Bintaro Sektor 7</div>
                        <div>Tangerang Selatan, Indonesia</div>
                        <div>P: +62.21.7451.276, +62.21.7088.2248</div>
                        <div>F: +62.21.29.39.12.22</div>
                    </div>
                </div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>
                    <div>
                        <div class="text-bold text-upper"><i class="fa fa-male"></i> Contact Person:</div>
                        <div>&nbsp;</div>
                        <div><a href="mailto:resdy@rialachas.com">Resdy Benyamin (Director)</a></div>
                        <div>P: +62.812.885.6563 (mobile)</div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="process">
                    <div class="row">                    
                        <div class="col-md-12">
                            <div class="process-item">
                                <div class="row">
                                    <div class="col-md-12">                                    
                                        <h3 class="text-upper text-bold">
                                            Let's Join Our Learning Community!
                                        </h3>
                                    </div>
                                    <div class="col-md-2">
                                        <div>&nbsp;</div>
                                        <div class="process-img">
                                            <?= Html::img('@web/uploads/hiring.png', []); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="process-content">
                                            <i class="fa fa-quote-left fa-3x fa-pull-left fa-border"></i>
                                            Do you consider to join with us? Excellent! We are hiring 
                                            consultants for our IT governance and information security related projects. 
                                            You can send us your cv and cover letter to <a href="mailto:hr@rialachas.com">hr@rialachas.com</a>.
                                            <div>&nbsp;</div>
                                            <div>&nbsp;</div>
                                            Please contact us for further questions. We can't wait for you to be a part of our team.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
