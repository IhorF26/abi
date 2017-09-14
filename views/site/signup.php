<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup col-md-6 col-md-offset-2">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?php echo 'Please fill out the following fields to signup' ?></p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
				
				<?= $form->field($model, 'firstname') ?>
				<?= $form->field($model, 'lastname') ?>
				<?= $form->field($model, 'phone_number') ?>
				<?= $form->field($model, 'street') ?>
				<?= $form->field($model, 'house_number') ?>
				<?= $form->field($model, 'flat_number') ?>
				<?= $form->field($model, 'region') ?>
				<?= $form->field($model, 'zip_code') ?>				

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
