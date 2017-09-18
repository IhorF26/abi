<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Worker */

$this->title = 'Dodaj pracownika';
$this->params['breadcrumbs'][] = ['label' => 'Pracownik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
