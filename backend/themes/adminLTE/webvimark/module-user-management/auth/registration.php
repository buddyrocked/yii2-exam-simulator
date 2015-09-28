<?php

use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\forms\RegistrationForm $model
 */

$this->title = UserManagementModule::t('front', 'Registration');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-registration parallax first-content">
	<div class="container">
		<div class="row">
	        <div class="col-md-8">
	            <div class="container-menu">
	                <div class="upper-menu">
	                    <div class="title-icon"><i class="fa fa-male"></i></div>
	                    <div class="upper-menu-title">
	                    <?= Html::encode($this->title) ?>
	                    </div>
	                </div>	                
					<?php $form = ActiveForm::begin([
						'id'=>'user',
						'layout'=>'horizontal',
						'validateOnBlur'=>false,
					]); ?>
	                <div class="middle-menu bg-white">
	                    <div class="row">
	                        <div class="col-md-12">

								<?= $form->field($model, 'first_name')->textInput(['maxlength' => 50, 'autocomplete'=>'off', 'autofocus'=>true]) ?>

								<?= $form->field($model, 'surname')->textInput(['maxlength' => 50, 'autocomplete'=>'off', 'autofocus'=>true]) ?>

								<?= $form->field($model, 'username')->textInput(['maxlength' => 50, 'autocomplete'=>'off', 'autofocus'=>true]) ?>

								<?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>

								<?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>

								<?= $form->field($model, 'captcha')->widget(Captcha::className(), [
									'template' => '<div class="row"><div class="col-md-6">{image}</div><div class="col-md-6">{input}</div></div>',
									'captchaAction'=>['/user-management/auth/captcha']
								]) ?>								
							</div>
	                    </div>
	                </div>
	                <div class="lower-menu">
	                	<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-sm-3"></label>
									<div class="col-sm-6 text-right">
					                	<?= Html::submitButton(
											'<span class="glyphicon glyphicon-ok"></span> ' . UserManagementModule::t('front', 'Register'),
											['class' => 'btn btn-danger']
										) ?>
										<?= Html::a('<i class="fa fa-lock"></i> Login', ['/user-management/auth/login'], ['class'=>'btn btn-danger']); ?>
									</div>
								</div>
							</div>
						</div>
	                </div>
	                <?php ActiveForm::end(); ?>
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

