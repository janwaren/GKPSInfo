<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KarirKepanitiaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karir Kepanitiaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karir-kepanitiaan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Karir Kepanitiaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_timer_id',
            'posisi_id',
            'kepanitiaan_id',
            'tahun',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
