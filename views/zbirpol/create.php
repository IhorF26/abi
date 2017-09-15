<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ZbirPol */

$this->title = 'Create Zbir Pol';
$this->params['breadcrumbs'][] = ['label' => 'Zbir Pols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zbir-pol-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
