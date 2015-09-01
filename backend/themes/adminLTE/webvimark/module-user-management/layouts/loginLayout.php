<?php
use app\assets\AppAsset;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
dmstr\web\AdminLteAsset::register($this);
backend\themes\adminLTE\components\LoginAsset::register($this);

/* @var $this \yii\web\View */
/* @var $content string */

$this->title = UserManagementModule::t('front', 'Authorization');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="navbar navbar-fixed-top navbar-custom-login" role="navigation">
    <div class="navbar-top"></div>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <div>
                <img src="" alt="">                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-login" id="nav-section">
                <li class="active"><?php echo Html::a('Homes', ['/'], ['class'=>'external']); ?></li>
                <li><?php echo Html::a('Features', '#features'); ?></li>
                <li><?php echo Html::a('About', '#about'); ?></li>
                <li><?php echo Html::a('Contact', '#contact'); ?></li>
                <?php if (Yii::$app->user->isGuest): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sign In <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo Html::a('Login', ['/user-management/auth/login'], ['class'=>'external']); ?></li>
                            <li role="separator" class="divider"></li>
                            <li><?php echo Html::a('Registration', ['/user-management/auth/registration'], ['class'=>'external']); ?></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class=""><?php echo Html::a('Dashboard', ['/site/dashboard'], ['class'=>'external']); ?></li>
                <?php endif; ?>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->            
</div>
<?= $content ?>
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="title-section text-center">
                <span>Contact Us</span>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</div>
<footer class="center footer">
    <p>&copy; Rialachas 2015</p>
</footer>

<?php
$css = <<<CSS
html, body {
	    background: #f1f1f1;
        color: #555;
}



footer {
  padding: 20px 0;
}

.footer {
    background: #c0392b;
    border: none;
    color: #fff;
    text-align: center;
}

CSS;

$this->registerCss($css);
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>