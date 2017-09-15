<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'ABI Asystent';
?>
<div class="site-index">

        <div class="row">
            <div class="col-lg-4">
       	 <?php if (Yii::$app->session->get('company')): ?>
		<?php $form = ActiveForm::begin(['id' => 'set_company', 'action' => '']);
		$mycompanies = $user->getCompaniesList($user->id);
        echo '<h4> My Companies</h4>';
		// $form->field($profile, 'party_id')->dropDownList($profile->PartyList,['prompt' => Yii::t('template/labels','Please Choose Party')]);
		echo Html::dropDownList('company_id', 'null', $mycompanies, $options = ['id' => 'selectcompany','options' => [Yii::$app->session->get('company') => ['Selected'=>'selected']]]);			
		echo Html::submitButton('Change Company', ['id' => 'go_company', 'class' => 'btn btn-success btn-sm']);
        ActiveForm::end(); ?>
		<?php else: ?>	
		<p>
        <?= Html::a('Create Company', ['company/create'], ['class' => 'btn btn-success']) ?>
		</p>
		<?php endif; ?>
         <hr>
            </div>


      <div class="jumbotron">
        <h1>Asystent ABI</h1>

       </div>
	</div>
	
    <div class="body-content">

        <div class="row">
            <div class="col-lg-3">
                <hr>
                <h2>Security</h2>

                <p>Security</p>
			
			<div class="unit-left"><img src="../images/pechat1.jpg" alt="" style="margin-top: 10px;" class="img-responsive img-circle"></div>
			
            </div>
            <div class="col-lg-3">
                <hr>
                <h2>Order</h2>

                <p>Order</p>

			<div class="unit-left"><img src="../images/documents.jpg" alt="" style="margin-top: 10px;" class="img-responsive img-circle"></div>
            </div>
            <div class="col-lg-3">
                <hr>
                <h2>Law</h2>

          <p>Compliance with the law</p>

			<div class="unit-left"><img src="../images/law.jpg" alt="" style="margin-top: 10px;" class="img-responsive img-circle"></div>
            </div>
        </div>

    </div>
</div>
