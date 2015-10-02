<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Passage;
use backend\models\Domain;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Subject */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-view">
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
                            <div class="form-group form-action">
                                <div class="text-right">
                                <?= Html::a('<i class="fa fa-chevron-left"></i> <span>back to list</span>', ['index'], ['class' => 'btn btn btn-danger outline']) ?>
                                <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-danger outline']) ?>
                                <?= Html::a('<i class="fa fa-trash"></i> Delete', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger outline',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                                </div>
                            </div>
                            <div role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-briefcase"></i> Subject</a></li>
                                    <li role="presentation"><a href="#domain" aria-controls="domain" role="tab" data-toggle="tab"><i class="fa fa-database"></i> Domain</a></li>
                                    <li role="presentation"><a href="#question" aria-controls="question" role="tab" data-toggle="tab"><i class="fa fa-dropbox"></i> Question</a></li>
                                    
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?= DetailView::widget([
                                                    'model' => $model,
                                                    'attributes' => [
                                                        'id_subject',
                                                        'name',
                                                        'desc:html',
                                                        'question_number',
                                                        'time',
                                                        'created',
                                                        'updated',
                                                    ],
                                                ]) ?>
                                            </div>
                                            <div class="col-md-12">
                                                <hr />
                                                <div class="form-group form-action">
                                                    <label>Setting Timer Mode</label>
                                                </div>
                                                <hr />
                                                <div class="form-group form-action">
                                                    <div class="text-right">
                                                    <?= Html::a('<i class="fa fa-eye"></i> Hide Explaination', ['explain', 'id' => $model->id, 'setting' => 0], [
                                                        'class' => ($model->explain_mode == 0)?'btn btn-danger disabled':'btn btn-danger',
                                                        'data' => [
                                                            'confirm' => 'Are you sure want apply this setting?',
                                                            'method' => 'post',
                                                        ],
                                                    ]) ?>
                                                    <?= Html::a('<i class="fa fa-eye-slash"></i> Show Explaination', ['explain', 'id' => $model->id, 'setting' => 1], [
                                                        'class' => ($model->explain_mode == 1)?'btn btn-danger disabled':'btn btn-danger',
                                                        'data' => [
                                                            'confirm' => 'Are you sure want apply this setting?',
                                                            'method' => 'post',
                                                        ],
                                                    ]) ?>
                                                    <?= Html::a('<i class="fa fa-clock-o"></i> No Timer', ['setting', 'id' => $model->id, 'setting' => 0], [
                                                        'class' => ($model->timer_mode == 0)?'btn btn-danger disabled':'btn btn-danger',
                                                        'data' => [
                                                            'confirm' => 'Are you sure want apply this setting?',
                                                            'method' => 'post',
                                                        ],
                                                    ]) ?>
                                                    <?= Html::a('<i class="fa fa-clock-o"></i> Timer / Exam', ['setting', 'id' => $model->id, 'setting' => 1], [
                                                        'class' => ($model->timer_mode == 1)?'btn btn-danger disabled':'btn btn-danger',
                                                        'data' => [
                                                            'confirm' => 'Are you sure you want apply this setting?',
                                                            'method' => 'post',
                                                        ],
                                                    ]) ?>
                                                    <?= Html::a('<i class="fa fa-clock-o"></i> Timer / Question', ['setting', 'id' => $model->id, 'setting' => 2], [
                                                        'class' => ($model->timer_mode == 2)?'btn btn-danger disabled':'btn btn-danger',
                                                        'data' => [
                                                            'confirm' => 'Are you sure you want apply this setting?',
                                                            'method' => 'post',
                                                        ],
                                                    ]) ?>
                                                    <?= Html::a('<i class="fa fa-clock-o"></i> Timer / Exam & Question', ['setting', 'id' => $model->id, 'setting' => 3], [
                                                        'class' => ($model->timer_mode == 3)?'btn btn-danger disabled':'btn btn-danger',
                                                        'data' => [
                                                            'confirm' => 'Are you sure you want apply this setting?',
                                                            'method' => 'post',
                                                        ],
                                                    ]) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="domain">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text-right">
                                            <?= GhostHtml::a('<i class="fa fa-plus-circle"></i> Add Domain', ['/domain/add', 'id'=>$model->id], ['class'=>'btn btn-danger outline btn-modal']); ?>
                                        </div>
                                        <?php \yii\widgets\Pjax::begin(); ?>
                                        <?= GridView::widget([
                                            'dataProvider' => new ActiveDataProvider([
                                                            'query' => $model->getDomains(),
                                            ]),
                                            'columns' => [
                                                            
                                                            'name',
                                                            [
                                                                'attribute'=>'percentage',
                                                                'format'=>'raw',
                                                                'value'=>function($data){
                                                                    return $data->percentage.'%';
                                                                }
                                                            ],
                                                            [
                                                                'class' => 'yii\grid\ActionColumn',
                                                                'template' => '<div class="btn-group pull-right">                                                                     
                                                                                                    <button type="button" class="btn btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                                                        <span class="caret"></span>
                                                                                                        <span class="sr-only">Toggle Dropdown</span>
                                                                                                    </button>
                                                                                                    <ul class="dropdown-menu" role="menu">
                                                                                                        <!--<li>{view}</li>-->
                                                                                                        <li>{update}</li>
                                                                                                        <li>{delete}</li>
                                                                                                    </ul>
                                                                                                </div>',
                                                                'buttons' => [
                                                                                'view' => function ($url, $model, $key) {
                                                                                    return GhostHtml::a('<i class="fa fa-search"></i> view', $url, ['class'=>'btn-modal']);
                                                                                },
                                                                                'update' => function ($url, $model, $key) {
                                                                                    return GhostHtml::a('<i class="fa fa-pencil"></i> update', Url::to(['/domain/update', 'id'=>$model->id]), ['class'=>'btn-modal']);
                                                                                },
                                                                                'delete' => function ($url, $model, $key) {
                                                                                    return GhostHtml::a('<i class="fa fa-trash"></i> delete', Url::to(['/domain/delete', 'id'=>$model->id]), ['class'=>'', 'data-confirm'=>'Are you sure you want to delete this item?', 'data-method'=>'post']);
                                                                                },
                                                                ]
                                                            ],
                                                        ],
                                                    ]); ?>
                                                <?php \yii\widgets\Pjax::end(); ?>  
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="question">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text-right">
                                                    <?= Html::a('<i class="fa fa-plus-circle"></i> Add Question', '#', ['class'=>'btn btn-danger outline btn-toggle']); ?>
                                                </div>
                                                <div>&nbsp;</div>
                                                <div>&nbsp;</div>
                                                <div class="col-md-12 hiddenx">
                                                    <div class="question-form">
                                                    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-form-question']); ?>
                                                    <?php $form = ActiveForm::begin([
                                                                                    'id' => 'dynamic-form',
                                                                                    'action'=>Url::to(['/question/add', 'id'=>$model->id]),
                                                                                    'options'=>[
                                                                                        'class'=>'form-ajax',
                                                                                    ]
                                                                            ]); ?>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <?php \yii\widgets\Pjax::begin(['id'=>'pjax-passage']); ?>
                                                            <?= $form->field($modelQuestion, 'passage_id')->widget(Select2::className(),  [
                                                                                                                'data' => ArrayHelper::map(Passage::find()->all(), 'id', 'name'),
                                                                                                                'options'=>['placeholder'=>'Choose Passage'],
                                                                                                                'pluginOptions'=>[
                                                                                                                   'allowClear'=>true 
                                                                                                                ],
                                                                                                                'pluginEvents'=>[
                                                                                                                    "change"=>"function(){
                                                                                                                        var id = $('#question-passage_id option:selected').val();
                                                                                                                        $.ajax({
                                                                                                                            'url':'".Url::to(['passage/getone'])."',
                                                                                                                            'data':{id:id},
                                                                                                                            'success':function(data){
                                                                                                                                $('#response-address').html(data);
                                                                                                                            }
                                                                                                                        });
                                                                                                                    }"
                                                                                                                ],
                                                                                                                'addon' => [
                                                                                                                    'append' => [
                                                                                                                        'content' => Html::a('<i class="fa fa-plus"></i>', ['/passage/add'], [
                                                                                                                            'class' => 'btn btn-danger btn-modal', 
                                                                                                                            'title' => 'Create new passage', 
                                                                                                                            'data-toggle' => 'tooltip'
                                                                                                                        ]),
                                                                                                                        'asButton' => true
                                                                                                                    ]
    ]
                                                                                                            ]) ?>

                                                             <div id="response-address"></div>
                                                            <?php \yii\widgets\Pjax::end(); ?>
                                                        </div>
                                                        <div class="col-sm-2">
                                                             <?= $form->field($modelQuestion, 'level')->widget(Select2::className(),  [
                                                                                                                'data' => ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'],
                                                                                                                'options'=>['placeholder'=>'Choose Level'],
                                                                                                                'pluginOptions'=>[
                                                                                                                   'allowClear'=>true 
                                                                                                                ],
                                                                                                            ]) ?>
                                                        </div>                                                        
                                                        <div class="col-sm-2">
                                                            <?= $form->field($modelQuestion, 'time')->textInput() ?>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <?= $form->field($modelQuestion, 'is_random')->widget(SwitchInput::classname(), []); ?>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <?= $form->field($modelQuestion, 'question')->widget(\yii\redactor\widgets\Redactor::className(), [
                                                                'clientOptions' => [
                                                                    'plugins' => ['clips', 'fontcolor','imagemanager', 'fontfamily', 'fontsize', 'table', 'filemanager', 'fullscreen']
                                                                ]
                                                            ])?>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <?= $form->field($modelQuestion, 'explaination')->widget(\yii\redactor\widgets\Redactor::className(), [
                                                                'clientOptions' => [
                                                                    'plugins' => ['clips', 'fontcolor','imagemanager', 'fontfamily', 'fontsize', 'table', 'filemanager', 'fullscreen']
                                                                ]
                                                            ])?>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h3>domains</h3>
                                                            <hr />
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="">
                                                                <?php DynamicFormWidget::begin([
                                                                    'widgetContainer' => 'dynamicform_wrapper3', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                                                    'widgetBody' => '.container-items3', // required: css class selector
                                                                    'widgetItem' => '.item3', // required: css class
                                                                    'limit' => 2, // the maximum times, an element can be cloned (default 999)
                                                                    'min' => 1, // 0 or 1 (default 1)
                                                                    'insertButton' => '.add-item3', // css class
                                                                    'deleteButton' => '.remove-item3', // css class
                                                                    'model' => $modelsDomain[0],
                                                                    'formId' => 'dynamic-form',
                                                                    'formFields' => [
                                                                        'domain_id',
                                                                    ],
                                                                ]); ?>

                                                                <div class="row container-items3"><!-- widgetContainer -->
                                                                <?php foreach ($modelsDomain as $x => $modelDomain): ?>
                                                                    <div class="col-md-3 item3"><!-- widgetBody -->                                                                        
                                                                        <?php
                                                                            // necessary for update action.
                                                                            if (! $modelDomain->isNewRecord) {
                                                                                echo Html::activeHiddenInput($modelDomain, "[{$x}]id");
                                                                            }
                                                                        ?>
                                                                        <div class="row">
                                                                            <div class="col-md-10">
                                                                                <?= $form->field($modelDomain, '['.$x.']domain_id')->widget(Select2::className(),  [
                                                                                                                'data' => ArrayHelper::map(Domain::find()->where(['subject_id'=>$model->id])->all(), 'id', 'name'),
                                                                                                                'options'=>['placeholder'=>'Choose Domain'],
                                                                                                                'pluginOptions'=>[
                                                                                                                   'allowClear'=>true 
                                                                                                                ]
                                                                                                            ]);
                                                                                ?>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <div>&nbsp;</div>
                                                                                <button type="button" class="add-item3 btn btn-info btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                                                                <button type="button" class="remove-item3 btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                                </div>
                                                            <?php DynamicFormWidget::end(); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h3>options</h3>
                                                            <hr />
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="">
                                                                <?php DynamicFormWidget::begin([
                                                                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                                                    'widgetBody' => '.container-items', // required: css class selector
                                                                    'widgetItem' => '.item', // required: css class
                                                                    'limit' => 10, // the maximum times, an element can be cloned (default 999)
                                                                    'min' => 4, // 0 or 1 (default 1)
                                                                    'insertButton' => '.add-item', // css class
                                                                    'deleteButton' => '.remove-item', // css class
                                                                    'model' => $modelsOption[0],
                                                                    'formId' => 'dynamic-form',
                                                                    'formFields' => [
                                                                        'option',
                                                                        'is_coreect',
                                                                        'answer'
                                                                    ],
                                                                ]); ?>

                                                                <div class="row container-items"><!-- widgetContainer -->
                                                                <?php foreach ($modelsOption as $i => $modelOption): ?>
                                                                    <div class="col-md-12 item"><!-- widgetBody -->
                                                                        
                                                                            <?php
                                                                                // necessary for update action.
                                                                                if (! $modelOption->isNewRecord) {
                                                                                    echo Html::activeHiddenInput($modelOption, "[{$i}]id");
                                                                                }
                                                                            ?>
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <?= $form->field($modelOption, '['.$i.']option')->textInput(['maxlength' => true]) ?>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <label>&nbsp;</label>
                                                                                    <?= $form->field($modelOption, '['.$i.']is_correct')->checkbox(['class'=>'checkbox-answer']); ?>
                                                                                </div>

                                                                                <div class="col-sm-5">
                                                                                    <?= $form->field($modelOption, '['.$i.']answer')->textArea(['maxlength' => true]) ?>
                                                                                </div>
                                                                                <div class="col-md-1">                                
                                                                                    <br /><br />
                                                                                    <button type="button" class="add-item btn btn-info btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                                                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                                </div>
                                                            <?php DynamicFormWidget::end(); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-action well">
                                                                <?= Html::submitButton($modelQuestion->isNewRecord ? '<i class="fa fa-save"></i> Create' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-danger outline' : 'btn btn-danger outline']) ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php ActiveForm::end(); ?>
                                                    <?php \yii\widgets\Pjax::end(); ?>
                                                    </div>
                                                </div>
                                                <div>&nbsp;</div>
                                                <div>&nbsp;</div>
                                                <div>&nbsp;</div>
                                                <div><hr /></div>
                                                
                                                <?php \yii\widgets\Pjax::begin(['id'=>'grid-question']); ?>
                                                <?= GridView::widget([
                                                    'dataProvider' => new ActiveDataProvider([
                                                        'query' => $model->getQuestions(),
                                                    ]),
                                                    'columns' => [  
                                                        'id_question',
                                                        [
                                                            'attribute'=>'passage_id',
                                                            'format'=>'raw',
                                                            'value'=>function($data){
                                                                return (isset($data->passage->name)?$data->passage->name:'');
                                                            }
                                                        ],
                                                        'question:html',
                                                        'level',
                                                        [
                                                            'attribute'=>'time',
                                                            'format'=>'raw',
                                                            'value'=>function($data){
                                                                return $data->time.' Minutes';
                                                            }
                                                        ],
                                                        [
                                                            'attribute'=>'is_random',
                                                            'format'=>'raw',
                                                            'value'=>function($data){
                                                                return ($data->is_random == 0)?'<i class="fa fa-times"></i>':'<i class="fa fa-check"></i>';
                                                            }
                                                        ],
                                                        [
                                                            'attribute'=>'domains',
                                                            'format'=>'raw',
                                                            'value'=>function($data){
                                                                $domains = $data->questionDomains;
                                                                if($domains != NULL):
                                                                    foreach ($domains as $key => $domain) {
                                                                        $d[] = $domain->domain->name;
                                                                    }
                                                                    return implode(',', $d);
                                                                else:
                                                                    return '';
                                                                endif;
                                                            }
                                                        ],
                                                        [
                                                            'class' => 'yii\grid\ActionColumn',
                                                            'template' => '<div class="btn-group pull-right">                                                                     
                                                                                                <button type="button" class="btn btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                                                    <span class="caret"></span>
                                                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                                                </button>
                                                                                                <ul class="dropdown-menu" role="menu">
                                                                                                    <!--<li>{view}</li>-->
                                                                                                    <li>{update}</li>
                                                                                                    <li>{delete}</li>
                                                                                                </ul>
                                                                                            </div>',
                                                            'buttons' => [
                                                                            'view' => function ($url, $model, $key) {
                                                                                return GhostHtml::a('<i class="fa fa-search"></i> view', $url, ['class'=>'btn-modal']);
                                                                            },
                                                                            'update' => function ($url, $model, $key) {
                                                                                return GhostHtml::a('<i class="fa fa-pencil"></i> update', Url::to(['/question/update', 'id'=>$model->id]), ['class'=>'']);
                                                                            },
                                                                            'delete' => function ($url, $model, $key) {
                                                                                return GhostHtml::a('<i class="fa fa-trash"></i> delete', Url::to(['/question/delete', 'id'=>$model->id]), ['class'=>'', 'data-confirm'=>'Are you sure you want to delete this item?', 'data-method'=>'post']);
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
                </div> 
            </div>
        </div>
    </div>
</div>
