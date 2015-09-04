
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\components\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">
    <div class="row">    
        <div class="col-md-12">
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
                        <div class="text-right">
                            <?= Html::a('<i class="fa fa-plus"></i> <span>Create</span> ', ['create'], ['class' => 'btn btn-danger outline']) ?>
                        </div>
                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        

                            <?php \yii\widgets\Pjax::begin(); ?>
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                    'columns' => [
                                    [
                                        'attribute'=>'first_name',
                                        'format'=>'raw',
                                        'value'=>function($data){
                                            //return $this->render('_profileItem', ['model'=>$data]);
                                            return '
                                                <div class="data-thumb">
                                                   '.EasyThumbnailImage::thumbnailImg(
                                                    '@webroot/uploads/profile/photo/'.$data->photo,
                                                    80,
                                                    80,
                                                    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                                    ['alt' => 'user image', 'class'=>'', 'data-src'=>'holder.js/80x80/auto/?text=img']
                                                ).'
                                                </div>
                                                <div class="profile-detail">
                                                    <h4 class="text-upper"><strong>'.$data->getFullname().'</strong></h4>
                                                    <div>'.$data->status.'</div>
                                                    <div class="profile-stat">
                                                        <span class="label label-danger"><i class="fa fa-briefcase"></i> '.$data->job.' </span>
                                                    </div>
                                                </div>
                                                ';
                                        }
                                    ],
                                    // 'display_surname_preference',
                                    // 'suffix',
                                    // 'gender_id',
                                    // 'dob',
                                    // 'pob',
                                    // 'job',
                                    // 'street1:ntext',
                                    // 'street2:ntext',
                                    // 'city:ntext',
                                    // 'province_id',
                                    // 'country_id',
                                    // 'postal_code:ntext',
                                    // 'status',
                                    // 'photo',
                                    // 'created',
                                    // 'updated',

                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '<div>&nbsp;</div><div class="btn-group">{view} {update} {delete}</div>',
                                    'buttons' => [
                                                    'view' => function ($url, $model, $key) {
                                                        return Html::a('<i class="fa fa-search"></i>', $url, ['class'=>'btn btn-xs btn-danger outline']);
                                                    },
                                                    'update' => function ($url, $model, $key) {
                                                        return Html::a('<i class="fa fa-pencil"></i>', $url, ['class'=>'btn btn-xs btn-danger outline']);
                                                    },
                                                    'delete' => function ($url, $model, $key) {
                                                        return Html::a('<i class="fa fa-trash"></i>', $url, ['class'=>'btn btn-xs btn-danger outline', 'data-confirm'=>'Are you sure you want to delete this item?', 'data-method'=>'post']);
                                                    },
                                    ]
                                ],
                            ],
                        ]); ?>
                                           <?php \yii\widgets\Pjax::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
