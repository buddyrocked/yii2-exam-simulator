<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\helpers\Url;
//use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;
use backend\components\NavCustom;
use backend\components\EasyThumbnailImage;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php $photo = isset(Yii::$app->profile->detail()->photo)?'@webroot/uploads/employee/photo/'.Yii::$app->profile->detail()->photo: $directoryAsset."/img/user2-160x160.jpg"; ?>
                <?php
                    echo EasyThumbnailImage::thumbnailImg(
                        $photo,
                        50,
                        50,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        ['alt' => 'user image', 'class'=>'img-circle', 'data-src'=>'holder.js/40x40/auto/?text=img']
                    );
                ?>
            </div>
            <div class="pull-left info">
                <p><?= Html::encode(Yii::$app->user->username); ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <div class="btn-shortcut">
            <?php // Html::a('<i class="fa fa-plus-circle"></i> <span>Create Task</span>', ['/dailyreport/index'], ['class'=>'btn btn-danger btn-block btn-modalx']); ?>
        </div>
        <!-- /.search form -->

        <?php
            echo NavCustom::widget([
                        'encodeLabels'=>false,
                        'options' => ['class' => 'sidebar-menu'],
                        'activateParents'=>true,
                        'items' => [
                            [
                                'url' => ['/site/dashboard'],
                                'label' => 'Dashboard',
                                'options'=> ['class'=>'treeview'],
                                'icon' => 'bar-chart'
                            ],
                            [
                                'label' => 'Data Master',
                                'icon' => 'briefcase',
                                'options'=> ['class'=>'treeview'],
                                'url'=>['/subject/index'],
                                'items' => [
                                    ['label' => 'Subject & Question', 'icon'=>'map', 'url'=>['/subject/index']],
                                    ['label' => 'Passage', 'icon'=>'twitch', 'url'=>['/passage/index']],
                                    ['label' => 'Profile', 'icon'=>'male', 'url'=>['/profile/index']],
                                    ['label' => 'Master Province', 'icon'=>'map', 'url'=>['/province/index']],
                                    ['label' => 'Country', 'icon'=>'trophy', 'url'=>['/country/index']],
                                    //['label' => 'Misc Project', 'icon'=>'heartbeat', 'url'=>['/project/listother']],
                                ],
                            ],
                            [
                                'label' => 'User Management',
                                'icon' => 'laptop',
                                'options'=> ['class'=>'treeview'],
                                'url'=>'#',
                                'items'=>UserManagementModule::menuItems()
                            ],
                            /*[
                                'label' => 'Frontend routes',
                                'icon' => 'user',
                                'options'=> ['class'=>'treeview'],
                                'url'=>'#',
                                'items'=>[
                                    //['label'=>'Login', 'url'=>['/user-management/auth/login']],
                                    ['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
                                    ['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                                    ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
                                    ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
                                    ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
                                ],
                            ],
                            [
                                'label' => 'Client & Supplier',
                                'icon' => 'male',
                                'options'=> ['class'=>'treeview'],
                                'url'=>['/client/index'],
                                'items' => [
                                    ['label' => 'Client', 'icon'=>'child', 'url'=>['/client/index']],
                                    ['label' => 'Suppliers', 'icon'=>'user', 'url'=>['/supplier/index']],                                  
                                ],
                            ],
                            [
                                'label' => 'Human Capital',
                                'icon' => 'user-md',
                                'options'=> ['class'=>'treeview'],
                                'url'=>['/employee/index'],
                                'items' => [
                                    ['label' => 'Employee', 'icon'=>'user', 'url'=>['/employee/index']],
                                    ['label' => 'Candidate', 'icon'=>'child', 'url'=>['/candidate/index']],
                                    ['label' => 'Interview', 'icon'=>'child', 'url'=>['/interviewcandidate/index']],
                                    ['label' => 'Job Vacancy', 'icon'=>'briefcase', 'url'=>['/job/index']],
                                    ['label' => 'Interview Status', 'icon'=>'briefcase', 'url'=>['/interviewstatus/index']],
                                ],
                            ],
                            [
                                'label' => 'Task and Assignment',
                                'icon' => 'list-alt',
                                'options'=> ['class'=>'treeview'],
                                'url'=>['/dailyreport/index'],
                                'items' => [
                                    ['label' => 'Daily Report', 'icon'=>'calendar', 'url'=>['/dailyreport/index']],
                                    ['label' => 'List Daily Report', 'icon'=>'list-alt', 'url'=>['/dailyreport/all']],
                                    ['label' => 'My Leave Request', 'icon'=>'calendar', 'url'=>['/leaverequest/index']],
                                    ['label' => 'List Leave Request', 'icon'=>'list-alt', 'url'=>['/leaverequest/list']],
                                    ['label' => 'Input Leave Request', 'icon'=>'list-alt', 'url'=>['/leaverequest/all']],
                                ],
                            ],
                            [
                                'label' => 'Training & Purchase Request',
                                'icon' => 'cart-plus',
                                'options'=> ['class'=>'treeview'],
                                'url'=>['/purchaserequest/index'],
                                'items' => [
                                    ['label' => 'Purchase Request', 'icon'=>'shopping-cart', 'url'=>['/purchaserequest/index']],
                                    ['label' => 'Purchase Request Approval', 'icon'=>'shopping-cart', 'url'=>['/purchaserequest/list']],
                                    ['label' => 'Purchase Order', 'icon'=>'shopping-cart', 'url'=>['/purchaseorder/index']],
                                    ['label' => 'My Training Request', 'icon'=>'user', 'url'=>['/training/index']],
                                    ['label' => 'Training Request Approval', 'icon'=>'user', 'url'=>['/training/approve']],
                                    ['label' => 'All Training Request', 'icon'=>'user', 'url'=>['/training/all']],
                                    ['label' => 'Training Type', 'icon'=>'user', 'url'=>['/typetraining/index']],
                                    ['label' => 'Training Service', 'icon'=>'user', 'url'=>['/service/index']],
                                ],
                            ],
                            [
                                'label' => 'Knowledge Management',
                                'icon' => 'graduation-cap',
                                'options'=> ['class'=>'treeview'],
                                'url'=>['/article/index'],
                                'items' => [
                                    ['label' => 'Article', 'icon'=>'book', 'url'=>['/article/index']],
                                    ['label' => 'iKnowMan!', 'icon'=>'book', 'url'=>['/article/list']],
                                    ['label' => 'E-library', 'icon'=>'book', 'url'=>['/elibrary/index']],
                                    ['label' => 'List E-book!', 'icon'=>'book', 'url'=>['/elibrary/list']],
                                    ['label' => 'TheNews', 'icon'=>'book', 'url'=>['/news/index']],
                                    ['label' => 'Media', 'icon'=>'newspaper-o', 'url'=>['/mastermedia/index']],
                                    ['label' => 'Source', 'icon'=>'book', 'url'=>['/source/index']],
                                    ['label' => 'Tag', 'icon'=>'tags', 'url'=>['/tag/index']],
                                    ['label' => 'Rss', 'icon'=>'rss', 'url'=>['/rss/index']],
                                    ['label' => 'Motivational Quotes', 'icon'=>'heart', 'url'=>['/content/index']],
                                    ['label' => 'Source Quotes', 'icon'=>'list-alt', 'url'=>['/generalsource/index']],
                                    ['label' => 'Category Quoetes', 'icon'=>'list-alt', 'url'=>['/category/index']], 
                                ],
                            ],
                            [
                                'label' => 'Finance',
                                'icon' => 'money',
                                'options'=> ['class'=>'treeview'],
                                'url'=>['/expense/index'],
                                'items' => [
                                    ['label' => 'Expense', 'icon'=>'money', 'url'=>['/expense/index']],
                                    ['label' => 'Incoming Fund', 'icon'=>'money', 'url'=>['/incomingfund/index']],
                                    ['label' => 'Pattycash', 'icon'=>'money', 'url'=>['/pettycash/index']],
                                    ['label' => 'Financial Account', 'icon'=>'list', 'url'=>['/financialaccount/index']], 
                                ],
                            ],
                            [
                                'label' => 'Documents',
                                'icon' => 'archive',
                                'options'=> ['class'=>'treeview'],
                                'url'=>['/companydocument/index'],
                                'items' => [
                                    ['label' => 'Company Document', 'icon'=>'file-text', 'url'=>['/companydocument/index']],
                                    ['label' => 'Business Card', 'icon'=>'credit-card', 'url'=>['/businesscard/index']], 
                                ],
                            ],
                            [
                                'label' => 'Master Data',
                                'icon' => 'inbox',
                                'options'=> ['class'=>'treeview'],
                                'url'=>['/task/index'],
                                'items' => [
                                    ['label' => 'Misc Project', 'icon'=>'heartbeat', 'url'=>['/project/other']],
                                    ['label' => 'Audit Trail', 'icon'=>'file-text', 'url'=>['/audittrail/index']],
                                    ['label' => 'Settings', 'icon'=>'file-text', 'url'=>['/setting/index']],
                                    ['label' => 'Project Record Type', 'icon'=>'file-text', 'url'=>['/projectrecordtype/index']],
                                    ['label' => 'Project Role', 'icon'=>'male', 'url'=>['/projectrole/index']],
                                    ['label' => 'Client Address Type', 'icon'=>'building-o', 'url'=>['/addresstype/index']],
                                    ['label' => 'Industry', 'icon'=>'cubes', 'url'=>['/industry/index']],
                                    ['label' => 'Province', 'icon'=>'map-marker', 'url'=>['/province/index']],
                                    ['label' => 'Country', 'icon'=>'flag', 'url'=>['/country/index']], 
                                    ['label' => 'Employee Grade', 'icon'=>'signal', 'url'=>['/grade/index']],
                                    ['label' => 'Gender', 'icon'=>'venus-mars', 'url'=>['/gender/index']],
                                    ['label' => 'Marital Status', 'icon'=>'slideshare', 'url'=>['/marital/index']],
                                    ['label' => 'Prefix Name', 'icon'=>'list-alt', 'url'=>['/prefix/index']],
                                    ['label' => 'Document Type', 'icon'=>'file-text', 'url'=>['/document/index']],
                                    ['label' => 'Pipeline Priority', 'icon'=>'arrow-circle-o-up', 'url'=>['/pipelinepriority/index']],
                                    ['label' => 'Pipeline Status', 'icon'=>'star-o', 'url'=>['/pipelinestatus/index']],
                                    ['label' => 'Product & Service', 'icon'=>'gift', 'url'=>['/product/index']],
                                    ['label' => 'Supplier', 'icon'=>'user-plus', 'url'=>['/product/index']], 
                                ],
                            ],
                            [
                                'label' => 'User Management',
                                'icon' => 'user',
                                'options'=> ['class'=>'treeview'],
                                'url'=>'#',
                                'items'=>UserManagementModule::menuItems()
                            ],
                            [
                                'label' => 'Frontend routes',
                                'icon' => 'user',
                                'options'=> ['class'=>'treeview'],
                                'url'=>'#',
                                'items'=>[
                                    //['label'=>'Login', 'url'=>['/user-management/auth/login']],
                                    ['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
                                    ['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                                    ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
                                    ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
                                    ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
                                ],
                            ],*/
                        ],
                    ]);
        ?>
    </section>

</aside>
