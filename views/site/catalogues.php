<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Catalogues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
        <ul  style="list-style-type: none;">
        <li>
        <a href="/company/index" class="button" style="font-size:20px"><i class="fa fa-group" style="font-size:24px;color:cornflowerblue"> Companies </i></a>
        </li>
        <li>
        <a href="/worker/index" class="button" style="font-size:20px">Workers  <i class="fa fa-user" style="font-size:24px;color:red"></i></a>
        </li>
    </ul>

</div>
