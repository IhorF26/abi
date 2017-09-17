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

    <div class="row">
    <div class="cabinet-form">

    <div class="col-lg-4">

        <?php echo '<h4> Please select worker</h4>';
        echo Html::dropDownList('worker', 'null', \app\models\Company::getWorkerList(Yii::$app->session->get('company')), $options = ['id' => 'selectedworker']) ?>

        <?php echo '<h4> Please select department</h4>';
        echo Html::dropDownList('department', 'null', \app\models\Company::getDepartmentList(Yii::$app->session->get('company')), $options = ['id' => 'selecteddepartment', 'prompt' => 'Choose Department']) ?>

        <div id="zbir" style="display: none;">
        <?php echo '<h4> Please select zbior</h4>';
        echo Html::dropDownList('zbir', 'null', ['0'=>'No Items'], $options = ['id' => 'selectedzbir', 'prompt' => 'Choose zbir'])?>
            <div id="no_zbir" style="display: none;"> </div>
         </div>

        <?php // =  $form->field($model, 'department_id')->dropDownList($model->getDepartmentList(Yii::$app->session->get('company')),['prompt' => 'Please Choose Department']);?>
    </div>
        <div class="col-lg-4">

            <div id="zbir_fields" style="display: none;">

            </div>
        </div>

        <div class="col-lg-4">

                <div id="other_fields" style="display: none;">
                    <?php echo '<h4> Please select cabinet</h4>';
                    echo Html::dropDownList('cabinet', 'null', \app\models\Company::getCabinetList(Yii::$app->session->get('company')), $options = ['id' => 'selectedcabinet']) ?>

                    <?php echo '<h4> Please select computer</h4>';
                    echo Html::dropDownList('computer', 'null', \app\models\Company::getEquipmentList(Yii::$app->session->get('company')), $options = ['id' => 'selectedcomputer']) ?>

                    <?php echo '<h4> Please select program</h4>';
                    echo Html::dropDownList('program', 'null', \app\models\Company::getProgramList(Yii::$app->session->get('company')), $options = ['id' => 'selectedprogram']) ?>

                    <div class="form-group"><br>
                        <?php // = Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        <?= Html::submitButton('Create', ['class' =>  'btn btn-success']) ?>
                    </div>

                </div>
        </div>


        </div>
    </div>

        <div class="form-group">
            <?php //= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

    
</div>
