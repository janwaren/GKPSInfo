<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatStatistikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jemaat Statistiks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-statistik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jemaat Statistik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'jemaat.namaFull',
            'jumlah_tangga_banggal',
            'jumlah_tangga_etek',
            'jumlah_jiwa',
            // 'jumlah_sintua',
            // 'jumlah_syamas',
            'nama_pengantar_jemaat',
            // 'tahun_data',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
