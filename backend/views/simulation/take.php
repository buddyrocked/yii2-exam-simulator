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
                <h1 class="bebas">You may select one exam to take from our list. </h1>
                <div>Here is the list of the exams available to take. We are consistently adding more exams to the list for you.</div>
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
                                                        $client = (isset($data->desc))?substr($data->desc, 0, 9999):'-';
                                                        return '<div class="col-md-10"><h4 class="text-upper"><strong>'.Html::a($data->name, ['/simulation/preview', 'id'=>$data->id], []).'</strong></h4></div'.$client;
                                                    }
                                                ],
                                                [
                                                    'attribute'=>'time',
                                                    'format'=>'raw',
                                                    'value'=>function($data){
                                                        return 'Taken <class="text-upper"><strong>'.$data->getSimulations()->count().'</strong> times since launced<div>&nbsp;</div>
                                                                Exam Duration <class"text-upper"><strong>'.$data->time.'</strong> Minutes<div>&nbsp;</div>
                                                                #Questions:<class"text-upper"><strong>'.$data->question_number.'</strong><div>&nbsp;</div>
                                                                ';
                                                    }
                                                ],
                                                /*[
                                                    'attribute'=>'time',
                                                    'format'=>'raw',
                                                    'value'=>function($data){
                                                        return ($data->timer_mode == 0)?'<h4 class="text-center text-danger"><strong>N/A</strong></h4>'
                                                                :'<div class="text-center">Exam Duration (Minutes)</div>
                                                                <h4 class="text-center text-danger"><strong>'.$data->time.'</strong></h4>';
                                                    }
                                                ],
                                                 [
                                                    'attribute'=>'question_number',
                                                    'format'=>'raw',
                                                    'value'=>function($data){
                                                        return '<div class="text-center">#Questions</div>
                                                                <h4 class="text-center text-danger"><strong>'.$data->question_number.'</strong></h4>';
                                                    }
                                                ],*/
                                                [
                                                    'attribute'=>'id',
                                                    'format'=>'raw',
                                                    'value'=>function($data){
                                                        return '<br />'.Html::a('<i class="fa"></i>Take Exam ', ['/simulation/preview', 'id'=>$data->id], ['class'=>'btn btn-danger']);
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

