<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatPhotosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jemaat Photos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-photos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jemaat Photos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jemaat_id',
            'href',
            'title',
            'type',
            // 'thumbnail',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
