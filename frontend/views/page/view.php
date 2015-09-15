<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Page */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">
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
                                    'class' => 'btn btn-danger',
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
            'slug',
            'content:ntext',
            'image',
            'type',
            'is_html',
            'status',
            'seo_title',
            'seo_keyword',
            'seo_description',
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
