<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Profile */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">
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
                            <div class="form-group form-action well">
                                <div class="text-right">
                                <?php //Html::a('<i class="fa fa-chevron-left"></i> <span>back to list</span>', ['index'], ['class' => 'btn btn btn-danger outline']) ?>
                                <?= Html::a('Update', ['profile/updatedetail'], ['class' => 'btn btn btn-danger outline']) ?>
                                
                                </div>
                            </div>

                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'id',
            'user_id',
            'first_name',
            'middle_name',
            'surname',
            'display_surname_preference',
            'suffix',
            'gender_id',
            'dob',
            'pob',
            'job',
            'street1:ntext',
            'street2:ntext',
            'city:ntext',
            'province_id',
            'country_id',
            'postal_code:ntext',
            'status',
            'photo',
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
