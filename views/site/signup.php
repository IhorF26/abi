<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Zapisz się';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup col-md-6 col-md-offset-2">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?php echo 'Proszę wypełnić poniższe pola, aby się zarejestrować' ?></p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Nazwa Użytkownika') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Hasło') ?>
				
				<?= $form->field($model, 'firstname')->label('Imię') ?>
				<?= $form->field($model, 'lastname')->label('Nazwisko') ?>
				<?= $form->field($model, 'phone_number')->label('Numer telefonu') ?>
				<?= $form->field($model, 'street')->label('Ulica') ?>
				<?= $form->field($model, 'house_number')->label('Numer domu') ?>
				<?= $form->field($model, 'flat_number')->label('Numer mieszkania') ?>
				<?= $form->field($model, 'region')->label('Region') ?>
				<?= $form->field($model, 'zip_code') ?>				

                <div class="form-group">
                    <?= Html::submitButton('Zapisz ', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
