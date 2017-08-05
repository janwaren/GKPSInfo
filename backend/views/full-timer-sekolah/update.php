<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerSekolah */

$this->title = 'Update Sekolah: ' . $model->fullTimer->nama;
$this->params['breadcrumbs'][] = ['label' => 'Sekolah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="full-timer-sekolah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
