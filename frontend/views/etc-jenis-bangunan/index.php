<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EtcJenisBangunanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Bangunan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-jenis-bangunan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Jenis Bangunan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'jenis_bangunan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
