<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KarirKantorPusatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karir Kantor Pusats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karir-kantor-pusat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Karir Kantor Pusat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_timer_id',
            'jabatan_id',
            'organisasi_kantor_pusat_id',
            'tahun_mulai',
            // 'tahun_selesai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
