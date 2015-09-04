<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Passage */

$this->title = 'Create Passage';
$this->params['breadcrumbs'][] = ['label' => 'Passages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passage-create">
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
					    <?= $this->render('_add', [
					        'model' => $model,
					    ]) ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
