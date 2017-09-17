<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ZbirpolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pola listy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zbirpol-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Utwórz', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header' =>('L.p.')],
         //   'id',
            'name',
            'description',
            'status',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'zbir_id',
                'filter' => true,
                'format' => 'raw',
                'label' => 'Zbior',
                'value' => function ($model) {
                    return  $model->zbir->name;
                },
            ],
            // 'company_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
