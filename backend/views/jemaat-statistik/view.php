<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatStatistik */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jemaat Statistiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-statistik-view">

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
            'jemaat_id',
            'jumlah_tangga_banggal',
            'jumlah_tangga_etek',
            'jumlah_jiwa',
            'jumlah_sintua',
            'jumlah_syamas',
            'nama_pengantar_jemaat',
            'tahun_data',
        ],
    ]) ?>

</div>
