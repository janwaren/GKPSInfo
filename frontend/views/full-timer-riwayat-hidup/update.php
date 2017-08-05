<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerRiwayatHidup */

$this->title = 'Update Full Timer Riwayat Hidup: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Full Timer Riwayat Hidups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="full-timer-riwayat-hidup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
