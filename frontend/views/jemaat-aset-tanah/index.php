<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatAsetTanahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jemaat Aset Tanahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-aset-tanah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jemaat Aset Tanah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'jemaat.namaFull',
            'luas',
            'lokasi',
            'kondisi_pemakaian',
            // 'asal_perolehan',
            // 'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
