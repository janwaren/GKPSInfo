<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jemaat Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-details-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jemaat Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jemaat_id',
            'alamat_jalan',
            'alamat_desa_kelurahan',
            'alamat_kecamatan',
            // 'alamat_kota_kabupaten',
            // 'alamat_provinsi',
            // 'alamat_kodepos',
            // 'telp',
            // 'fax',
            // 'email:email',
            // 'website',
            // 'geo_lat',
            // 'geo_long',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
