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
/* @var $model backend\models\Content */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-view">
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
                                    'id',
            'title',
            'content:ntext',
            'image',
            'type',
            'is_html',
            'status',
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
