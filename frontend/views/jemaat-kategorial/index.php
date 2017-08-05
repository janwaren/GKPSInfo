<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatKategorialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jemaat Kategorials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-kategorial-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jemaat Kategorial', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'jemaat.namaFull',
            'kegiatan.nama_kegiatan',
            'kegiatan.kategorial.kategorial_bidang',
            'tempat',
            'hari',
            // 'jadwal',
            // 'jam',
            // 'keterangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
