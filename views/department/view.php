<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = $model->department_name;
$this->params['breadcrumbs'][] = ['label' => 'Dział', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-view">

    <h1><?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Wróć do lista', ['index'], ['class' => 'btn btn-success']) ?>           <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualizacja', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Kasować', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Czy na pewno chcesz usunąć ten element?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         //   'id',
            'department_name',

        ],
    ]) ?>

</div>
