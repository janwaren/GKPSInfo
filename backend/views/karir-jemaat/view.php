<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirJemaat */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Karir Jemaats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karir-jemaat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            ['attribute' => 'Nama Full Timer', 'value' => $model->fullTimer->nama],
            ['attribute' => 'Posisi', 'value' => $model->jabatan->posisi],
            ['attribute' => 'Penempatan', 'value' => $model->jemaat->namaFull],
            'tahun_mulai',
            'tahun_selesai',
            'keterangan',
        ],
    ]) ?>

</div>
