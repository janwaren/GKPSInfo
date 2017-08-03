<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DistrikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Distriks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distrik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Distrik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            'super_id',
            'level_jemaat_id',
            'deskripsi:ntext',
            // 'alamat:ntext',
            // 'telp',
            // 'email:email',
            // 'tanggal_berdiri',
            // 'status_jemaat_id',
            // 'jumlah_tangga_banggal',
            // 'jumlah_tangga_etek',
            // 'jumlah_jiwa',
            // 'jumlah_sintua',
            // 'jumlah_syamas',
            // 'nama_pengantar_jemaat',
            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
