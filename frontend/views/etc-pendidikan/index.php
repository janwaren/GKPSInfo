<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EtcPendidikanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pendidikan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-pendidikan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Pendidikan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'jenjang_pendidikan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
