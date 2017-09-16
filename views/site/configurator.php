<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/js/configurator.js');

$this->title = 'Configurator';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-configurator">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <div class="cabinet-form">
    <div class="col-lg-4">

        <?php echo '<h4> Please select worker</h4>';
        echo Html::dropDownList('worker', 'null', \app\models\Company::getWorkerList(Yii::$app->session->get('company')), $options = ['id' => 'selectedworker']) ?>

        <?php echo '<h4> Please select department</h4>';
        echo Html::dropDownList('department', 'null', \app\models\Company::getDepartmentList(Yii::$app->session->get('company')), $options = ['id' => 'selecteddepartment']) ?>

        <?php echo '<h4> Please select zbior</h4>';
        echo Html::dropDownList('zbior', 'null', ['0'=>'No Items'], $options = ['id' => 'selectedzbior']) ?>

        <?php // =  $form->field($model, 'department_id')->dropDownList($model->getDepartmentList(Yii::$app->session->get('company')),['prompt' => 'Please Choose Department']);?>
    </div>
        <div class="col-lg-4">

            <div id="zbior_fields" style="display: none;">
            <?php echo '<h4> Please select zbior fields</h4>';
            echo Html::dropDownList('zbior', 'null', ['0'=>'No Items'], $options = ['id' => 'selectedzbiorpol']) ?>
            </div>


        </div>

        <div class="form-group">
            <?php //= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

    
</div>
