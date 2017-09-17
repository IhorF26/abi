<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Worker */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pracownik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-view">

    <h1><?= Html::a('Wróć do listy pracowników', ['index'], ['class' => 'btn btn-success']) ?>           <?= Html::encode($this->title) ?></h1>

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
      //      'konfigurator_id',
            'num_kadrow',
            'name',
            'name2',
            'surname',
            'date_birthday',
            'email:email',
            'PESEL',
            'NIP',
            'phone_number',
            'street',
            'house_number',
            'flat_number',
            'zip_code',
            'region',
            'position',
        //    'typ_contract',
            [
                'label' => 'Firma',
                'attribute' => 'company',
                'format'=>'raw',
                'value' => $model->company->name !== null ? Html::encode($model->company->name) : 'no data'
            ],
        ],
    ]) ?>

</div>
