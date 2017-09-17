<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cabinet */

$this->title = 'Pokój aktualizacji: ' . $model->cabinet_name;
$this->params['breadcrumbs'][] = ['label' => 'Pokój', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualizacji';
?>
<div class="cabinet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
