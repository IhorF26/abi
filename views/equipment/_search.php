<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquipmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="form-group" style="float: right; border: 1px solid; border-radius: 7px; padding: 8px; border-color: #adadad #c4e3f3;">
        <?= $form->field($model, 'name')->textInput(['style' => 'width: 250px; float: right;']) ?>


        <?= Html::submitButton('Szukaj', ['class' => 'btn btn-primary', 'style' => 'float: right;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
