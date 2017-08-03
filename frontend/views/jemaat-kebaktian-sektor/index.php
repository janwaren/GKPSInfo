<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatKebaktianSektorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jemaat Kebaktian Sektors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-kebaktian-sektor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jemaat Kebaktian Sektor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jemaat_id',
            'nama_sektor',
            'hari',
            'jam',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
