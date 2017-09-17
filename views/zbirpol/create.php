<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Zbirpol */

$this->title = 'Dodaj pole';
$this->params['breadcrumbs'][] = ['label' => 'Pole', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zbirpol-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
