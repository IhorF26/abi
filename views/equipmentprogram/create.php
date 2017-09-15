<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EquipmentProgram */

$this->title = 'Create Equipment Program';
$this->params['breadcrumbs'][] = ['label' => 'Equipment Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-program-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
