<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Setting */

$this->title = 'Create Setting';
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-create">
	<div class="row">    
        <div class="col-md-12">
            <div class="container-menu">
                <div class="upper-menu">
                    <div class="title-icon"><i class="fa fa-male"></i></div>
                    <div class="upper-menu-title">
                        <i class="fa fa-male"></i> <?= Html::encode($this->title) ?>
                    </div>
                </div>
                <div class="middle-menu bg-white">
                    <div class="row">
                        <div class="col-md-12">                                   
                            <div class="text-right">
                            <?= Html::a('<i class="fa fa-chevron-left"></i> <span>back to list</span>', ['index'], ['class' => 'btn btn-info']) ?>
                            </div>
					    <?= $this->render('_form', [
					        'model' => $model,
					    ]) ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
