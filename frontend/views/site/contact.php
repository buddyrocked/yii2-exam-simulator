<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'PT Rialachas | Contact Us';
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
                <?php if($address != null): ?>
                    <?= Html::decode($address->content); ?>
                <?php endif; ?>
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
