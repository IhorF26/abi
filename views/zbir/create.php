<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Zbir */

$this->title = 'Create Zbir';
$this->params['breadcrumbs'][] = ['label' => 'Zbirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zbir-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
