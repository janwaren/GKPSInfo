<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcJenisSuratTanah */

$this->title = 'Update Jenis Surat Tanah: ' . $model->jenis_surat_tanah;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Surat Tanah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenis_surat_tanah, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="etc-jenis-surat-tanah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
