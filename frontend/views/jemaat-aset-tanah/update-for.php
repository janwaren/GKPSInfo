<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetTanah */

$this->title = 'Update Aset Tanah: ' . $model->jemaat->namaFull;
$this->params['breadcrumbs'][] = ['label' => 'Aset Tanah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jemaat-aset-tanah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
        'modelsJemaatAsetSuratTanah' => $modelsJemaatAsetSuratTanah,        
    ]) ?>

</div>
