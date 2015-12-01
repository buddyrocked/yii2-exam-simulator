<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\EventRegistration */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Event Registrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index first-content">
    <div class="container">
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

                                <?= DetailView::widget([
                                    'model' => $model,
                                    'attributes' => [
                                        [
                                            'attribute'=>'event_id',
                                            'value'=>isset($model->event->name)?$model->event->name:''
                                        ],
                                        'prefix',
                                        'name',
                                        'phone',
                                        'email:email',
                                        'address:ntext',
                                        [
                                            'attribute'=>'registered_by',
                                            'value'=>($model->registered_by == 0)?'Personal':'Company'
                                        ],
                                        'job_title',
                                        'company',
                                        'company_address:ntext',
                                        'city',
                                        'postal_code',
                                        'company_phone',
                                        'company_fax',
                                        'approved_by',
                                        'designation',
                                        'created',
                                        'updated',
                                    ],
                                ]) ?>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
