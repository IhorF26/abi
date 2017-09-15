<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Ustawienia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
        <ul  style="list-style-type: none;">
        <br/>
        <li>
        <a href="/company/index" class="button" style="font-size:20px"><i class="fa fa-group" style="font-size:24px;color:cornflowerblue"> Firmy </i></a>
        </li><br/>
        <li>
        <a href="/cabinet/index" class="button" style="font-size:20px">Pomieszczenia  <i class="fa fa-key" style="font-size:24px;color:red"></i></a>
        </li><br/>
        <li>
        <a href="/equipment/index" class="button" style="font-size:20px"><i class="fa fa-desktop" style="font-size:24px;color:green"> Komputer </i></a>
        </li><br/>
        <li>
        <a href="/program/index" class="button" style="font-size:20px;color:black">Programów  <i class="fa fa-cloud" style="font-size:24px;color:orange"></i></a>
        </li><br/>
    </ul>

</div>
