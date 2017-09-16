<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zbirpol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zbirpol-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'zbir_id')->dropDownList(app\models\Company::getZbirList(Yii::$app->session->get('company')),['prompt' => 'Wybierz zbior'])->label('Nazwa zbiory');?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
