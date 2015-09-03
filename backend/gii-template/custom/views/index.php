
<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
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
                        <div class="text-right">
                            <?= "<?= " ?>Html::a('<i class="fa fa-plus"></i> <span>Create</span> ', ['create'], ['class' => 'btn btn-danger outline']) ?>
                        </div>
                        <?php if(!empty($generator->searchModelClass)): ?>
                        <?= "   <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
                        <?php endif; ?>


                        <?php if ($generator->indexWidgetType === 'grid'): ?>
                            <?= "   <?php " ?>\yii\widgets\Pjax::begin(); ?>
                            <?= "<?= " ?>GridView::widget([
                                'dataProvider' => $dataProvider,
                                <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => [\n" : "'columns' => [\n"; ?>
                                    ['class' => 'yii\grid\SerialColumn'],

                                <?php
                                $count = 0;
                                if (($tableSchema = $generator->getTableSchema()) === false) {
                                    foreach ($generator->getColumnNames() as $name) {
                                        if (++$count < 6) {
                                            echo "            '" . $name . "',\n";
                                        } else {
                                            echo "            // '" . $name . "',\n";
                                        }
                                    }
                                } else {
                                    foreach ($tableSchema->columns as $column) {
                                        $format = $generator->generateColumnFormat($column);
                                        if (++$count < 6) {
                                            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                                        } else {
                                            echo "            // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                                        }
                                    }
                                }
                                ?>

                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '<div class="btn-group">{view} {update} {delete}</div>',
                                    'buttons' => [
                                                    'view' => function ($url, $model, $key) {
                                                        return Html::a('<i class="fa fa-search"></i>', $url, ['class'=>'btn btn-xs btn-danger outline']);
                                                    },
                                                    'update' => function ($url, $model, $key) {
                                                        return Html::a('<i class="fa fa-pencil"></i>', $url, ['class'=>'btn btn-xs btn-danger outline']);
                                                    },
                                                    'delete' => function ($url, $model, $key) {
                                                        return Html::a('<i class="fa fa-trash"></i>', $url, ['class'=>'btn btn-xs btn-danger outline', 'data-confirm'=>'Are you sure you want to delete this item?', 'data-method'=>'post']);
                                                    },
                                    ]
                                ],
                            ],
                        ]); ?>
                        <?php else: ?>
                            <?= "<?= " ?>ListView::widget([
                                'dataProvider' => $dataProvider,
                                'itemOptions' => ['class' => 'item'],
                                'itemView' => function ($model, $key, $index, $widget) {
                                    return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
                                },
                            ]) ?>
                        <?php endif; ?>
                <?= "   <?php " ?>\yii\widgets\Pjax::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
