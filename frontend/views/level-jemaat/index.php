<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LevelJemaatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Level Jemaats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-jemaat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Level Jemaat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            'level',
            'deskripsi:ntext',
            'posisi_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
