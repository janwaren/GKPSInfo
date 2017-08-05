<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EtcKelasEkonomiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Etc Kelas Ekonomis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-kelas-ekonomi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Etc Kelas Ekonomi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kelas_ekonomi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
