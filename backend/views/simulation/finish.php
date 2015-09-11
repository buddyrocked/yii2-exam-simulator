<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Exam Simulator';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-content first-content" id="index-content">
	<div class="row">    
        <div class="col-md-8"> 
            <div class="container-menu">
                <div class="upper-menu">
                    <div class="upper-menu-title">
                        Finish
                    </div>
                </div>
                <div class="middle-menu bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="well">
                                <h1 class="bebas">Congratulation Guys..!!!</h1>
                                <div>Exam Simulation already finish.</div>
                                <pre>
                                <?php print_r($model->getScore()->asArray()->all()); ?>
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        	<div class="container-menu">
                <div class="middle-menu bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Time : </label>
                            <div class="well">
                                <h1 class="text-center bebas text-bold">00:13:00</h1>
                            </div>
                            <?= Html::a('<i class="fa fa-check"></i> Close Exam', ['postfinish', 'id'=>$model->id], ['class' => 'btn-lg btn-block btn btn-danger', 'data' => [
                                        'confirm' => 'Are you sure you want to close this exam?',
                                        'method' => 'post',
                                    ]
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

