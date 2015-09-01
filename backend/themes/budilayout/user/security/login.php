<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use dektrium\user\widgets\Connect;

/**
 * @var yii\web\View                   $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module           $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="col-md-4 col-md-offset-4">
    <div id="login-container">  
        <div id="login-header">
            <!--<?= Html::encode($this->title) ?>-->
        </div>
        <?php $form = ActiveForm::begin([
            'id'                     => 'login-form',
            'options' => [
                'class' => 'form-login'
             ],
            'enableAjaxValidation'   => true,
            'enableClientValidation' => false,
            'validateOnBlur'         => false,
            'validateOnType'         => false,
            'validateOnChange'       => false,
        ]) ?>

        <?= $form->field($model, 'login', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1'], 'addon' => ['prepend' => ['content'=>'<i class="fa fa-male"></i>'], 'groupOptions' => ['class'=>'input-group-lg']]]) ?>

        <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2'], 'addon' => ['prepend' => ['content'=>'<i class="fa fa-lock"></i>'], 'groupOptions' => ['class'=>'input-group-lg']]])->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4']) ?>

        <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'btn btn-default-full btn-flat', 'tabindex' => '3']) ?>

        <?php ActiveForm::end(); ?>
    </div>
    <?php if ($module->enableConfirmation): ?>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
        </p>
    <?php endif ?>
    <?php if ($module->enableRegistration): ?>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
        </p>
    <?php endif ?>
    <?= Connect::widget([
        'baseAuthUrl' => ['/user/security/auth']
    ]) ?>
</div>