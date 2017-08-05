<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatProgram */

$this->title = 'Update Program: ' . $model->jemaat->namaFull;
$this->params['breadcrumbs'][] = ['label' => 'Program Jemaat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jemaat-program-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
