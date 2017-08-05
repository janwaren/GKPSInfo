<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Distrik */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Distriks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distrik-view">

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
            'nama',
            'super_id',
            'level_jemaat_id',
            'deskripsi:ntext',
            'alamat:ntext',
            'telp',
            'email:email',
            'tanggal_berdiri',
            'status_jemaat_id',
            'jumlah_tangga_banggal',
            'jumlah_tangga_etek',
            'jumlah_jiwa',
            'jumlah_sintua',
            'jumlah_syamas',
            'nama_pengantar_jemaat',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
        ],
    ]) ?>

</div>
