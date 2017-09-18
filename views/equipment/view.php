<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Urządzenia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-view">

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
          //  'id',
            [
                'label' => 'Pokój',
                'attribute' => 'cabinet',
                'format'=>'raw',
                'value' => $model->cabinet->cabinet_name !== null ? Html::encode($model->cabinet->cabinet_name) : 'no data'
            ],
            'name',
            'description',
            [
                'label' => 'Firma',
                'attribute' => 'company',
                'format'=>'raw',
                'value' => $model->company->name !== null ? Html::encode($model->company->name) : 'no data'
            ],
        ],
    ]) ?>

</div>
