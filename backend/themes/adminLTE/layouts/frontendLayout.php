<?php
use app\assets\AppAsset;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
dmstr\web\AdminLteAsset::register($this);
backend\themes\adminLTE\components\FrontendAsset::register($this);

/* @var $this \yii\web\View */
/* @var $content string */

//$this->title = UserManagementModule::t('front', 'Authorization');
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
                <?= Html::img('@web/uploads/logo.png', ['style'=>'']); ?>               
                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-login" id="nav-section">
                <li class="active"><?php echo Html::a('Homes', ['index'], ['class'=>'external']); ?></li>
                <li><?php echo Html::a('Consultancy Services', ['services'], ['class'=>'external']); ?></li>
                <li><?php echo Html::a('Training', ['training'], ['class'=>'external']); ?></li>
                <li><?php echo Html::a('Product', ['product'], ['class'=>'external']); ?></li>
                <li><?php echo Html::a('Our Client & Partners', ['partners'], ['class'=>'external']); ?></li>
                <li><?php echo Html::a('Contact', ['contact'], ['class'=>'external']); ?></li>
                <?php if (!Yii::$app->user->isGuest): ?>
                    
                    <li class=""><?php echo Html::a('Dashboard', ['/site/dashboard'], ['class'=>'external']); ?></li>
                <?php endif; ?>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->            
</div>
<div class="content-main">
<?= $content ?>
</div>
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="title-section">
                    <span>Contact Us</span>
                </div>
                <div class="touch">
                    <div><span><i class="fa fa-phone"></i></span> +62.21.2939.1106, +62.21.7088.2248</div>
                    <div><span><i class="fa fa-fax"></i></span>+62.21.29.39.12.22</div>
                    <div><span><i class="fa fa-envelope"></i></span><a href="mailto:contact@rialachas.com">contact@rialachas.com</a></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="title-section">
                    <span>Keep in touch</span>
                </div>
                <div class="touch">
                    <div><span><i class="fa fa-linkedin"></i></span>Rialachas</div>
                    <div><span><i class="fa fa-twitter"></i></span>@rialachas</div>
                    <div><span><i class="fa fa-google-plus"></i></span>Rialachas</div>
                </div>
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
    background: #333;
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