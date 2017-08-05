<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerKuliah */

$this->title = 'Update Kuliah: ' . $model->fullTimer->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kuliah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="full-timer-kuliah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
