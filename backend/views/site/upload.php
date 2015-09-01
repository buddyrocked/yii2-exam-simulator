<?php
/* @var $this yii\web\View */

$this->title = 'R-CSRP (Rialachas Consulting Service Resource Planning)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>
    
</div>
