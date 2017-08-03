<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcRelasiKeluarga */

$this->title = 'Update Relasi Keluarga: ' . $model->nama_relasi;
$this->params['breadcrumbs'][] = ['label' => 'Etc Relasi Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_relasi, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="etc-relasi-keluarga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
