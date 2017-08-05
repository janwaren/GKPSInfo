<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerRiwayatHidup */

$this->title = 'Update Riwayat Hidup: ' . $model->fullTimer->nama;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Hidup', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-riwayat-hidup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
