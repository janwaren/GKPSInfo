<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FullTimerKuliahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Full Timer Kuliahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-kuliah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Full Timer Kuliah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_timer_id:datetime',
            'universitas_id',
            'tahun_masuk',
            'strata_id',
            // 'gelar_id',
            // 'judul_thesis',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
