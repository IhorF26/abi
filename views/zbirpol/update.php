<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ZbirPol */

$this->title = 'Update Zbir Pol: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Zbir Pols', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zbir-pol-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
