<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'ABI Asystent';
?>
<div class="site-index">

        <div class="row">
            <div class="col-lg-6">
       	 <?php if (Yii::$app->session->get('company')): ?>
		<?php $form = ActiveForm::begin(['id' => 'set_company', 'action' => '']);
		$mycompanies = $user->getCompaniesList($user->id);
        echo '<h4> Moje firmy:</h4>';
		// $form->field($profile, 'party_id')->dropDownList($profile->PartyList,['prompt' => Yii::t('template/labels','Please Choose Party')]);
		echo Html::dropDownList('company_id', 'null', $mycompanies, $options = ['id' => 'selectcompany',
            'options' => [Yii::$app->session->get('company') => ['Selected'=>'selected']], 'class' => "btn btn-primary dropdown-toggle", 'type'=>"button", 'data-toggle'=>"dropdown"]);
        echo '&nbsp;&nbsp;&nbsp';
		echo Html::submitButton('<i class="fa fa-university" aria-hidden="true"></i> Zmienić firmę', ['id' => 'go_company', 'class' => 'btn btn-success btn-sm']);
        ActiveForm::end(); ?>
		<?php else: ?>	
		<p>
        <?= Html::a('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Dodaj firmę', ['company/create'], ['class' => 'btn btn-success']) ?>
		</p>
		<?php endif; ?>
        <hr>
            </div>

	    </div>
    <div class="jumbotron">
        <h1 style="color: #000066; "><strong>Asystent ABI</strong></h1>
    </div>

    <div class="body-content">

           <div class="col-lg-4">
                <hr>
                <h2>Bezpieczeństwo</h2>

                <p>Bezpieczeństwo</p>
			
			<div class="unit-left"><img src="../images/pechat1.jpg" alt="" style="margin-top: 10px;" class="img-responsive img-circle"></div>
			
            </div>
            <div class="col-lg-4">
                <hr>
                <h2>Zamówienie</h2>

                <p>Zamówienie</p>

			<div class="unit-left"><img src="../images/documents.jpg" alt="" style="margin-top: 10px;" class="img-responsive img-circle"></div>
            </div>
            <div class="col-lg-4">
                <hr>
                <h2>Prawo</h2>

          <p>Zgodność z prawem</p>

			<div class="unit-left"><img src="../images/law.jpg" alt="" style="margin-top: 10px;" class="img-responsive img-circle"></div>
            </div>
        </div>

</div>
