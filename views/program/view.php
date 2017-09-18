<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Program */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Programy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-view">

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
            'name',
            'description',
            [
                'label' => 'Dział',
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
