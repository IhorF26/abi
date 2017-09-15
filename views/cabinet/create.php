<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cabinet */

$this->title = 'Utworzyć pomieszczenia';
$this->params['breadcrumbs'][] = ['label' => 'Nazwa pomieszczenia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cabinet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
