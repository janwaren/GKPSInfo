<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirKepanitiaan */

$this->title = 'Update Tugas Kepanitiaan: ' . $model->fullTimer->nama;
$this->params['breadcrumbs'][] = ['label' => 'Tugas Kepanitiaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="karir-kepanitiaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
