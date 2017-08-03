<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatDemografiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jemaat Demografis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-demografi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jemaat Demografi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jemaat_id',
            'mayoritas_pekerjaan',
            'keterangan_pekerjaan:ntext',
            'mayoritas_pendidikan',
            // 'keterangan_pendidikan:ntext',
            // 'mayoritas_ekonomi',
            // 'keterangan_ekonomi:ntext',
            // 'mayoritas_agama',
            // 'keterangan_agama:ntext',
            // 'mayoritas_budaya',
            // 'keterangan_budaya:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
