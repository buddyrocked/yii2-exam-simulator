<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index first-content">
    <div class="container">
        <div class="row">    
            <div class="col-md-4 col-md-offset-4">
                <div class="container-menu">
                    <div class="upper-menu">
                        <div class="title-icon"><i class="fa fa-list-alt"></i></div>
                        <div class="upper-menu-title">
                        <?= Html::encode($this->title) ?>
                        </div>
                    </div>
                    <div class="middle-menu bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                                    <?= $form->field($model, 'username') ?>
                                    <?= $form->field($model, 'password')->passwordInput() ?>
                                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                                    <div style="color:#999;margin:1em 0">
                                        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                                    </div>
                                    <div class="form-group">
                                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                    </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
