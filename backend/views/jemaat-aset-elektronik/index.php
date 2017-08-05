<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatAsetElektronikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jemaat Aset Elektroniks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-aset-elektronik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jemaat Aset Elektronik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jemaat_id',
            'nama_alat',
            'jumlah_unit',
            'kondisi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
