<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirJemaat */

$this->title = 'Update Tugas Ber-Jemaat: ' . $model->fullTimer->nama;
$this->params['breadcrumbs'][] = ['label' => 'Tugas Ber-Jemaat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="karir-jemaat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
