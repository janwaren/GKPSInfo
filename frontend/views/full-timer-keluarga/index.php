<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FullTimerKeluargaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Full Timer Keluargas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-keluarga-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Full Timer Keluarga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_timer_id',
            'nama',
            'jenis_kelamin',
            'relasi_id',
            // 'tempat_lahir',
            // 'tanggal_lahir',
            // 'pekerjaan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
