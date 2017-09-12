<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login col-lg-6 col-sm-6 col-lg-offset-4 col-sm-offset-4" style="margin-top:30px">
    
	
	<div class="modal-content">
	
	<div class="modal-header" style="padding:15px 25px;">
    <h1> <span class="glyphicon glyphicon-lock"></span> <?= $this->title ?></h1>
	</div>
	
	<div class="row">
    <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
	

    <!--<p>Please fill out the following fields to login:</p>-->


		
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    <?= 'If you forgot your password you can '.Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('<span class="glyphicon glyphicon-log-in"></span> Login', ['class' => 'btn btn-primary login-btn', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
	 </div>
	</div>
    		<?php if (Yii::$app->session->hasFlash('success')): ?>
			<div class="alert alert-success alert-dismissable">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			<h4><i class="icon fa fa-check"></i>Success</h4>
			<?= Yii::$app->session->getFlash('success') ?>
			</div>
			<?php endif; ?>
			
             <?php if (Yii::$app->session->hasFlash('error')): ?>
             <div class="alert alert-success alert-dismissable">
             <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
             <h4><i class="icon fa fa-check"></i>Not Found</h4>
             <?= Yii::$app->session->getFlash('error') ?>
             </div>
             <?php endif; ?>
	
        </div>

</div>
