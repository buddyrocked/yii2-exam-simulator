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
<div class="simulation-take first-content" id="index-content">
<div class="container">
	<div class="row">    
        <div class="col-md-12">            
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
                                                        return '<h4 class="text-center text-danger"><strong>'.$data->getSimulations()->count().'</strong></h4>
                                                                <div class="text-center">Taken</div>';
                                                    }
                                                ],
                                                [
                                                    'attribute'=>'time',
                                                    'format'=>'raw',
                                                    'value'=>function($data){
                                                        return ($data->timer_mode == 0)?'<h4 class="text-center text-danger"><strong>NO</strong></h4>
                                                                <div class="text-center">Timer</div>':'<h4 class="text-center text-danger"><strong>'.$data->time.'</strong></h4>
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
                                                [
                                                    'attribute'=>'id',
                                                    'format'=>'raw',
                                                    'value'=>function($data){
                                                        return '<br />'.Html::a('<i class="fa fa-chevron-right"></i> ', ['/simulation/preview', 'id'=>$data->id], ['class'=>'btn btn-danger']);
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
    </div>
</div>
</div>

