<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use backend\components\EasyThumbnailImage;
use backend\components\MessageWidget;
use backend\components\LeaveWidget;
use backend\components\BatchWidget;
use backend\components\purchaseRequestWidget;


/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?php echo Html::a('<span class="logo-mini"></span><span class="logo-lg"></span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <?php //MessageWidget::widget() ?>

                </li>
                <li class="dropdown messages-menu">
                    <?php //LeaveWidget::widget() ?>
                </li>
                <li class="dropdown messages-menu">
                    <?php //BatchWidget::widget() ?>
                </li>
                <li class="dropdown messages-menu">
                    <?php //purchaseRequestWidget::widget() ?>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-twitch"></i>
                        <span class="label label-info">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php $photo = isset(Yii::$app->profile->detail()->photo)?'@webroot/uploads/employee/photo/'.Yii::$app->profile->detail()->photo: $directoryAsset."/img/user2-160x160.jpg"; ?>
                        <?php //Html::img($photo, ['class'=>'user-image', 'alt'=>'user Image']); ?>
                        <?php
                            echo EasyThumbnailImage::thumbnailImg(
                                $photo,
                                49,
                                49,
                                EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                ['alt' => 'user image', 'class'=>'user-imagex img-square', 'data-src'=>'holder.js/49x49/auto/?text=img']
                            );
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php //Html::img($photo, ['class'=>'img-circle', 'alt'=>'user Image']); ?>
                            <?php
                                echo EasyThumbnailImage::thumbnailImg(
                                    $photo,
                                    100,
                                    100,
                                    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                    ['alt' => 'user image', 'class'=>'img-square', 'data-src'=>'holder.js/100x100/auto/?text=img']
                                );
                            ?>
                            <p>
                                <?= Html::encode(Yii::$app->user->username); ?> <?= Html::encode(isset(Yii::$app->profile->detail()->first_name)?Yii::$app->profile->detail()->first_name:''); ?>
                                <small></small>
                            </p>
                        </li>
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
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
                </li>

            </ul>
        </div>
    </nav>
</header>
