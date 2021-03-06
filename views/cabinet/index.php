<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CabinetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Pokój';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cabinet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>  Dodaj pokój', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header' =>('')],

            'cabinet_name',
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
           // 'company_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
