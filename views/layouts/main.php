<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body style="background: whitesmoke">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
	    if (Yii::$app->user->isGuest) {
           NavBar::begin([
                'brandLabel' => 'Asystent ABI',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
           $menuItems = [
			   ['label' => 'Zaloguj', 'url' => ['/site/login']],
               ['label' => 'Zarejestrować', 'url' => ['/site/signup']],
           ];
           echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
           NavBar::end();
    } else {
		    $user_id = Yii::$app->user->getId();
			$companyname = 'Brak firmy';
			if (Yii::$app->session->get('company')) {
			$companyname = \app\models\User_Company::find()->where(['and',['user_id' => $user_id],['company_id' => Yii::$app->session->get('company')]])->one()->company->name;				
			}

			
            NavBar::begin([
                'brandLabel' => 'Asystent ABI - ('.Html::encode($companyname).')',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'O nas', 'url' => ['/site/about']],
                ['label' => 'Kontakt', 'url' => ['/site/contact']],

            ];
			
                $menuItems[] = '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                         'Wyloguj'.' (' . Html::encode(Yii::$app->user->identity->username) . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>';
			
//			$menuItems[] = '<li>'
//			. Yii::$app->session->get('company') !== null ?  Html::encode(Yii::$app->session->get('company')) : 'no company'
//			.'</li>';
					
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
			
            NavBar::end();
			}
    ?>

	
	
	

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?php if (Yii::$app->user->isGuest) { ?>
        <div class="col-lg-9">
            <?= $content ?>
        </div>
        <?php } else {?>
        <div class = "row">
             <div class="col-lg-3" style="border-right:1px solid #000;height:600px;">
                <hr>
                <ul  style="list-style-type: none;">
                    <h4><i class="fa fa-file" style="font-size:24px;"></i> Dokumentacja ABI</h4>
                    <br/>
                    <li>
                        <a href="/site/configurator" class="button" style="font-size:20px">Konfigurator  <i class="fa fa-cogs" style="font-size:24px;color:#c5571e"></i></a>
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

                    <h4><i class="fa fa fa-wrench" style="font-size:24px; color: black"></i> Ustawienia</h4>
                    <br/>
                    <li>
                        <a href="/company/index" class="button" style="font-size:20px"> Firmy <i class="fa fa-group" style="font-size:24px;color:cornflowerblue"></i></a>
                    </li><br/>
                    <li>
                        <a href="/cabinet/index" class="button" style="font-size:20px">Pomieszczenia  <i class="fa fa-key" style="font-size:24px;color:cornflowerblue"></i></a>
                    </li><br/>
                    <li>
                        <a href="/zbirpol/index" class="button" style="font-size:20px"> Pola zbiory  <i class="fa fa-sitemap" style="font-size:24px;color:cornflowerblue"></i></a>
                    </li><br/>
                    <li>
                       <a href="/equipment/index" class="button" style="font-size:20px"> Komputer <i class="fa fa-desktop" style="font-size:24px;color:cornflowerblue"></i></a>
                    </li><br/>
                    <li>
                        <a href="/program/index" class="button" style="font-size:20px;"> Programów  <i class="fa fa-cloud" style="font-size:24px;color:cornflowerblue"></i></a>
                    </li><br/>
                    </ul>
                </ul>
            </div>
              <div class="col-lg-9">
        <?= $content ?>
    </div>
            <?php } ?>
    </div>
</div>

</div>
<footer class="footer" style="background: snow">
    <div class="container">
        <p class="pull-left">&copy; Asystent ABI <?= date('Y') ?></p>

        <p class="pull-right">Powered by Ternopil-Company</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
