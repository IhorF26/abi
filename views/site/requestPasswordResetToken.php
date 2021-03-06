<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Zażądaj hasła';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset col-md-6 col-md-offset-2">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Proszę wypełnić swój e-mail. Zostanie tam wysłane łącze do zresetowania hasła.</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Wysłać', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
