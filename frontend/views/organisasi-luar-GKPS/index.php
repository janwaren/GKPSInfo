<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrganisasiLuarGkpsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organisasi Luar Gkps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organisasi-luar-gkps-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Organisasi Luar Gkps', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            'alamat:ntext',
            'kota',
            'propinsi',
            // 'negara',
            // 'telp',
            // 'email:email',
            // 'website',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
