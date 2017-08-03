<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcJenisKendaraan */

$this->title = 'Update Jenis Kendaraan: ' . $model->jenis_kendaraan;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kendaraan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenis_kendaraan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="etc-jenis-kendaraan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
