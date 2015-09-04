<?php
/* @var $this yii\web\View */
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use backend\components\EasyThumbnailImage;

$this->title = 'Exam Simulator';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-content first-content" id="index-content">
	<div class="row">    
        <div class="col-md-8">
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

                                        <?php //\yii\widgets\Pjax::begin(); ?>
                                        <?= GridView::widget([
                                            'dataProvider' => new ActiveDataProvider([
                                                            'query' => $subjects,
                                            ]),
                                            'columns' => [
                                                            
                                                            [
                                                                'attribute'=>'name',
                                                                'format'=>'raw',
                                                                'value'=>function($data){
                                                                    $client = (isset($data->desc))?$data->desc:'-';
                                                                    return '<h4 class="text-upper"><i class="fa fa-briefcase text-danger"></i> &nbsp; <strong>'.$data->name.'</strong></h4>'.$client;
                                                                }
                                                            ],
                                                            [
                                                                    'class' => 'yii\grid\ActionColumn',
                                                                    'template' => '<div class="">{view}</div>',
                                                                    'buttons' => [
                                                                                    'view' => function ($url, $model, $key) {
                                                                                        return Html::a('<i class="fa fa-list-alt"></i> Take a Test', ['/#'], ['class'=>'btn btn-danger outline pull-right']);
                                                                                    },
                                                                    ]
                                                                ],
                                                            ],
                                    ]); ?>
                                   <?php //\yii\widgets\Pjax::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        	<div class="container-menu">
                <div class="upper-menu">
                    <div class="title-icon"><i class="fa fa-male"></i></div>
                    <div class="upper-menu-title">
                    	My Profile
                    </div>
                </div>
                <div class="middle-menu bg-white">
                    <div class="row">
                        <div class="col-md-12">

	                        <div class="">
	                        <!-- User image -->
		                        <div class="user-header text-center">
		                            <?php //Html::img($photo, ['class'=>'img-circle', 'alt'=>'user Image']); ?>
		                            <?php
		                            	$photo = isset(Yii::$app->profile->detail()->photo)?'@webroot/uploads/employee/photo/'.Yii::$app->profile->detail()->photo: "@webroot/img/user2-160x160.jpg";
		                                echo EasyThumbnailImage::thumbnailImg(
		                                    $photo,
		                                    100,
		                                    100,
		                                    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
		                                    ['alt' => 'user image', 'class'=>'img-square', 'data-src'=>'holder.js/200x200/auto/?text=img']
		                                );
		                            ?>
		                            <h3 class="text-bold text-bebas text-danger text-upper">
		                                <?= Html::encode(Yii::$app->user->username); ?> <?= Html::encode(isset(Yii::$app->profile->detail()->first_name)?Yii::$app->profile->detail()->first_name:''); ?>
		                                <small></small>
		                            </h3>
		                        </div>
                        		<div>&nbsp;</div>
		                        <!-- Menu Footer-->
		                        <div class="user-footer">
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
		                        </div>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

