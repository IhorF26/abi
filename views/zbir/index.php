<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ZbirSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista zbiory';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zbir-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tworzyć Zbior', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
          //  'id',
            'name',
            'description',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'department_id',
                'filter' => true,
                'format' => 'raw',
                'label' => 'Dział',
                'value' => function ($model) {
                    return  $model->department->department_name;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
