<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerRiwayatHidup */

$this->title = 'Create Full Timer Riwayat Hidup';
$this->params['breadcrumbs'][] = ['label' => 'Full Timer Riwayat Hidups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-riwayat-hidup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
