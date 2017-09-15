<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cabinet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-4">
<div class="cabinet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'department_id')->dropDownList($model->getDepartmentList(Yii::$app->session->get('company')),['prompt' => 'Please Choose Department']);?>

    <?= $form->field($model, 'cabinet_name')->textInput(['maxlength' => true]) ?>

    <?php  // = $form->field($model, 'company_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>