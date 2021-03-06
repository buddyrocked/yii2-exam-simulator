<?php
use app\assets\AppAsset;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\widgets\Growl;
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
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','//connect.facebook.net/en_US/fbevents.js');

        fbq('init', '1698879347056179');
        fbq('track', "PageView");
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1698879347056179&ev=PageView&noscript=1"
    /></noscript>
<!-- End Facebook Pixel Code -->
</head>
<body>

<?php $this->beginBody() ?>
<?php foreach (Yii::$app->session->getAllFlashes() as $message): ?>
<?php
    echo Growl::widget([
        'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
        'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
        'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
        'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
        'showSeparator' => true,
        'delay' => 1,
        'pluginOptions' => [
            'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000,
            'placement' => [
                'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
            ]
        ]
    ]);
?>
<?php endforeach; ?>
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
                <li class="active"><?php echo Html::a('Home', ['/site/index'], ['class'=>'external']); ?></li>
                <li><?php echo Html::a('Consultancy Services', ['/site/services'], ['class'=>'external']); ?></li>
                <li><?php echo Html::a('Training', ['/site/training'], ['class'=>'external']); ?></li>
                <li><?php echo Html::a('Product', ['/site/product'], ['class'=>'external']); ?></li>
                <li><?php echo Html::a('Clients', ['/site/clients'], ['class'=>'external']); ?></li>
                <li><?php echo Html::a('Partners', ['/site/partners'], ['class'=>'external']); ?></li>
                <li><?php echo Html::a('Contact', ['/site/contact'], ['class'=>'external']); ?></li>
                <?php if (!Yii::$app->user->isGuest): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo Html::a('Manage Content', ['/cms/index'], ['class'=>'external']); ?></li>
                            <li role="separator" class="divider"></li>
                            <li><?php echo Html::a('Event', ['/event/index'], ['class'=>'external']); ?></li>
                            <li role="separator" class="divider"></li>
                            <li><?php echo Html::a('Registration Event', ['/eventregistration/index'], ['class'=>'external']); ?></li>
                            <li role="separator" class="divider"></li>
                            <li class=""><?php echo Html::a('Logout', ['/site/logout'], ['class'=>'external', 'data-method'=>'post']); ?></li>
                        </ul>
                    </li>
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
                    <div><span><i class="fa fa-phone"></i></span> +6221 2939 1106, +6221 7088 2248</div>
                    <div><span><i class="fa fa-fax"></i></span>+6221 2939 1222</div>
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
    <p>&copy; Rialachas 2015. All Rights Reserved.</p>
</footer>

<div class="modal fade bs-example-modal-lg" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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