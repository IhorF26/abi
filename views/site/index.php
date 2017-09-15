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
        echo '<h4> Moje firmy:</h4>';
		// $form->field($profile, 'party_id')->dropDownList($profile->PartyList,['prompt' => Yii::t('template/labels','Please Choose Party')]);
		echo Html::dropDownList('company_id', 'null', $mycompanies, $options = ['id' => 'selectcompany',
            'options' => [Yii::$app->session->get('company') => ['Selected'=>'selected']], 'class' => "btn btn-primary dropdown-toggle", 'type'=>"button", 'data-toggle'=>"dropdown"]);
		echo '&nbsp;&nbsp;&nbsp';
		echo Html::submitButton('Zmienić firmę', ['id' => 'go_company', 'class' => 'btn btn-success btn-sm']);
        ActiveForm::end(); ?>
		<?php else: ?>	
		<p>
        <?= Html::a('Utwórz firmę', ['company/create'], ['class' => 'btn btn-success']) ?>
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
<<<<<<< HEAD
=======
            <div class="col-lg-3" style="border-right:1px solid #000;height:300px;">
                <hr>
                <ul  style="list-style-type: none;">
                    <h4><i class="fa fa-file" style="font-size:24px;"></i> Dokumentacja ABI</h4>
                    <br/>
                    <br/>
                    <li>
                        <a href="" class="button" style="font-size:20px">Konfigurator  <i class="fa fa-cogs" style="font-size:24px;color:#c5571e"></i></a>
                    </li><br/>
                    <li>
                        <a href="/worker/index" class="button" style="font-size:20px">Pracownicy  <i class="fa fa-id-card-o" style="font-size:24px;color:#c5571e"></i></a>
                    </li><br/>
                    <li>
                        <a href="/department/index" class="button" style="font-size:20px"> Działy <i class="fa fa-object-group" style="font-size:24px;color:#c5571e"></i></a>
                    </li><br/>
                     <li>
                        <a href="/zbir/index" class="button" style="font-size:20px">Zbiory  <i class="fa fa-cubes" style="font-size:24px;color:#c5571e"></i></a>
                    </li><br/>

                    <br/>

                    <li>
                        <a href="/site/catalogues" class="button" style="font-size:20px; color: limegreen"><i class="fa fa fa-wrench" style="font-size:24px;color:green"></i> Ustawienia </a>
                    </li><br/>

                </ul>
            </div>

>>>>>>> 404887e8db375a3b9923eeb909cc2f9ba174a258
            <div class="col-lg-3">
                <hr>
                <h2>Bezpieczeństwo</h2>

                <p>Bezpieczeństwo</p>
			
			<div class="unit-left"><img src="../images/pechat1.jpg" alt="" style="margin-top: 10px;" class="img-responsive img-circle"></div>
			
            </div>
            <div class="col-lg-3">
                <hr>
                <h2>Zamówienie</h2>

                <p>Zamówienie</p>

			<div class="unit-left"><img src="../images/documents.jpg" alt="" style="margin-top: 10px;" class="img-responsive img-circle"></div>
            </div>
            <div class="col-lg-3">
                <hr>
                <h2>Prawo</h2>

          <p>Zgodność z prawem</p>

			<div class="unit-left"><img src="../images/law.jpg" alt="" style="margin-top: 10px;" class="img-responsive img-circle"></div>
            </div>
        </div>

    </div>
</div>
