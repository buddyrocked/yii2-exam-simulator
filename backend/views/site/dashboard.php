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
            <div class="well">
                <h1 class="bebas">Let's take a exam simulations for free. </h1>
                <div>Weh have 20 Million exam simulation and 20 thousand Member at all over the world.</div>
            </div>
            <div class="container-menu">
                <div class="middle-menux bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <?php //\yii\widgets\Pjax::begin(); ?>
                            <?= GridView::widget([
                                'dataProvider' => new ActiveDataProvider([
                                                'query' => $subjects,
                                ]),
                                'showHeader'=>false,
                                'columns' => [
                                                [
                                                    'attribute'=>'id',
                                                    'format'=>'raw',
                                                    'value'=>function($data){
                                                        return '
                                                            <span class="fa-stack fa-3x text-danger">
                                                              <i class="fa fa-square fa-stack-2x"></i>
                                                              <i class="fa fa-map fa-stack-1x fa-inverse"></i>
                                                            </span>';
                                                    }
                                                ],
                                                [
                                                    'attribute'=>'name',
                                                    'format'=>'raw',
                                                    'value'=>function($data){
                                                        $client = (isset($data->desc))?substr($data->desc, 0, 80):'-';
                                                        return '<h4 class="text-upper"><strong>'.Html::a($data->name, ['/simulation/preview', 'id'=>$data->id], []).'</strong></h4>'.$client;
                                                    }
                                                ],
                                                [
                                                    'attribute'=>'time',
                                                    'format'=>'raw',
                                                    'value'=>function($data){
                                                        return '<h4 class="text-center text-danger"><strong>'.$data->time.'</strong></h4>
                                                                <div class="text-center">Minutes</div>';
                                                    }
                                                ],
                                                 [
                                                    'attribute'=>'question_number',
                                                    'format'=>'raw',
                                                    'value'=>function($data){
                                                        return '<h4 class="text-center text-danger"><strong>'.$data->question_number.'</strong></h4>
                                                                <div class="text-center">Questions</div>';
                                                    }
                                                ],
                                                /*[
                                                    'class' => 'yii\grid\ActionColumn',
                                                    'template' => '<div class="">{view}</div>',
                                                    'buttons' => [
                                                                    'view' => function ($url, $model, $key) {
                                                                        return Html::a('<i class="fa fa-list-alt"></i> Take a Test', ['/#'], ['class'=>'btn btn-danger outline pull-right']);
                                                                    },
                                                    ]
                                                ],*/
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
		                                <?= Html::a(
                                            'Profile',
                                            ['/profile/viewdetail'],
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
		                        </div>
		                    </div>
                        </div>
                        <div class="col-md-12">
                        <hr />
                        </div>
                        <div class="col-md-12">

                            <h3 class="bebas">Exam Taken</h3>
                            <?= GridView::widget([
                                'dataProvider' => new ActiveDataProvider([
                                                'query' => $simulations,
                                                'pagination' => false
                                ]),
                                'showHeader'=>false,
                                'columns' => [
                                                [
                                                    'attribute'=>'id',
                                                    'format'=>'raw',
                                                    'value'=>function($data){
                                                        return '
                                                            <span class="fa-stack fa-2x text-danger">
                                                              <i class="fa fa-square fa-stack-2x"></i>
                                                              <i class="fa fa-trophy fa-stack-1x fa-inverse"></i>
                                                            </span>';
                                                    }
                                                ],
                                                [
                                                    'attribute'=>'name',
                                                    'format'=>'raw',
                                                    'value'=>function($data){
                                                        return '<h4 class="text-upper"><strong>'.Html::a($data->subject->name, ['/simulation/view', 'id'=>$data->id], []).'</strong></h4>';
                                                    }
                                                ],
                                            ],
                            ]); ?>
                           <?php //\yii\widgets\Pjax::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

