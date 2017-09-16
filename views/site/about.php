<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'O nas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Powered by Ternopil-Company</h2>

    <p>
        Asystent ABI. Version 1.0.0      <?php echo "(".date("Y").")" ?>
    </p>
</div>
