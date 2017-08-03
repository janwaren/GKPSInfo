<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirEtcJabatan */

$this->title = $model->posisi;
$this->params['breadcrumbs'][] = ['label' => 'Jabatan Karir', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karir-etc-jabatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus jabatan karir ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'posisi',
        ],
    ]) ?>

</div>
