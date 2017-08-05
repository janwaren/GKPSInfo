<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EtcAgamaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agama';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-agama-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Agama', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nama_agama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
