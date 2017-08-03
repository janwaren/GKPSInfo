<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatKebaktianMingguSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jemaat Kebaktian Minggus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-kebaktian-minggu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jemaat Kebaktian Minggu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jemaat_id',
            'jam',
            'bahasa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
