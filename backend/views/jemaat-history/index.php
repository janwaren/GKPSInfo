<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sejarah Jemaat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-history-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jemaat History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jemaat_id',
            'tanggal_permulaan_kebaktian:date',
            'tanggal_peresmian:date',
            'tanggal_patibal_batu_onjolan:date',
            'tanggal_pamongkoton:date',
            // 'narasi:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
