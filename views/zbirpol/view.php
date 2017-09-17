<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Zbirpol */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pola zbiory', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zbirpol-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
     //       'id',
            'name',
            'description',
            [
                'label' => "Status",
                'attribute' => 'status',
                'format'=>'raw',
                'value' => $model->status == 1 ? "ON" : 'OFF'
            ],
            [
                'label' => "Zbior",
                'attribute' => 'zbir',
                'format'=>'raw',
                'value' => $model->zbir->name !== null ? Html::encode($model->zbir->name) : 'no data'
            ],
            [
                'label' => 'Firma',
                'attribute' => 'company',
                'format'=>'raw',
                'value' => $model->company->name !== null ? Html::encode($model->company->name) : 'no data'
            ],
        ],
    ]) ?>

</div>
