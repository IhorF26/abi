<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Worker */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="worker-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_kadrow')->textInput(['style'=>'width: 200px']) ?>

    <?= $form->field($model, 'name')->textInput(['style'=>'width: 400px']) ?>

    <?= $form->field($model, 'name2')->textInput(['maxlength' => true, 'style'=>'width: 400px']) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true, 'style'=>'width: 400px']) ?>

    <?  echo '<label class="control-label">Birth Date</label>'; ?>

    <div class="worker-form">

    <?  echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'date_birthday',
        'language' => 'pl',
        'dateFormat' => 'yyyy-MM-dd',
    ]);
    ?>

    </div><br/>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'style'=>'width: 250px']) ?>

    <?= $form->field($model, 'PESEL')->textInput(['style'=>'width: 200px']) ?>

    <?= $form->field($model, 'NIP')->textInput(['style'=>'width: 200px']) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'style'=>'width: 200px']) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true, 'style'=>'width: 500px']) ?>

    <?= $form->field($model, 'house_number')->textInput(['maxlength' => true, 'style'=>'width: 150px']) ?>

    <?= $form->field($model, 'flat_number')->textInput(['maxlength' => true, 'style'=>'width: 150px']) ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true, 'style'=>'width: 150px']) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true, 'style'=>'width: 500px']) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true, 'style'=>'width: 500px']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Stwórz' : 'Aktualizacja', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
