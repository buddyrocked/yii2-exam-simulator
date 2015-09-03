<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">
    <div class="row">    
        <div class="col-md-12">
            <div class="container-menu">
                <div class="upper-menu">
                    <div class="title-icon"><i class="fa fa-list-alt"></i></div>
                    <div class="upper-menu-title">
                        <?= "<?= " ?>Html::encode($this->title) ?>
                    </div>
                </div>
                <div class="middle-menu bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-action">
                                <div class="text-right">
                                <?= "<?= " ?>Html::a('<i class="fa fa-chevron-left"></i> <span>back to list</span>', ['index'], ['class' => 'btn btn btn-danger outline']) ?>
                                <?= "<?= " ?>Html::a('<i class="fa fa-pencil"></i> Update', ['update', <?= $urlParams ?>], ['class' => 'btn btn-danger outline']) ?>
                                <?= "<?= " ?>Html::a('<i class="fa fa-trash"></i> Delete', ['delete', <?= $urlParams ?>], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
                                        'method' => 'post',
                                    ],
                                ]) ?>
                                </div>
                            </div>

                            <?= "<?= " ?>DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                        <?php
                        if (($tableSchema = $generator->getTableSchema()) === false) {
                            foreach ($generator->getColumnNames() as $name) {
                                echo "            '" . $name . "',\n";
                            }
                        } else {
                            foreach ($generator->getTableSchema()->columns as $column) {
                                $format = $generator->generateColumnFormat($column);
                                echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                            }
                        }
                        ?>
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
