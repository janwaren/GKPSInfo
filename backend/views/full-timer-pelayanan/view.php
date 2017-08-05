<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerPelayanan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Full Timer Pelayanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-pelayanan-view">

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
            'full_timer_id:datetime',
            'jemaat_tahbis_id',
            'tanggal_tahbis',
            'golongan',
            'ruang',
            'gaji_terakhir',
            'refleksi_pribadi_pelayanan:ntext',
            'pencapaian_pelayanan:ntext',
            'visi_pribadi:ntext',
            'misi_pribadi:ntext',
            'motto:ntext',
        ],
    ]) ?>

</div>
