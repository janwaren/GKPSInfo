<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EtcJenisKendaraanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Kendaraan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-jenis-kendaraan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Jenis Kendaraan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'jenis_kendaraan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
