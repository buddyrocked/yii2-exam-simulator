<?php
use app\assets\AppAsset;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use backend\components\EasyThumbnailImage;
use backend\models\Content;

dmstr\web\AdminLteAsset::register($this);
backend\themes\adminLTE\components\LoginAsset::register($this);

/* @var $this \yii\web\View */
/* @var $content string */

$this->title = UserManagementModule::t('front', 'Authorization');
$content1 = Content::find()->where(['id' => '14'])->one();
$content2 = Content::find()->where(['id' => '15'])->one();
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
    <div class="containerx">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
                <div>
                    <?= Html::img('@web/uploads/img/logo_scrudu.png'); ?>
                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-login" id="nav-section">
                <li class="active"><?php echo Html::a('Home', ['/'], ['class'=>'external']); ?></li>
                <li><?php //echo Html::a('Features', '#features'); ?></li>
                <li><?php //echo Html::a('About', '#about'); ?></li>
                <li><?php //echo Html::a('Contact', '#contact'); ?></li>
                <li><?php   echo Html::a('Exam', ['/simulation/take'], ['class'=>'external']); ?></li>
                <?php if (Yii::$app->user->isGuest): ?>
                    <li class="dropdown">
                        <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sign In <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php //echo Html::a('Sign In', ['/user-management/auth/login'], ['class'=>'external']); ?></li>
                            <li role="separator" class="divider"></li>
                            <li><?php //echo Html::a('Sign Up', ['/user-management/auth/registration'], ['class'=>'external']); ?></li>
                        </ul>-->
                    </li>
                <?php else: ?>
                    
                    <li class=""><?php echo Html::a('Dashboard', ['/site/dashboard'], ['class'=>'external']); ?></li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php //$photo = isset(Yii::$app->profile->detail()->photo)?'@webroot/uploads/employee/photo/'.Yii::$app->profile->detail()->photo: $directoryAsset."/img/user2-160x160.jpg"; ?>
                        <?php //Html::img($photo, ['class'=>'user-image', 'alt'=>'user Image']); ?>
                        <?php
                            echo EasyThumbnailImage::thumbnailImg(
                                //$photo,
                                49,
                                49,
                                EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                ['alt' => 'user image', 'class'=>'user-imagex img-square', 'data-src'=>'holder.js/49x49/auto/?text=img']
                            );
                        ?>
                    </a>
                    <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a(
                                    'Profile',
                                    ['profile/viewdetail'],
                                    ['class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/user-management/auth/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                <?php endif; ?>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->            
</div>
<?= $content ?>
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <div class="title-section2">
                    <span>Contact Us</span>
                </div>
            </div>
            <div class="col-md-4">                
                <?php
                    if(isset($content1->content))
                    {
                        echo ($content1->is_html == true)?Html::decode($content1->content):strip_tags($content1->content);
                    }
                ?>
            </div>
            <div class="col-md-4">                
                <?php
                    if(isset($content2->content))
                    {
                        echo ($content2->is_html == true)?Html::decode($content2->content):strip_tags($content2->content);
                    }
                ?>
                <div>
                    <i class="fa fa-facebook-square fa-3x"></i>
                    <i class="fa fa-twitter-square fa-3x"></i>
                    <i class="fa fa-linkedin-square fa-3x"></i>
                    <i class="fa fa-google-plus-square fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="center footer">
    <p>&copy; Rialachas 2015. All Rights Reserved.</p>
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