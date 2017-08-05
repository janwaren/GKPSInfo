<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FullTimerSekolahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Full Timer Sekolahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-sekolah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Full Timer Sekolah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_timer_id',
            'sd',
            'tahun_lulus_sd',
            'smp',
            // 'tahun_lulus_smp',
            // 'sma',
            // 'tahun_lulus_sma',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
