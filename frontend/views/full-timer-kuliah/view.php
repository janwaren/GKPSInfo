<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerKuliah */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Full Timer Kuliahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-kuliah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fullTimer.nama',
            ['attribute' => 'Universitas', 'value' => $model->universitas->nama],
            'tahun_masuk',
            ['attribute' => 'Strata', 'value' => $model->strata->nama],
            ['attribute' => 'Gelar', 'value' => $model->gelar->gelarLengkap],
            'judul_thesis',
        ],
    ]) ?>

</div>
