
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblAuditTrailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Audit Trails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-audit-trail-index">
    <div class="row">    
        <div class="col-md-12">
            <div class="container-menu">
                <div class="upper-menu">
                    <div class="title-icon"><i class="fa fa-male"></i></div>
                    <div class="upper-menu-title">
                    <?= Html::encode($this->title) ?>
                    </div>
                </div>
                <div class="middle-menu bg-white">
                    <div class="row">
                        <div class="col-md-12">
                        
                                   <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                

                                    <?php \yii\widgets\Pjax::begin(); ?>
                                    <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'filterModel' => $searchModel,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                            'id',
                                            [
                                                'attribute'=>'user_id',
                                                'format'=>'raw',
                                                'value'=>function($data){
                                                    return $data->user->username;
                                                }
                                            ],
                                            'action',          
                                            'model',
                                            'field',
                                            'old_value:ntext',
                                            'new_value:ntext',
                                            'stamp',
                                            'model_id',

                                        
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
