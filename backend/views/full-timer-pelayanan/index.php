<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FullTimerPelayananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Full Timer Pelayanans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-pelayanan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Full Timer Pelayanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_timer_id:datetime',
            'jemaat_tahbis_id',
            'tanggal_tahbis',
            'golongan',
            // 'ruang',
            // 'gaji_terakhir',
            // 'refleksi_pribadi_pelayanan:ntext',
            // 'pencapaian_pelayanan:ntext',
            // 'visi_pribadi:ntext',
            // 'misi_pribadi:ntext',
            // 'motto:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
