<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatAsetKendaraanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jemaat Aset Kendaraans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-aset-kendaraan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jemaat Aset Kendaraan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jemaat_id',
            'jenis_kendaraan_id',
            'merek',
            'tahun',
            // 'kondisi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
