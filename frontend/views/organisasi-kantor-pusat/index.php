<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrganisasiKantorPusatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organisasi Kantor Pusats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organisasi-kantor-pusat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Organisasi Kantor Pusat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'level_internal_id',
            'nama',
            'super_id',
            'deskripsi:ntext',
            // 'telp',
            // 'email:email',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
