<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcGelar */

$this->title = $model->singkatan;
$this->params['breadcrumbs'][] = ['label' => 'Gelar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-gelar-view">

    <h1><?= Html::encode($model->gelarLengkap) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin akan menghapus gelar ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'singkatan',
            'nama',
            'posisi',
        ],
    ]) ?>

</div>
