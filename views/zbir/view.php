<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Zbir */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Zbiory', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zbir-view">

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
            'id',
            'name',
            'description',
            [
                'label' => "Dział",
                'attribute' => 'department',
                'format'=>'raw',
                'value' => $model->department->department_name !== null ? Html::encode($model->department->department_name) : 'no data'
            ],
            [
                'label' => 'Firma',
                'attribute' => 'company',
                'format'=>'raw',
                'value' => $model->department->company->name !== null ? Html::encode($model->department->company->name) : 'no data'
            ],
        ],
    ]) ?>

</div>
