                                                                                                                                                                                                                                                         <?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Subject */

$this->title = 'Create Subject';
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-create">
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
                            <div class="text-right">
                                <?= Html::a('<i class="fa fa-chevron-left"></i> <span>back to list</span>', ['index'], ['class' => 'btn btn-danger outline']) ?>
                            </div>
                            <div>&nbsp;</div>
    					    <?= $this->render('_formquestion', [
    					        'model' => $model,
                                'modelsDomain' => $modelsDomain,
                                'modelsQuestion' => $modelsQuestion
    					    ]) ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
