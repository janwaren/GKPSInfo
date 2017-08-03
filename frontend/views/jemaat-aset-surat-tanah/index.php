<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatAsetSuratTanahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jemaat Aset Surat Tanahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-aset-surat-tanah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jemaat Aset Surat Tanah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jenis_surat_tanah_id',
            'aset_tanah_id',
            'lokasi_surat_tanah',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
