<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerRiwayatHidup */

$this->title = 'Update Riwayat Hidup: ' . $model->fullTimer->nama;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Hidups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="full-timer-riwayat-hidup-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
