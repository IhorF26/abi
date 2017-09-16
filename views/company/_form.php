<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Nazwę firmy') ?>

    <?= $form->field($model, 'nip')->textInput() ?>

    <?= $form->field($model, 'reg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <!--  <?= $form->field($model, 'department')->textInput()  ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Stwórz' : 'Aktualizacja', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
