<?php
/**
 * @var $this yii\web\View
 * @var $model webvimark\modules\UserManagement\models\forms\LoginForm
 */

use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>


<div class="login-content">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-md-offset-8">
                <?php //Html::img('@web/uploads/img/logo-conservir-angsa.png', ['class'=>'logo-login', 'alt'=>'user Image']); ?>
                    
                <div id="login-container">
                    <div id="login-header">
                       <? // UserManagementModule::t('front', 'Authorization') ?>
                    </div>
            		<?php $form = ActiveForm::begin([
            			'id'      => 'login-form',
            			'options'=>['autocomplete'=>'off', 'class' => 'form-login'],
            			'validateOnBlur'=>false,
            			'fieldConfig' => [
            				'template'=>"{input}\n{error}",
            			],
            		]) ?>


            		<?= $form->field($model, 'username')
            			->textInput(['placeholder'=>$model->getAttributeLabel('username'), 'autocomplete'=>'off']) ?>

            		<?= $form->field($model, 'password')
            			->passwordInput(['placeholder'=>$model->getAttributeLabel('password'), 'autocomplete'=>'off']) ?>

            		<?= $form->field($model, 'rememberMe')->checkbox(['value'=>true]) ?>

            		<?= Html::submitButton(
            			UserManagementModule::t('front', 'Login'),
            			['class' => 'btn btn-lg btn-danger btn-block']
            		) ?>

                    <div>&nbsp;</div>

            		<div class="row registration-block">
            			<div class="col-sm-6">
            				<?= GhostHtml::a(
            					UserManagementModule::t('front', "Registration"),
            					['/user-management/auth/registration']
            				) ?>
            			</div>
            			<div class="col-sm-6 text-right">
            				<?= GhostHtml::a(
            					UserManagementModule::t('front', "Forgot password ?"),
            					['/user-management/auth/password-recovery']
            				) ?>
            			</div>
            		</div>
            		<?php ActiveForm::end() ?>
            	</div>
            </div>
        </div>
    </div>
</div>
<div class="process">
    <div class="title-section text-center">
        <span>Our Simple Process</span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="process-item process-item-1 active">
                    <div class="process-icon">
                        <i class="fa fa-tablet"></i>
                    </div>
                    <div class="process-desc">
                        Register your account
                    </div>
                    <div>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-item process-item-2 active">
                    <div class="process-icon">
                        <i class="fa fa-map"></i>
                    </div>
                    <div class="process-desc">
                        Take a Test
                    </div>
                    <div>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-item process-item-3 active">
                    <div class="process-icon">
                        <i class="fa fa-trophy"></i>
                    </div>
                    <div class="process-desc">
                        Get a Score
                    </div>
                    <div>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>

<div class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">                
                <div class="title-section">
                    <span>Our Features</span>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="services-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="text-center">
                                        <i class="fa fa-bank fa-3x fa-pull-left"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="services-item-title">
                                        Biggest Questions Bank
                                    </div>
                                    <div class="services-item-desc">
                                        Over 100 Million Thousand Questions in our library.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="services-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="text-center">
                                        <i class="fa fa-money fa-3x fa-pull-left"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="services-item-title">
                                        Our Tests is Totally Free 
                                    </div>
                                    <div class="services-item-desc">
                                        Over 100 Million Thousand Questions in our library.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="services-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="text-center">
                                        <i class="fa fa-line-chart fa-3x fa-pull-left"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="services-item-title">
                                        25 Million People Tested 
                                    </div>
                                    <div class="services-item-desc">
                                        Over 100 Million Thousand Questions in our library.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="exam">
    <div class="container">
        <div class="row">
            <div class="title-section text-center">
                <span>Our Exam</span>
            </div>
            <div class="col-md-4">
                <div class="services-item">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <i class="fa fa-bank fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-item">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <i class="fa fa-money fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-item">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <i class="fa fa-line-chart fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-item">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <i class="fa fa-bank fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-item">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <i class="fa fa-money fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-item">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <i class="fa fa-line-chart fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
