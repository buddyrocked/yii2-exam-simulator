<?php $start = microtime(true); ?>
<?php
use backend\assets\CustomAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

CustomAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="BUDI HARIYANA CMS">
        <meta name="author" content="BUDI HARIYANA">

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <!-- Bootstrap core CSS -->
        <?php $this->head() ?>
        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
    </head>

    <?php $this->beginBody() ?>
        <body id="login-body">
            <div class="navbar" role="navigation">
                <a href="#" class="btn-switch-menu">
                    <span class="icons-bar"></span>
                    <span class="icons-bar"></span>
                    <span class="icons-bar"></span>
                </a> 
            </div>
            <div class="container" id="content-container">                    
                <?= $content ?>             
            </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
