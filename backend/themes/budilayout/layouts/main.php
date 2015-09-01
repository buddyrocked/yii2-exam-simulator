<?php $start = microtime(true); ?>
<?php
use backend\themes\budilayout\components\CustomAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use kartik\widgets\Growl;
use backend\components\SidenavCustom;
use backend\components\MessageWidget;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;

/* @var $this \yii\web\View */
/* @var $content string */

$bundle = CustomAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
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
        <script>
            var baseUrl = "<?= rtrim(Yii::$app->request->hostInfo.Yii::$app->assetManager->getAssetUrl($bundle, ''), '/'); ?>";
        </script>
        <?php echo HTML::jsFile(Yii::$app->assetManager->getAssetUrl($bundle ,'vendor/requirejs/require.js'), array('data-main'=> Yii::$app->request->hostInfo.Yii::$app->assetManager->getAssetUrl($bundle ,'app'))); ?>
        
    </head>

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
        <div class="row-offcanvas">
            <div class="row-offcanvas-left" id="sidebar" role="navigation">
                <div id="company-logo">
                    <!--<span class="icon text-primary">
                        <i class="fa fa-diamond"></i>
                    </span>-->
                    <span class="text"><span class="text-bold"></span></span>
                </div>
                <div class="profile">
                    <div class="profile-photo">
                        <?php //echo (isset(Yii::$app->profile->detail()->photo))?Html::img('@web/uploads/photo/'.Yii::$app->profile->detail()->photo):Html::img(''); ?>
                        <?php //echo (isset(Yii::$app->profile->detail()->nama))?Yii::$app->profile->detail()->nama:''; ?>
                        <div class="profile-control">
                            <div class="btn-group">
                                <a href="#" class=""><i class="fa fa-power-off"></i></a>
                                <a href="#" class=""><i class="fa fa-male"></i></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <?php
                    echo SideNavCustom::widget([
                        'type' => SideNavCustom::TYPE_DEFAULT,
                        'encodeLabels' => false,
                        'items' => backend\components\MenuItemHelper::getMenu(),
                    ]);

                    /*echo GhostMenu::widget([
                        'encodeLabels'=>false,
                        'activateParents'=>true,
                        'items' => [
                            [
                                'label' => 'Backend routes',
                                'items'=>UserManagementModule::menuItems()
                            ],
                            [
                                'label' => 'Frontend routes',
                                'items'=>[
                                    ['label'=>'Login', 'url'=>['/user-management/auth/login']],
                                    ['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
                                    ['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                                    ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
                                    ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
                                    ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
                                ],
                            ],
                        ],
                    ]);*/
                ?>
            </div>
            <div class="content">
                <div class="navbar navbar-custom" role="navigation">
                    <a href="#" class="btn-switch-menu" data-toggle="offcanvas">
                        <span class="icons-bar"></span>
                        <span class="icons-bar"></span>
                        <span class="icons-bar"></span>
                    </a>
                    <a class="navbar-brand" href="#"></a>    
                    
                    <?php //echo MessageWidget::widget(); ?>
                    <!-- Split button -->
                    <div class="pull-right btn-header">
                        <a href="#" class="btn btn-info"><i class="fa fa-plus-circle"></i></a>
                        <a href="#" class="btn btn-info"><i class="fa fa-bolt"></i></a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info2"><i class="fa fa-user"></i></button>
                            <button type="button" class="btn btn-info"><?php echo Yii::$app->user->username; ?></button>
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                


                <div id="shortcut">
                    <div id="shortcut-container">
                        
                    </div>
                </div>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                  
                <div class="content-container" id="content-container">    
                    <?= $content ?>             
                </div>  
            </div>              
        </div>

        <footer class="center col-md-12 col-xs-18">
            <p>&copy;  2015</p>
            <div>
                <?php
                    $end = microtime(true);
                    $creationtime = ($end - $start);
                    printf("Page created in %.6f seconds.", $creationtime);
                ?>
            </div>
        </footer>

    
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID</label>
                                <input type="email" class="form-control col-sm-2" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Birthdate</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Gender</label>
                                <select class="form-control">
                                    <option>Pilih</option>
                                    <option>Female</option>
                                    <option>Male</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
