<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KarirExternalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karir Externals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karir-external-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Karir External', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_timer_id',
            'jabatan_id',
            'external_org_id',
            'tahun_mulai',
            // 'tahun_selesai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
