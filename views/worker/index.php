<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista pracowników';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>  Dodaj pracownika', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header' =>('')],

         //   'id',
         // 'konfigurator_id',
            'num_kadrow',
            'name',
            'name2',
            'surname',
        //    'date_birthday',
        //    'email:email',
        //    'PESEL',
        //    'NIP',
        //    'phone_number',
        //    'street',
        //    'house_number',
        //    'flat_number',
        //    'zip_code',
        //    'region',
        //    'position',
        //    'typ_contract',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
