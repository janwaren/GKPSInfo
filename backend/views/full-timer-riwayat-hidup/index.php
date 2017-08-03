<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FullTimerRiwayatHidupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Full Timer Riwayat Hidups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-riwayat-hidup-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Full Timer Riwayat Hidup', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_timer_id:datetime',
            'tempat_lahir',
            'tanggal_lahir',
            'gereja_baptis',
            // 'tanggal_baptis',
            // 'gereja_nikah',
            // 'tanggal_nikah',
            // 'nama_pendeta',
            // 'gereja_sidi',
            // 'tanggal_sidi',
            // 'kisah_hidup:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
