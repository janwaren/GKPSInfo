<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EtcRelasiKeluargaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Relasi Keluarga';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-relasi-keluarga-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Relasi Keluarga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nama_relasi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
