<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EtcGelarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gelar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-gelar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Gelar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'singkatan',
            'nama',
            'posisi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
